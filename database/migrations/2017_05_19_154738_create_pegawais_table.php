<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NIP',20);
            $table->string('Nama',50);
            $table->string('Gelar',20);
            $table->string('Jabatan',50);
            $table->string('CreatedBy',30);
            $table->string('UpdatedBy',30);
            $table->boolean('IsActive');
            $table->integer('GolonganID')->unsigned();
            $table->timestamps();
        });
        Schema::table('pegawais', function($table) {
        $table->foreign('GolonganID')->references('id')->on('golongans');
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
