<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\DeletePDFPages;
use Log;
use DB;
use App\OrderManipulationHistory;

class DeleteController extends Controller
{
    /**
     * Call the DeletePdf Pages Helper.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $page_num = $request->pagenumber;
        $file_name = $request->pdf;
        $order_id = $request->orderid;
        
        $pages_id = implode(',', $page_num);
        
        $data = ['file_name' => $file_name, 'selected_pages' => $page_num, 'order_id' => $order_id];
        DB::beginTransaction();
       
        try {
            $delete = new DeletePDFPages();
            $delete->deletePage($data);
            OrderManipulationHistory::create([
                'order_id' => $order_id,
                'action' => 'Delete',
                'delete_pages' => $pages_id,
                'created_by' => auth()->user()->id,
                'ip' => $_SERVER['REMOTE_ADDR']
            ]);
            DB::commit();
            return trans('messages.delete_pages');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file'=> $e->getFile(),'message' => $e->getMessage(),'line'=>$e->getLine()]);
            abort(500);
        }
    }
}
