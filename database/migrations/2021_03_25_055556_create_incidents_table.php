<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('severity');
            
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_level')->nullable();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_support')->nullable();

            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('categories');
            $table->foreign('id_level')->references('id')->on('levels');
            $table->foreign('id_client')->references('id')->on('users');
            $table->foreign('id_support')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
