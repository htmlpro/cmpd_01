<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Order;
use Log;
use Session;
use App\PriceManipulation;
use App\Helpers\Helpers;
use Carbon\Carbon;
use DB;
use PDO;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Formula;
use App\Vial;
use App\VialCount;
use App\AllQueueSummary;

class ProvidersController extends Controller {

    /**
     * To list of all providers.
     *
     * @return $array|$data
     */
    public function index() {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                $data['state_data'] = Helpers::getAllStates('assoc');
                $data['providers'] = Provider::all()->toArray();
                $data['provider_data'] = Helpers::getAllProviders('assoc');
                $data['states'] = Helpers::getAllStates();
                $data['corporates'] = Helpers::getProviders([2]);
                $data['clients'] = Helpers::getProviders([3]);
                $data['provider_types'] = Helpers::getAllProviderTypes();
                $data['type'] = Helpers::getAllProviderTypes('assoc');
                $data['status'] = [1 => trans('messages.active'), 0 => trans('messages.deactive')];
                $data['stage_name'] = trans('messages.provider');
                return view('providers.index', $data);
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
     * To create new provider.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $order_id = $request->order_id;
            $form_data = array(
                'first_name' => strtoupper($request->first_name),
                'last_name' => strtoupper($request->last_name),
                'reg_address1' => $request->address1,
                'reg_address2' => $request->address2,
                'reg_city' => $request->city,
                'reg_state' => $request->state,
                'reg_zip' => $request->zip,
                'phone1' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'client' => $request->client,
                'npi' => $request->npi,
                'supervising_provider' => $request->supervisor,
                'dea' => $request->dea,
                'statelicense' => $request->license,
                'provider_status' => $request->provider_type,
                'provider_corporation' => $request->corporate,
                'client' => $request->client,
                'logo' => $request->zpl_code,
                'status' => $request->status,
                'created_by' => auth()->user()->id,
                'created_at' => Carbon::now()
            );
            $provider = Provider::create($form_data);
            $provider_arr = json_decode($provider, true);
            if (!empty($order_id) && $request->status == 1) {
                Order::where('order_id', $order_id)
                        ->update(['provider_id' => $provider_arr['id'], 'client_id' => $request->client]);
                AllQueueSummary::where('order_id', $order_id)
                        ->update([
                            'provider_id' => $provider_arr['id'],
                            'provider' => strtoupper($request->first_name . " " . $request->last_name),
                            'doctor_address1' => $request->reg_address1,
                            'doctor_address2' => $request->reg_address2,
                            'doctor_city' => $request->reg_city,
                            'doctor_state' => $request->reg_state,
                            'doctor_zip' => $request->reg_zip,
                            'doctor_dea' => $request->dea,
                            'doctor_phone' => $request->phone1,
                            'doctor_email' => $request->email,
                ]);
            }
            if (isset($request->email) && isset($request->password) && isset($provider_arr['id'])) {
                if (isset($request->last_name)) {
                    $name = strtoupper($request->last_name) . " " . strtoupper($request->first_name);
                } else {
                    $name = strtoupper($request->first_name);
                }
                if ($request->provider_type == 1) {
                    $role = 4;
                } else if ($request->provider_type == 2) {
                    $role = 5;
                } else {
                    $role = 6;
                }
                User::create([
                    'name' => $name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'provider_id' => $provider_arr['id'],
                    'role' => $role,
                ]);
            }
            $message = trans('messages.provider_create_success');
            $alert_class = 'alert-success';
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
     * To display indiviusal provider details in edit mode.
     *
     * @param integer $id
     * @return array|$data
     */
    public function edit($id) {
        try {
            if (in_array(auth()->user()->role, [1, 2, 3])) {
                if (!empty($id)) {
                    $data['provider'] = Provider::where('id', $id)
                            ->get()
                            ->toArray();
                    if ($data['provider'][0]['provider_status'] == 3) {
                        $data['logo'] = Helpers::getClientLogo($data['provider'][0]['id']);
                    } elseif (!empty($data['provider'][0]['client'])) {
                        $data['logo'] = Helpers::getClientLogo($data['provider'][0]['client']);
                    }
                    $data['states'] = Helpers::getAllStates();
                    $data['provider_types'] = Helpers::getAllProviderTypes('assoc');
                    $data['provider_data'] = Helpers::getAllProviders('assoc');
                    $data['corporates'] = Helpers::getProviders([2]);
                    $data['clients'] = Helpers::getProviders([3]);
                    $data['status'] = [1 => trans('messages.active'), 0 => trans('messages.deactive')];
                    $data['stage_name'] = trans('messages.editprovider');
                    return view('providers.edit', $data);
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
            DB::rollback();
            Log::info([$e->getMessage()]);
            abort(500);
        }
    }

    /**
     * To Update the specified provider details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function update(Request $request) {
        try {
            if (!empty($request->provider_id)) {
                $form_data = array(
                    'first_name' => strtoupper($request->first_name),
                    'last_name' => strtoupper($request->last_name),
                    'reg_address1' => $request->address1,
                    'reg_address2' => $request->address2,
                    'reg_city' => $request->city,
                    'reg_state' => $request->state,
                    'reg_zip' => $request->zip,
                    'phone1' => $request->phone,
                    'fax' => $request->fax,
                    'email' => $request->email,
                    'client' => $request->client,
                    'npi' => $request->npi,
                    'supervising_provider' => $request->supervisor,
                    'dea' => $request->dea,
                    'statelicense' => $request->license,
                    'provider_status' => $request->provider_status,
                    'provider_corporation' => $request->corporate,
                    'client' => $request->client,
                    'logo' => $request->zpl_code,
                    'status' => $request->status,
                    'updated_by' => auth()->user()->id,
                    'updated_at' => Carbon::now()
                );
                Provider::where('id', $request->provider_id)
                        ->update($form_data);
                if (isset($request->email) && isset($request->password) && isset($request->provider_id)) {
                    if (isset($request->last_name)) {
                        $name = strtoupper($request->last_name) . " " . strtoupper($request->first_name);
                    } else {
                        $name = strtoupper($request->first_name);
                    }
                    if ($request->provider_status == 1) {
                        $role = 4;
                    } else if ($request->provider_status == 2) {
                        $role = 5;
                    } else {
                        $role = 6;
                    }
                    $user_exist = User::where(['provider_id' => $request->provider_id])->get()->toArray();
                    if (!empty($user_exist)) {
                        User::where('provider_id', $request->provider_id)
                                ->update([
                                    'name' => $name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password)
                        ]);
                    } else {
                        User::create([
                            'name' => $name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'provider_id' => $request->provider_id,
                            'role' => $role,
                        ]);
                    }
                }
                $message = trans('messages.provider_update_success');
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
     * To render formula manipulation price view.
     *
     * @param integer $id
     * @return array|$data
     */
    public function view($id) {
        if (in_array(auth()->user()->role, [1, 2, 3])) {
            if (!empty($id)) {
                $conn = Helpers::pkConnection();
                $data['formula_data'] = Helpers::getAllPKFormula();
                $data['formula_price'] = PriceManipulation::where('provider_id', $id)
                        ->get()
                        ->toArray();
                if (!empty($data['formula_price'])) {
                    foreach ($data['formula_price'] as $keys => $value) {
                        $pk_formula_details = $conn->prepare("SELECT * FROM FORMULA WHERE FORMULA_ID =:FORMULA_ID");
                        $pk_formula_details->bindValue(':FORMULA_ID', $value['formula_id']);
                        $pk_formula_details->execute();
                        $data['formula_price'][$keys]['pk_formula'] = $pk_formula_details->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
                $data['provider_data'] = Provider::select('id', 'provider_status')
                        ->where(['id' => $id])
                        ->get()
                        ->toArray();
                $data['stage_name'] = trans('messages.formula_price');
                return view('providers.view', $data);
            }
            return redirect()->back();
        } else {
            $message = trans('messages.unauthorize');
            $alert_class = 'alert-danger';
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            return redirect('providerallqueue');
        }
    }

    /**
     * To update formula price.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|$data
     */
    public function updatePrice(Request $request) {

        $formula = $request->latest_formula_price;
        $price = $request->formula_price;
        $id = $request->provider_id;
        if (!empty($formula) && $price >= 0 && !empty($id)) {
            $price = PriceManipulation::where('provider_id', $id)
                    ->where('formula_id', $formula)
                    ->get()
                    ->toArray();
            $provider_type = Provider::select('provider_status')
                    ->where(['id' => $id])
                    ->get()
                    ->toArray();
            if (!empty($provider_type)) {
                if ($provider_type[0]['provider_status'] == 3) {
                    $formula_with_client = Formula::select('id')
                            ->where(['formula_id' => $formula, 'client_id' => $id])
                            ->get()
                            ->toArray();
                    if (empty($formula_with_client)) {
                        $conn = Helpers::pkConnection();
                        $pk_formulas = Helpers::getPKFormulaById($formula);
                        if (!empty($pk_formulas)) {
                            Formula::create([
                                'client_id' => $id,
                                'formula_id' => $formula,
                                'formula_name' => $pk_formulas[0]['NAME'],
                                'speed_code' => $pk_formulas[0]['SPEEDCODE'] ? $pk_formulas[0]['SPEEDCODE'] : NULL,
                            ]);
                        }
                    }
                }
            }
            if (empty($price)) {
                PriceManipulation::create([
                    'provider_id' => $id,
                    'formula_id' => $request->latest_formula_price,
                    'price' => $request->formula_price,
                    'created_at' => Carbon::now()
                ]);
            } else {
                PriceManipulation::where(['provider_id' => $id, 'formula_id' => $request->latest_formula_price])
                        ->update(['price' => $request->formula_price, 'updated_at' => Carbon::now()]);
            }
            $message = trans('messages.formula_price_update');
            $alert_class = 'alert-success';
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
        }
        return redirect()->back();
    }

    /**
     * To get latest formula price.
     *
     * @param integer|$formula_id
     * @param integer|$provider_id
     * return array|$price_details
     */
    public function getLatestFormulaPrice(Request $request) {
        try {
            $formula_id = $request->input('formula_id');
            $provider_id = $request->input('provider_id');

            $provider_price = Helpers::getManipualtionPrice($provider_id, $formula_id);
            if (!empty($provider_price)) {
                $formula_price = $provider_price[0]['price'];
            } else {
                $provider_details = Helpers::getProvierDetail($provider_id);
                if (!empty($provider_details[0]['provider_corporation'])) {
                    $corporate_price = Helpers::getManipualtionPrice($provider_details[0]['provider_corporation'], $formula_id);
                    if (!empty($corporate_price)) {
                        $formula_price = $corporate_price[0]['price'];
                    }
                }
                if (!empty($provider_details[0]['client']) && empty($formula_price)) {
                    $client_price = Helpers::getManipualtionPrice($provider_details[0]['client'], $formula_id);
                    if (!empty($client_price)) {
                        $formula_price = $client_price[0]['price'];
                    }
                }
                if (empty($formula_price)) {
                    $global_price = Helpers::getPkFormulaPrice($formula_id);
                    if (!empty($global_price)) {
                        $formula_price = $global_price[0]['PRICE'];
                    } else {
                        $formula_price = 0;
                    }
                }
            }
            return $formula_price;
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * To render edit formula details form.
     *
     * @param integer|$provider_id
     * @param integer|$formula_id
     * return array|$price_details
     */
    public function formulaEdit($provider_id, $formula_id) {
        if (isset($provider_id) && isset($formula_id)) {
            $provider_name = Provider::select('first_name', 'last_name')
                    ->where(['id' => $provider_id])
                    ->get()
                    ->toArray();
            if (!empty($provider_name)) {
                $data['provider_name'] = $provider_name[0]['first_name'] ? $provider_name[0]['first_name'] . ' ' . $provider_name[0]['last_name'] : '';
                $data['provider_id'] = $provider_id;
            }
            $conn = Helpers::pkConnection();
            $pk_formula = Helpers::getPKFormulaById($formula_id);
            if (!empty($pk_formula)) {
                $data['formula_detail'] = $pk_formula;
            }
            $data['formula'] = Formula::select('formula_short')
                    ->where(['client_id' => $provider_id, 'formula_id' => $formula_id])
                    ->get()
                    ->toArray();
            $data['vials'] = Vial::select('id', 'vial', 'color', 'class')
                    ->where(['client_id' => $provider_id, 'formula_id' => $formula_id])
                    ->get()
                    ->toArray();
            $stage_name = 'Edit Formula';
            return view('providers.formula.edit', $data);
        }
        return redirect()->back();
    }

    /**
     * To update formula details.
     *
     * @param  \Illuminate\Http\Request  $request
     * return void
     */
    public function updateFormula(Request $request) {

        $vial_data = $request->toArray();
        if (!empty($vial_data)) {
            $vials = Vial::select('id', 'vial', 'color', 'class')
                    ->where(['client_id' => $vial_data['provider_id'], 'formula_id' => $vial_data['formula_id']])
                    ->get()
                    ->toArray();
            if (!empty($vials)) {
                for ($i = 0; $i < 5; $i++) {
                    if (empty($vials[$i])) {
                        if (isset($vial_data['vial_' . $i][0])) {
                            Vial::insert([
                                'client_id' => $vial_data['provider_id'],
                                'formula_id' => $vial_data['formula_id'],
                                'vial' => $vial_data['vial_' . $i][0],
                                'color' => strtoupper($vial_data['vial_' . $i][1]),
                                'class' => $vial_data['vial_' . $i][2],
                                'created_at' => Carbon::now(),
                                'created_by' => auth()->user()->id
                            ]);
                        }
                    } else {
                        if (isset($vial_data['vial_' . $i][0])) {
                            Vial::where(['id' => $vials[$i]['id']])
                                    ->update([
                                        'vial' => $vial_data['vial_' . $i][0],
                                        'color' => strtoupper($vial_data['vial_' . $i][1]),
                                        'class' => $vial_data['vial_' . $i][2],
                                        'updated_at' => Carbon::now(),
                                        'updated_by' => auth()->user()->id
                            ]);
                        } else {
                            Vial::where(['id' => $vials[$i]['id']])->delete();
                        }
                    }
                }
            } else {
                for ($i = 0; $i < 5; $i++) {
                    if (isset($vial_data['vial_' . $i][0])) {
                        Vial::insert([
                            'client_id' => $vial_data['provider_id'],
                            'formula_id' => $vial_data['formula_id'],
                            'vial' => $vial_data['vial_' . $i][0],
                            'color' => strtoupper($vial_data['vial_' . $i][1]),
                            'class' => $vial_data['vial_' . $i][2],
                            'created_at' => Carbon::now(),
                            'created_by' => auth()->user()->id
                        ]);
                    }
                }
            }
            Formula::where(['client_id' => $vial_data['provider_id'], 'formula_id' => $vial_data['formula_id']])
                    ->update(['formula_short' => $vial_data['formula_short']]);
            $message = trans('messages.formula_detail_updated');
            $alert_class = 'alert-success';
        } else {
            $message = trans('messages.formula_detail_not_updated');
            $alert_class = 'alert-danger';
        }
        Session::flash('message', $message);
        Session::flash('alert-class', $alert_class);
        return redirect()->back();
    }

    /**
     * To view formula details.
     * 
     * @param integer|$provider_id
     * @param integer|$formula_id
     * return array|$data
     */
    public function viewFormula($provider_id, $formula_id) {
        if (!empty($provider_id) && !empty($formula_id)) {
            $provider_name = Provider::select('first_name', 'last_name')
                    ->where(['id' => $provider_id])
                    ->get()
                    ->toArray();
            if (!empty($provider_name)) {
                $data['provider_name'] = $provider_name[0]['first_name'] ? $provider_name[0]['first_name'] . ' ' . $provider_name[0]['last_name'] : '';
                $data['provider_id'] = $provider_id;
            }
            $conn = Helpers::pkConnection();
            $pk_formula = Helpers::getPKFormulaById($formula_id);
            if (!empty($pk_formula)) {
                $data['formula_detail'] = $pk_formula;
            }
            $data['vials'] = Vial::select('id', 'vial', 'color', 'class')
                    ->where(['client_id' => $provider_id, 'formula_id' => $formula_id])
                    ->get()
                    ->toArray();
            $data['stage_name'] = 'View Formula';
            return view('providers.formula.view', $data);
        }
        return redirect()->back();
    }

}
