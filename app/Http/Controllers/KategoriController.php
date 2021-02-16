<?php

namespace App\Http\Controllers;

use App\Models\Mkategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Mkategori::all();

        return response()->json($kategori);
        // return $data;
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
        $request = Mkategori::create(
            ["nama_kategori"=> $request->nama_kategori,]
        );
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mkategori  $mkategori
     * @return \Illuminate\Http\Response
     */
    public function show(Mkategori $mkategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mkategori  $mkategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Mkategori $mkategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mkategori  $mkategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mkategori $mkategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mkategori  $mkategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mkategori $mkategori)
    {
        //
    }
}
