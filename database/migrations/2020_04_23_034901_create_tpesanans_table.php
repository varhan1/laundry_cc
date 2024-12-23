<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpesanans', function (Blueprint $table) {   
            $table->string('id',40);
            $table->string('customer',40);
            $table->string('paket',40);
            $table->integer('berat');
            $table->integer('grand_total');
            $table->string('statuspesanan',40);
            $table->string('statuspembayaran',40);
            $table->timestamps();
 
            $table->primary('id');
            $table->foreign('customer')->references('id')->on('customers')->onDelete('restrict');
            $table->foreign('paket')->references('id')->on('pakets')->onDelete('restrict');
            $table->foreign('statuspesanan')->references('id')->on('statuspesanans')->onDelete('restrict');
            $table->foreign('statuspembayaran')->references('id')->on('statuspembayarans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpesanans');
    }
}
