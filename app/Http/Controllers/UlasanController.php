<?php

namespace App\Http\Controllers;

use App\Models\MUlasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        MUlasan::create($request->all());

        return response()->json($request);
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
     * @param  \App\Models\MUlasan  $mUlasan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ulasan = MUlasan::where('id_jasa',$request->id_jasa)->get();

        return $ulasan;
    }
    public function ulasanproduk(Request $request)
    {
        $ulasan = MUlasan::where('id_produk',$request->id_produk)->get();

        return $ulasan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MUlasan  $mUlasan
     * @return \Illuminate\Http\Response
     */
    public function edit(MUlasan $mUlasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MUlasan  $mUlasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MUlasan $mUlasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MUlasan  $mUlasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MUlasan $mUlasan)
    {
        //
    }
}
