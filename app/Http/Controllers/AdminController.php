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
        $totalprodukbaru = Product::where('status_aktif',0)->count();
        $totalproduktampil = Product::where('status_aktif',1)->count();
        $totaljasabaru = MJasa::where('status_aktif',0)->count();
        $totaljasatampil = MJasa::where('status_aktif',1)->count();

        // return $totalprodukbaru;

        return view('admin/dashboard',[
            'totalprodukbaru'=>$totalprodukbaru,
            'totalproduktampil'=>$totalproduktampil,
            'totaljasabaru'=>$totaljasabaru,
            'totaljasatampil'=>$totaljasatampil
        ]);
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

        return redirect('/produk/terbaru')->with('status','Data Berhasil Diubah');
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

        return redirect('/jasa/terbaru')->with('status','Data Berhasil Diubah');
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

        return redirect('kategori')->with('status','Data Berhasil Ditambahkan');
    }

    public function hapusKategori($id)
    {
        Mkategori::where('id_kategori',$id)->delete();

        return redirect('kategori')->with('status','Data Berhasil Dihapus');
    }

    public function hapusProductById($id)
    {
        $produk = Product::findOrFail($id);
        $image = '/storage/images/'.$produk->foto_produk;
        $path = str_replace('\\','/',public_path());

        if(file_exists($path.$image)){
            unlink($path.$image);
            $produk->delete();
            return redirect('/produk/tampil')->with('status','Data Berhasil Dihapus');
        }else{
            $produk->delete();
            return redirect('/produk/tampil')->with('status','Data Berhasil Dihapus');
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
            return redirect('/jasa/tampil')->with('status','Data Berhasil Dihapus');
        }else{
            $jasa->delete();
            return redirect('/jasa/tampil')->with('status','Data Berhasil Dihapus');
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

    public function ubahfotoproduk(Request $request, $id)
    {
        $ubah = Product::findorfail($id);
        $awal = $ubah->foto_produk;

        $data = [
            'foto_produk'=>$awal,
        ];

        $request->foto->move(public_path()."/storage/images",$awal);
        $ubah->update($data);
        return redirect('produk/detail/'.$id)->with('status','Data Berhasil Diubah');
    }

    public function ubahfotojasa(Request $request, $id)
    {
        $ubah = MJasa::findorfail($id);
        $awal = $ubah->foto_jasa;

        $data = [
            'foto_jasa'=>$awal,
        ];

        $request->foto->move(public_path()."/storage/images",$awal);
        $ubah->update($data);
        return redirect('jasa/detail/'.$id)->with('status','Data Berhasil Diubah');
    }

    public function hapusulasan($id)
    {
        // $produk = MUlasan::where('id_ulasan',$id)->get();
        // $produk = MUlasan::findorfail('id_ulasan',$id);
        MUlasan::where('id_ulasan',$id)->delete();
        // $data = $produk->bintang;
        return redirect()->back()->with('status','Data Berhasil Dihapus');
        // return $produk->id_produk;
    }
    
}
