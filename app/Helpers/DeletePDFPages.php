<?php

namespace App\Helpers;

use File;
use setasign\Fpdi\Fpdi;
use App\Order;
use Log;
use App\Attachment;

class DeletePDFPages
{

    /**
     * Delete the selected PDF pages.
     *
     * @param array|string $data
     * @return boolean true if order details is updated
     * false otherwise
     */
    public function deletePage($data = array())
    {
        try {
            $file_name = $data['file_name'];
            $skip_pages = $data['selected_pages'];
            $order_id = $data['order_id'];
            $pdf = new FPDI();
            $page_count = $pdf->setSourceFile('./public/attachments/' . $file_name);

            for ($page_no = 1; $page_no <= $page_count; $page_no++) {
                if (in_array($page_no, $skip_pages)) {
                    continue;
                }
                $template_id = $pdf->importPage($page_no);
                $pdf->getTemplateSize($template_id);
                $pdf->addPage();
                $pdf->useTemplate($template_id);
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
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            abort(500);
        }
    }
}
