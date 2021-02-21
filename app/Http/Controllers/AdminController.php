<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MJasa;
use App\Models\Mkategori;
use App\Models\MUlasan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function produkterbaru()
    {
        $produk = DB::table('products')->join('kategori','products.id_kategori','=','kategori.id_kategori')->where('status_aktif',0)->get();

        return view('admin/produkterbaru',['produk'=>$produk]);
        // return $produk;
    }
    public function produktampil()
    {
        $produk = DB::table('products')->leftJoin('kategori','products.id_kategori','=','kategori.id_kategori')->where('status_aktif',1)->get();

        return view('admin/produktampil',['produk'=>$produk]);
    }
    public function jasaterbaru()
    {
        $jasa = DB::table('jasa')->join('kategori','jasa.id_kategori','=','kategori.id_kategori')->where('status_aktif',0)->get();

        return view('admin/jasaterbaru',['jasa'=>$jasa]);
        // return $produk;
    }
    public function jasatampil()
    {
        $jasa = DB::table('jasa')->leftJoin('kategori','jasa.id_kategori','=','kategori.id_kategori')->where('status_aktif',1)->get();

        return view('admin/jasatampil',['jasa'=>$jasa]);
    }
    public function detailproduk($id)
    {
        // $produk = Product::where('id',$id)->get();
        $kategori = DB::table('kategori')->get();
        $produk = DB::table('products')->join('kategori','products.id_kategori','=','kategori.id_kategori')->where('id',$id)->get();

        return view('admin/detailproduk',['produk'=>$produk,'kategori'=>$kategori]);
        // return $kategori;
    }
    public function detailjasa($id)
    {
        // $produk = Product::where('id',$id)->get();
        $kategori = DB::table('kategori')->get();
        $jasa = DB::table('jasa')->join('kategori','jasa.id_kategori','=','kategori.id_kategori')->where('id',$id)->get();

        return view('admin/detailjasa',['jasa'=>$jasa,'kategori'=>$kategori]);
        // return $kategori;
    }
    public function update(Request $request, $id)
    {
        
        Product::whereId($id)->update([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga,
            'nama_pemilik'=>$request->nama_pemilik,
            'alamat_pemilik'=>$request->alamat_pemilik,
            'nomor_pemilik'=>$request->nomor_pemilik,
            'nomor_wa'=>$request->nomor_wa,
            'deskripsi'=>$request->deskripsi,
            'id_kategori'=>$request->id_kategori,
            'status_aktif'=>$request->status_aktif
        ]);

        return redirect('/produk/terbaru');
    }
    public function updatejasa(Request $request, $id)
    {
        
        MJasa::whereId($id)->update([
            'nama_jasa'=>$request->nama_jasa,
            'harga'=>$request->harga,
            'nama_pemilik'=>$request->nama_pemilik,
            'alamat_pemilik'=>$request->alamat_pemilik,
            'nomor_pemilik'=>$request->nomor_pemilik,
            'nomor_wa'=>$request->nomor_wa,
            'deskripsi'=>$request->deskripsi,
            'id_kategori'=>$request->id_kategori,
            'status_aktif'=>$request->status_aktif
        ]);

        return redirect('/jasa/terbaru');
    }

    public function getAllKategori()
    {
        $kategori = Mkategori::all();

        return view('admin/kategori',['kategori'=>$kategori]);
        // return $kategori;
    }

    public function tambahKategori(Request $request)
    {
        Mkategori::create($request->all());

        return redirect('kategori');
    }

    public function hapusKategori($id)
    {
        Mkategori::where('id_kategori',$id)->delete();

        return redirect('kategori');
    }

    public function hapusProductById($id)
    {
        $produk = Product::findOrFail($id);
        $image = '/storage/images/'.$produk->foto_produk;
        $path = str_replace('\\','/',public_path());

        if(file_exists($path.$image)){
            unlink($path.$image);
            $produk->delete();
            return redirect('/produk/tampil');
        }else{
            $produk->delete();
            return redirect('/produk/tampil');
        }
        // return $path.$image;
    }
    public function hapusJasaById($id)
    {
        $jasa = MJasa::findOrFail($id);
        $image = '/storage/images/'.$jasa->foto_jasa;
        $path = str_replace('\\','/',public_path());

        if(file_exists($path.$image)){
            unlink($path.$image);
            $jasa->delete();
            return redirect('/jasa/tampil');
        }else{
            $jasa->delete();
            return redirect('/jasa/tampil');
        }
        // return $path.$image;
        // return $id;
    }

    public function getAllProduk()
    {
        $produk = Product::where('status_aktif',1)->get();

        return view('admin/ulasanproduk',['produk'=>$produk]);
        // return $produk;
    }

    public function getUlasanByIdProduk($id)
    {
        $produk = Product::where('id',$id)->get();
        $ulasan = MUlasan::where('id_produk',$id)->get();
        // return $ulasan;
        return view('admin/detailulasanproduk',['produk'=>$produk,'ulasan'=>$ulasan]);
    }
    public function getAllJasa()
    {
        $jasa = MJasa::where('status_aktif',1)->get();

        return view('admin/ulasanjasa',['jasa'=>$jasa]);
        // return $produk;
    }

    public function getUlasanByIdJasa($id)
    {
        $jasa = MJasa::where('id',$id)->get();
        $ulasan = MUlasan::where('id_jasa',$id)->get();
        // return $ulasan;
        return view('admin/detailulasanjasa',['jasa'=>$jasa,'ulasan'=>$ulasan]);
    }
    
}
