<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetaniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petani', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('EMAIL')->unique();
            $table->string('nama_perusahaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->double('accuracy')->nullable();
            $table->string('qrcode')->nullable();
            $table->integer('id_customer');
            $table->softDeletes();
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
        Schema::dropIfExists('petani');
    }
}
