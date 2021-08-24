<?php

namespace App\Http\Controllers;

use App\Sig;
use Illuminate\Http\Request;
use DB;

class SigController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function show(Sig $sig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function edit(Sig $sig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sig $sig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sig $sig)
    {
        //
    }

    /**
     * Get SIG# details
     *
     * @param \Illuminate\Http\Request $req
     * @return array|$sig_description
     *
     */
    public function getSigDescription(Request $request)
    {
        try {
            $sig_code = $request->input('sig_code');
            $exploded = explode(' ', $sig_code);
            foreach ($exploded as $val) {
                $sig_data = DB::table('sig_codes')
                        ->select('sig_description')
                        ->where('sig_code', '=', $val)
                        ->get()
                        ->toArray();
                if (!empty($sig_data)) {
                    $sig_desc[] = $sig_data[0]->sig_description;
                } else {
                    $sig_desc[] = $val;
                }
            }
            return json_encode($sig_desc);
        } catch (\Exception $e) {
            Log::info(['file' => $e->getFile(), 'message' => $e->getMessage(), 'line' => $e->getLine()]);
            abort(500);
        }
    }
}
