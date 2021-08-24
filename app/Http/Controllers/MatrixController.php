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
class MatrixController extends Controller
{

    /**
     * view pmp matrix
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     */
    public function index(Request $request)
    {
        try{
            $data['stage_name'] = 'PMP Matrix';
            $data['state_list'] = Helpers::getPmpState();
            $get_pmp_fields = Helpers::getPmpFields();
            $data['field_type'] = Helpers::fieldTypeList();
            $field_list=[];
            if (!empty($get_pmp_fields)):
                foreach ($get_pmp_fields as $key => $value):
                    $item['field_code'] = $value->field_code;
                    $class = '';
                    $eachstate = [];
                    if(!empty($data['state_list'])):
                        foreach ($data['state_list'] as $key1 => $eachitem):
                            $fieldvalue = Helpers::getPmpMatrixData($eachitem->postal_code, $value->field_code);
                            $getrule = Helpers::getPmpMatrixRule($eachitem->postal_code, $value->field_code);
                            switch ($fieldvalue):
                            case 'R':
                                $list['class'] = "greencolor";
                                break;
                            case 'N':
                                $list['class'] = "redcolor";
                                break;
                            case '':
                                $list['class'] = "redcolor";
                                break;
                            case 'S':
                                $list['class'] = $getrule ? "yellowcolor" : "orangecolor";
                                break;
                            case 'C':
                                $list['class'] = $getrule ? "yellowcolor" : "orangecolor";
                                break;
                            case 'O':
                                $list['class'] = $getrule ? "yellowcolor" : "orangecolor";
                                break;
                            default:
                                $list['class'] = "greencolor";
                                break;
                            endswitch;
                            $list['version'] = "4.2";
                            $list['postal_code'] = $eachitem->postal_code;
                            $list['field_value'] = $fieldvalue;
                            $eachstate[] = $list;
                        endforeach;
                    endif;
                    $item['state'] = $eachstate;
                    $field_list[] = $item;
                    $data['field_list']=$field_list;
                endforeach;
            endif;
            return view('matrix.index', $data);
        }catch(\Exception $e){
            Log::info(['file' => $e->getFile() , 'message' => $e->getMessage() , 'line' => $e->getLine() ]);
            abort(500);
        }
    }
    
    /**
     * save or update Matrix.
     *
     * @param Request $request
     * @return json|$status
     */
    public function save(Request $request)
    {
        try{
            if(!empty($request)){
                MatrixMaster::updateOrCreate(['pmp_state_code' => $request->state_code, 'field_code' => $request->field_id], ['pmp_state_code' => $request->state_code, 'field_code' => $request->field_id, 'field_type' => $request->field_type, 'rule' => $request->rule, 'created_by' => Auth::user()->id, 'updated_at' => Carbon::now() ]);
                return response()
                    ->json(['status' => true]);
            }
        }catch(\Exception $e){
            Log::info(['file' => $e->getFile() , 'message' => $e->getMessage() , 'line' => $e->getLine() ]);
            abort(500);
        }
    }

}

