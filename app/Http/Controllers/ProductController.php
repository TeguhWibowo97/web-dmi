<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $produk = Product::all();
        $produk = Product::all();
        // return json_encode($produk);
        // return view('produk/index',['produk'=>$produk]);
        // return $produk;

        // $produk = Product::all();

        return response()->json($produk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahproduk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->nama_produk = $request->input('nama_produk');
        $product->harga = $request->input('harga');

        // upload foto produk
        if($request->hasFile("foto_produk")){
            $img = $request->foto_produk;
            $img_name = time().''.$img->getClientOriginalName();
            Image::make($img)->save(storage_path("/app/public/images/".$img_name));
            $product->foto_produk = $img_name;
        }else{
            $product->foto_produk = 'default.jpg';
        }
        
        $product->nama_pemilik = $request->input('nama_pemilik');
        $product->alamat_pemilik = $request->input('alamat_pemilik');
        $product->nomor_pemilik = $request->input('nomor_pemilik');
        $product->nomor_wa = $request->input('nomor_wa');
        $product->deskripsi = $request->input('deskripsi');
        $product->id_kategori = $request->input('id_kategori');
        $product->status_aktif = 0;

        $product->save();

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $produk = Product::where('id',$product);

        return $product;
    }
    public function tampil(Product $product)
    {
        $produk = Product::where('id',$product)->get();

        // return view('produk/imageview',['product'=>$product]);

        // return <img src="{{ asset('storage/images/' .$product['foto_produk']) }}" alt="">;

        return asset('storage/images/'.$product->foto_produk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function getprodukbykategori(Request $request)
    {
        $produk = Product::where('id_kategori',$request->id_kategori)->where('status_aktif',1)->get();

        return response()->json($produk);
    }
    public function cariproduk(Request $request)
    {
        $produk = Product::where('nama_produk','LIKE','%'.$request->cari.'%')->where('status_aktif',1)
                ->orWhere('nama_pemilik','LIKE','%'.$request->cari.'%')->where('status_aktif',1)
                ->orWhere('alamat_pemilik','LIKE','%'.$request->cari.'%')->where('status_aktif',1)               
                ->get();

        return response()->json($produk);
    }
}
