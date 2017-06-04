<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGolongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golongans', function (Blueprint $table) {
            $table->increments('id',10);
            $table->string('Golongan', 20);
            $table->string('Pangkat',20);
            $table->string('CreatedBy',30);
            $table->string('UpdatedBy',30);
            $table->boolean('IsActive');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('golongans');
    }
}
