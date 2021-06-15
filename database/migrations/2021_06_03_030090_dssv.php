<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dssv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dssv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('masv'); 
            $table->string('ten'); 
            $table->unsignedBigInteger('idlop');  
            $table->foreign('idlop')->references('id')->on('dslop');  
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
        Schema::dropIfExists('dssv');
    }
}
