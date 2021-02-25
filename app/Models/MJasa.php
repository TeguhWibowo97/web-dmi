<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJasa extends Model
{
    use HasFactory;

    protected $table = "jasa";

    protected $fillable = ['foto_jasa'];

}
