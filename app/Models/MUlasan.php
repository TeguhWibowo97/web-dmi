<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUlasan extends Model
{
    use HasFactory;

    protected $table = "ulasan";

    protected $fillable = ['nama_pengulas','deskripsi','bintang','id_produk','id_jasa'];
}
