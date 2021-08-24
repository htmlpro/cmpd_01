<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use setasign\Fpdi\Fpdi;
use App\Order;
use Log;
use DB;
use App\OrderManipulationHistory;
use App\Attachment;

class AjaxUploadController extends Controller
{

    /**
     * Upload the attached PDF file.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function uploadAttachment(Request $request)
    {

        try {
            $validation = Validator::make($request->all(), [
                        'select_file' => 'required|mimes:pdf|max:2048'
            ]);
            if ($validation->passes()) {
                $image = $request->file('select_file');
                $new_name = round(microtime(true) * 1000) . '-' .
                        str_replace('-', '_', $image->getClientOriginalName());
                $image->move('./public/attachments/', $new_name);
                return response()->json([
                            'status' => true,
                            'uploaded_image' => $new_name,
                            'message' => $validation->errors()->all()
                ]);
            } else {
                return response()->json([
                            'status' => false,
                            'uploaded_image' => '',
                            'message' => trans('messages.file_pdf_size')
                ]);
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     * Merge the attached PDF file with original PDF file.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function mergeAttachment(Request $request)
    {

        DB::beginTransaction();

        try {
            $file_name = $request->pdf;
            $append_pdf = $request->append_pdf;
            $order_id = $request->order_id;
            $files = [$file_name, $append_pdf];
            $pdf = new FPDI();
            // iterate over array of files and merge
            foreach ($files as $file) {
                $pageCount = $pdf->setSourceFile('./public/attachments/' . $file);
                for ($i = 0; $i < $pageCount; $i++) {
                    $tpl = $pdf->importPage($i + 1, '/MediaBox');
                    $pdf->addPage();
                    $pdf->useTemplate($tpl);
                }
            }
            $name_array = explode('-', $file_name);
            $new_file_name = round(microtime(true) * 1000) . '-' . $name_array[1];
            $file_path = './public/attachments/' . $new_file_name;
            $pdf->Output($file_path, "F");
            unlink('./public/attachments/' . $file_name);
            $pdf_text = file_get_contents($file_path);
            $num = preg_match_all("/\/Page\W/", $pdf_text, $dummy);

            $attachment_id = Order::select('attachment_id')
                    ->where('order_id', '=', $order_id)
                    ->get()
                    ->toArray();
            if (!empty($attachment_id)) {
                Attachment::where('id', $attachment_id[0]['attachment_id'])
                        ->update(['file_name' => $new_file_name, 'file_path' => $file_path]);
            }
            Order::where('order_id', $order_id)
                    ->update(['page_count' => $num, 'updated_by' => auth()->user()->id]);
            OrderManipulationHistory::create([
                'order_id' => $order_id,
                'action' => 'Upload',
                'new_file' => $append_pdf,
                'created_by' => auth()->user()->id,
                'ip' => $_SERVER['REMOTE_ADDR']
            ]);
            DB::commit();
            return trans('messages.upload_pages');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }
}
