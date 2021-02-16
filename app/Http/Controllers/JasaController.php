<?php

namespace App\Http\Controllers;

use App\Models\MJasa;
use Illuminate\Http\Request;
Use\Image;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa = MJasa::all();

        return response()->json($jasa);
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
        $jasa = new Mjasa();

        $jasa->nama_jasa = $request->input('nama_jasa');
        $jasa->harga = $request->input('harga');

        // upload foto produk
        if($request->hasFile("foto_jasa")){
            $img = $request->foto_jasa;
            $img_name = time().''.$img->getClientOriginalName();
            Image::make($img)->save(storage_path("/app/public/images/".$img_name));
            $jasa->foto_jasa = $img_name;
        }else{
            $jasa->foto_jasa = 'default.jpg';
        }
        
        $jasa->nama_pemilik = $request->input('nama_pemilik');
        $jasa->alamat_pemilik = $request->input('alamat_pemilik');
        $jasa->nomor_pemilik = $request->input('nomor_pemilik');
        $jasa->nomor_wa = $request->input('nomor_wa');
        $jasa->deskripsi = $request->input('deskripsi');
        $jasa->id_kategori = $request->input('id_kategori');
        $jasa->status_aktif = 0;

        $jasa->save();

        return response()->json($jasa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MJasa  $mJasa
     * @return \Illuminate\Http\Response
     */
    public function show(MJasa $mJasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MJasa  $mJasa
     * @return \Illuminate\Http\Response
     */
    public function edit(MJasa $mJasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MJasa  $mJasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MJasa $mJasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MJasa  $mJasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(MJasa $mJasa)
    {
        //
    }

    public function getjasabykategori(Request $request)
    {
        $jasa = MJasa::where('id_kategori',$request->id_kategori)->where('status_aktif',1)->get();

        return response()->json($jasa);
    }

    public function carijasa(Request $request)
    {
        $jasa = MJasa::where('nama_jasa','LIKE','%'.$request->cari.'%')->where('status_aktif',1)
                ->orWhere('nama_pemilik','LIKE','%'.$request->cari.'%')->where('status_aktif',1)
                ->orWhere('alamat_pemilik','LIKE','%'.$request->cari.'%')->where('status_aktif',1)
                ->get();

        return response()->json($jasa);
    }
}
