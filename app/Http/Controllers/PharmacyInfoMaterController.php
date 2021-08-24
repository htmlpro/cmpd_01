<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrixMaster;
use App\FieldsMaster;
use Session;
use Log;
use Carbon\Carbon;
use Auth;
use App\Helpers\Helpers;
use App\PharmacyInfo;
use App\State;
class PharmacyInfoMaterController extends Controller
{

    /**
     * View Pharmacy Info Master
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     */
    public function index(Request $request)
    {
        try{
            $data['stage_name'] = 'Pharmacy Info Master';
            $data['state_list'] = State::select('postal_code','name')->get();
            $data['pharmacy_info']=PharmacyInfo::first();
            $data['license_list']=State::select('postal_code','license_no')->whereNotNull('license_no')->get();
            return view('pharmacyinfo.index', $data);
        }catch(\Exception $e){
            Log::info(['file' => $e->getFile() , 'message' => $e->getMessage() , 'line' => $e->getLine() ]);
            abort(500);
        }
    }
    
    /**
     * Update Pharmacy Info Master.
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        try{
                PharmacyInfo::where('id',1)->update([
                    "unique_info_source_code"=>$request->unique_info_source_code,
                    "source_entity_name"=>$request->source_entity_name,
                    "message"=>$request->message,
                    "npi"=>$request->npi,
                    "ncpdp"=>$request->ncpdp,
                    "dea"=>$request->dea,
                    "pharmacy_name"=>$request->pharmacy_name,
                    "pharmacy_address_1"=>$request->pharmacy_address_1,
                    "pharmacy_address_2"=>$request->pharmacy_address_2,
                    "pharmacy_state"=>$request->pharmacy_state,
                    "pharmacy_city"=>$request->pharmacy_city,
                    "pharmacy_zip_code"=>$request->pharmacy_zip_code,
                    "pharmacy_phone"=>$request->pharmacy_phone,
                    "pharmacy_conatct_name"=>$request->pharmacy_conatct_name,
                    "pharmacy_chain_site_no"=>$request->pharmacy_chain_site_no,
                    ]);
                    if(!empty($request->state)){
                        State::whereNotIn('postal_code',$request->state)->update(['license_no'=>null]);
                       foreach($request->state as $key => $val){
                           State::where(['postal_code'=>$val])->update(['license_no'=>$request->license_no[$key]]);
                       }
                    }
                $message = trans('messages.pharmacy_info_update');
                $alert_class = 'alert-success';
                Session::flash('message', $message);
                Session::flash('alert-class', $alert_class);
                return redirect()->route('pharmacyinfo.index');
        }catch(\Exception $e){
            Log::info(['file' => $e->getFile() , 'message' => $e->getMessage() , 'line' => $e->getLine() ]);
            abort(500);
        }
    }

}

