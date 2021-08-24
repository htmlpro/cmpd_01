<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Log;
use Session;
use App\Order;
use App\Helpers\Helpers;
use DB;
use App\User;
use App\RefillHistory;
use App\AllQueueSummary;

class PatientsController extends Controller {

    /**
     * To list of all patients.
     *
     * @return $array|$data
     */
    public function index() {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['patients'] = Patient::all()->toArray();
                $data['documents'] = Helpers::getAllDocuments();
                $data['states'] = Helpers::getAllStates();
                $data['species'] = Helpers::getAllSpecies();
                $data['allergies'] = Helpers::getAllAllergies();
                $data['health'] = Helpers::getAllHealthConditions();
                $data['location_code'] = Helpers::getPatientLocationCode();
                $data['pharm_users'] = $this->getUserByRole('2');
                $data['tech_users'] = $this->getUserByRole('3');
                $data['status'] = [1 => trans('messages.active'), 0 => trans('messages.deactive')];
                $data['stage_name'] = trans('messages.patients');
                return view('patients.index', $data);
            } else {
                $message = trans('messages.unauthorize');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect('providerallqueue');
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To display indiviusal patient details in edit mode.
     *
     * @param int $patient_id patient id.
     * @return $array|$data
     */
    public function viewPatient($patient_id) {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                if (!empty($patient_id)) {
                    $data['patient'] = Patient::select('*')
                            ->where('id', $patient_id)
                            ->get()
                            ->toArray();
                    $data['rxs'] = $this->getPrescription($patient_id);
                    if (!empty($data['rxs'])) {
                        foreach ($data['rxs'] as $key => $value) {
                            foreach ($value['prescription'] as $preskey => $presval) {
                                $data['stage'][$presval['order_id'] . $presval['rx_id']] = DB::select(DB::raw("select stage from order_stage_relations where order_id='" . $presval['order_id'] . "' and rx_id='" . $presval['rx_id'] . "' order by id desc  limit 1"));
								$data['refill_history'][$presval['order_id'] . $presval['rx_id']] = RefillHistory::where(['order_id' => $presval['order_id'], 'rx_id' => $presval['rx_id']])->get()->toArray();
                            }
                        }
                    }
                    $data['status_data'] = Helpers::getAllStatus();
                    $data['method_data'] = Helpers::getAllDispatchMethods('assoc');
                    $data['state_data'] = Helpers::getAllStates('assoc');
                    $data['allergy_data'] = Helpers::getAllAllergies('assoc');
                    $data['species_data'] = Helpers::getAllSpecies('assoc');
                    $data['health_data'] = Helpers::getAllHealthConditions('assoc');
                    $data['users'] = Helpers::getUsers();
                    $data['provider_data'] = Helpers::getAllProviders('assoc');
                    $data['documents'] = Helpers::getAllDocuments('assoc');
                    $data['additional_id_type'] = Helpers::getAllDocuments('addition');
                    $data['location_code'] = Helpers::getPatientLocationCode('assoc');
                    $data['status'] = [1 => trans('messages.active'), 0 => trans('messages.deactive')];
                    $data['stage_name'] = trans('messages.patients');
                    return view('patients.view', $data);
                }
                return redirect()->back();
            } else {
                $message = trans('messages.unauthorize');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect('providerallqueue');
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * Add new patient in db.
     *
     * @param Request $request
     * @return void
     */
    public function addPatient(Request $request) {
        try {
            $order_id = $request->order_id;
            $patient = new Patient;
            $patient->first_name = Crypt::encrypt(strtoupper($request->first_name));
            $patient->middle_name = Crypt::encrypt(strtoupper($request->middle_name));
            $patient->last_name = Crypt::encrypt(strtoupper($request->last_name));
            $patient->dob = Crypt::encrypt(date('n/j/Y', strtotime($request->dob)));
            $patient->gender = Crypt::encrypt($request->gender);
            $patient->address1 = Crypt::encrypt($request->address1);
            $patient->address2 = Crypt::encrypt($request->address2);
            $patient->city = Crypt::encrypt($request->city);
            $patient->state = $request->state;
            $patient->zip = Crypt::encrypt($request->zip);
            $patient->phone = Crypt::encrypt($request->phone);
            $patient->email = Crypt::encrypt($request->email);
            $patient->fax = Crypt::encrypt($request->fax);
            $patient->species = $request->species;
            $patient->third_party = $request->third_party;
            $patient->allergies = $request->allergies;
            $patient->health_condition = $request->health_conditions;
            $patient->auto_refills = $request->auto_refill;
            $patient->height = $request->height;
            $patient->weight = $request->weight;
            $patient->tech = $request->tech;
            $patient->created_by = auth()->user()->id;
            $patient->rph = $request->rph;
            $patient->identification = $request->identification;
            $patient->identification_number = $request->identification_number!=''?Crypt::encrypt($request->identification_number):null;
            $patient->additional_identification_type = $request->additional_identification_type;
            $patient->additional_identification_number = $request->additional_identification_type!=''?Crypt::encrypt($request->additional_identification_number):null;
            $patient->status = $request->status;
            $patient->name_suffix = $request->name_suffix!=''?Crypt::encrypt($request->name_suffix):null;
            $patient->name_prefix = $request->name_prefix!=''?Crypt::encrypt($request->name_prefix):null;
            $patient->animal_name = $request->animal_name!=''?Crypt::encrypt($request->animal_name):null;
            $patient->country_of_non_us = $request->country_of_non_us!=''?Crypt::encrypt($request->country_of_non_us):null;
            $patient->location_code = $request->location_code!=''?$request->location_code:null;
            $patient->created_by = auth()->user()->id;
            $patient->created_at = Carbon::now();
            $patient->save();
            $patient_arr = json_decode($patient, true);
            if (!empty($order_id) && $request->status == 1) {
                Order::where('order_id', $order_id)
                        ->update(['patient_id' => $patient_arr['id']]);
                AllQueueSummary::where('order_id', $order_id)
                        ->update([
                            'patient_id' => $patient_arr ? $patient_arr['id'] : '',
                            'patient' => $patient->first_name,
                            'patient_lastname' => $patient->last_name,
                            'dob' => $patient->dob,
                            'patient_address1' => $patient->address1,
                            'patient_address2' => $patient->address2,
                            'patient_city' => $patient->city,
                            'patient_state' => $patient->state,
                            'patient_zip' => $patient->zip,
                            'patient_gender' => $patient->gender,
                            'patient_phone' => $patient->phone,
                ]);
            }
            $message = trans('messages.patient_create_success');
            $alert_class = 'alert-success';
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            if (!empty($request->order_id)) {
                return redirect('/order/manage/reception/' . $request->order_id);
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To display indiviusal patient details in edit mode.
     *
     * @param integer $id
     * @return array|$data
     */
    public function editPatient($id) {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                if (!empty($id)) {
                    $data['patient'] = Patient::where('id', $id)
                            ->get()
                            ->toArray();
                    $data['documents'] = Helpers::getAllDocuments();
                    $data['states'] = Helpers::getAllStates();
                    $data['species'] = Helpers::getAllSpecies();
                    $data['allergies'] = Helpers::getAllAllergies();
                    $data['health'] = Helpers::getAllHealthConditions();
                    $data['location_code'] = Helpers::getPatientLocationCode();
                    $data['pharm_users'] = $this->getUserByRole('2');
                    $data['tech_users'] = $this->getUserByRole('3');
                    $data['status'] = [1 => trans('messages.active'), 0 => trans('messages.deactive')];
                    return view('patients.edit', $data);
                }
                return redirect()->back();
            } else {
                $message = trans('messages.unauthorize');
                $alert_class = 'alert-danger';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect('providerallqueue');
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To Update the specified patient details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function updatePatient(Request $request) {
        try {
            if (!empty($request->patient_id)) {
                $form_data = array(
                    'first_name' => Crypt::encrypt(strtoupper($request->first_name)),
                    'middle_name' => Crypt::encrypt(strtoupper($request->middle_name)),
                    'last_name' => Crypt::encrypt(strtoupper($request->last_name)),
                    'dob' => Crypt::encrypt(date('n/j/Y', strtotime($request->dob))),
                    'gender' => Crypt::encrypt($request->gender),
                    'address1' => Crypt::encrypt($request->address1),
                    'address2' => Crypt::encrypt($request->address2),
                    'city' => Crypt::encrypt($request->city),
                    'state' => $request->state,
                    'zip' => Crypt::encrypt($request->zip),
                    'phone' => Crypt::encrypt($request->phone),
                    'email' => Crypt::encrypt($request->email),
                    'fax' => Crypt::encrypt($request->fax),
                    'species' => $request->species,
                    'third_party' => $request->third_party,
                    'allergies' => $request->allergies,
                    'health_condition' => $request->health_conditions,
                    'auto_refills' => $request->auto_refill,
                    'height' => $request->height,
                    'weight' => $request->weight,
                    'tech' => $request->tech,
                    'rph' => $request->rph,
                    'identification' => $request->identification,
                    'identification_number' => $request->identification_number!=''?Crypt::encrypt($request->identification_number):null,
                    'additional_identification_type' => $request->additional_identification_type,
                    'additional_identification_number' => $request->additional_identification_type!=''?Crypt::encrypt($request->additional_identification_number):null,
                    'status' => $request->status,
                    'name_suffix' => $request->name_suffix!=''?Crypt::encrypt($request->name_suffix):null,
                    'name_prefix' => $request->name_prefix!=''?Crypt::encrypt($request->name_prefix):null,
                    'animal_name' => $request->animal_name!=''?Crypt::encrypt($request->animal_name):null,
                    'country_of_non_us' => $request->country_of_non_us!=''?Crypt::encrypt($request->country_of_non_us):null,
                    'location_code' => $request->location_code!=''?$request->location_code:null,
                    'updated_by' => auth()->user()->id,
                    'updated_at' => Carbon::now()
                );
                Patient::where('id', $request->patient_id)
                        ->update($form_data);
                $message = trans('messages.patient_update_success');
                $alert_class = 'alert-success';
            } else {
                $message = trans('messages.wrong');
                $alert_class = 'alert-success';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Log::info([$e->getMessage()]);
            abort(500);
        }
    }

    /**
     * Get prescription details by patient id.
     *
     * @param int $patient_id patient id.
     * return array|$rx_details.
     */
    private function getPrescription($patient_id) {
        try {
            if ($patient_id) {
                $rx_details = Order::with('patient')
                        ->with('provider')
                        ->with('prescription.formula')
                        ->with('prescription.dispatch')
                        ->with('prescription.dispatch.invoice')
                        ->with('orderStageRealtion.statuses')
                        ->with('prescription.orderStageRealtion.statuses')
                        ->whereHas('prescription', function (Builder $query) {
                            $query->whereNotNull('rx_id');
                        })
                        ->whereHas('patient', function (Builder $query) use ($patient_id) {
                            $query->where('id', '=', $patient_id);
                        })
                        ->get()
                        ->toArray();
                return $rx_details;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * Get all user as per the role.
     *
     * @param integer $role_id
     * @return array $user_details
     */
    public function getUserByRole($role_id) {
        try {
            if (isset($role_id)) {
                $user_details = User::where('role', '=', $role_id)->get()->toArray();
                return $user_details;
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

}
