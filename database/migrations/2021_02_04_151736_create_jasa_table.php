<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jasa');
            $table->integer('harga');
            $table->string('foto_jasa');
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
        Schema::dropIfExists('jasa');
    }
}
