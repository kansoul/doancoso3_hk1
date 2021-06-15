<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diemdanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diemdanh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ngaythang');
            $table->string('masv'); 
            $table->string('ten'); 
            $table->string('lop'); 
            $table->string('monhoc'); 
            $table->string('giaovien');
            $table->integer('tinhtrang'); 
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
        Schema::dropIfExists('diemdanh');
    }
}
