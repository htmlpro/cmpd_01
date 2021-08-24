<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Session;
use Log;

class NoteController extends Controller
{

    /**
     * Add new notes
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function addNote(Request $request)
    {

        $validatedData = $request->validate([
            'notes' => 'required',
        ]);

        try {
            if ($request->input('order_id') != '') {
                $rx_id = $request->input('rx_id') ? $request->input('rx_id') : 'NULL';
                $note_exist = Note::where('order_id', '=', $request->input('order_id'))
                                ->get()->toArray();
                if (empty($note_exist)) {
                    $note = new Note;
                    $note->order_id = $request->input('order_id');
                    $note->rx_id = $rx_id;
                    $note->note = $request->input('notes');
                    $note->created_by = auth()->user()->id;
                    $note->save();

                    $message = trans('messages.add_note_success');
                    $alert_class = 'alert-success';
                } else {
                    $note = Note::where('order_id', '=', $request->input('order_id'))
                            ->update([
                        'rx_id' => $rx_id, 'note' => $request->input('notes'), 'updated_by' => auth()->user()->id
                    ]);
                    $message = trans('messages.update_note_success');
                    $alert_class = 'alert-success';
                }
            } else {
                $message = trans('messages.something_happened');
                $alert_class = 'alert-danger';
            }
            Session::flash('message', $message);
            Session::flash('alert-class', $alert_class);
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }

    /**
     *
     * Check note exists
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function checkNoteExist(Request $request)
    {
        try {
            if ($request->input('note_order_id')) {
                $note_exist = Note::where('order_id', '=', $request->input('note_order_id'))
                                ->get()->toArray();
                $status = '';
                if ($note_exist) {
                    $status = 'true';
                } else {
                    $status = 'false';
                }
                return(json_encode(['status' => $status]));
            }
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }
}
