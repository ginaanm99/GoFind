<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAduanbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduanbarang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_aduan')->unique();
            $table->string('no_temuan');
            $table->string('npm');
            $table->string('tgl');
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->string('foto');
            $table->string('lokasi');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('aduanbarang');
    }
}
