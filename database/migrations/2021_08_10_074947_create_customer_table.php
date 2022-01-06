<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('EMAIL')->unique();
            $table->string('nama_customer')->nullable();
            $table->string('nama_ibukandung')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('fotonpwp')->nullable();
            $table->string('fotoktp')->nullable();
            $table->string('selfiektp')->nullable();
            $table->string('nomorhp')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('sumberdana')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('status')->nullable();
            $table->string('bank')->nullable();
            $table->string('nomorrekening')->nullable();
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
        Schema::dropIfExists('customer');
    }
}
