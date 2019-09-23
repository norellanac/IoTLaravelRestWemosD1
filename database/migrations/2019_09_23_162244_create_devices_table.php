<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('devices', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description')->nullable();
          $table->integer('custom_id')->nullable();
          $table->string('location')->nullable();
          $table->timestamps();
          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')
                ->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
         Schema::dropIfExists('devices');
     }
}
