<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('alamat');
            $table->bigInteger('no_telp');
            $table->bigInteger('products_id')->unsigned(); 
            $table->integer('jumlah'); 
            $table->timestamps(); 
            //menambahkan relasi  
            $table->foreign('products_id')->references('id')->on('products'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
