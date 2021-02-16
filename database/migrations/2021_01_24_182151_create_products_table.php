<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk',255);
            $table->integer('harga');
            $table->string('foto_produk');
            $table->string('nama_pemilik');
            $table->string('alamat_pemilik');
            $table->string('nomor_pemilik');
            $table->string('nomor_wa');
            $table->text('deskripsi');
            $table->integer('id_kategori');
            $table->integer('status_aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
