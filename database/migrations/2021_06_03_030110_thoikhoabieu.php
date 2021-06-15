<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Thoikhoabieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('thoikhoabieu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('monhoc_id');
            $table->unsignedBigInteger('idlop');
            $table->date('ngaythang');       
            $table->string('tiethoc');
            $table->foreign('monhoc_id')->references('id')->on('monhoc');
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
        Schema::dropIfExists('thoikhoabieu');
    }
}
