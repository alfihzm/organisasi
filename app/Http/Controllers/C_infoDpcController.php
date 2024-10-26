<?php

namespace App\Http\Controllers;

use App\Models\InfoDpc;
use App\Models\Campuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_infoDpcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Auth::guard('participant')->user();
        $campus = $peserta->campuses;
        $dpc = $campus->infoDpc;

        return view('open_recruitment.peserta.V_info_dpc', [
            'peserta' => $peserta,
            'campus' => $campus,
            'dpc' => $dpc
        ]);
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
     * @param  \App\Models\InfoDpc  $infoDpc
     * @return \Illuminate\Http\Response
     */
    public function show(InfoDpc $infoDpc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoDpc  $infoDpc
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoDpc $infoDpc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoDpc  $infoDpc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoDpc $infoDpc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoDpc  $infoDpc
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoDpc $infoDpc)
    {
        //
    }
}
