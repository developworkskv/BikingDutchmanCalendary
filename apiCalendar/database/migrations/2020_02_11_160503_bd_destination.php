<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdDestination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_destination', function (Blueprint $table) {
            $table->bigIncrements('bd_destination_id');            
            $table->string('name');
            $table->integer('availability'); 
            $table->boolean('isActive')->nullable();
            $table->char('description1', 255)->nullable();
            $table->char('description2', 255)->nullable();
            $table->double('value')->nullable();
            $table->boolean('status')->nullable();            
            //$table->rememberToken();
            $table->timestamps();
           //Foreign Key
           $table->unsignedBigInteger('bd_organization_id');
           $table->foreign('bd_organization_id')->references('bd_organization_id')->on('bd_organization');
           $table->unsignedBigInteger('bd_cities_id');
           $table->foreign('bd_cities_id')->references('bd_cities_id')->on('bd_cities');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bd_destination');
    }
}