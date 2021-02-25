<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    Protected $fillable = ['namaproduk','harga','nama_pemilik','alamat_pemilik','nomor_pemilik','nomor_wa','id_kategori','status_aktif','foto_produk'];
}
