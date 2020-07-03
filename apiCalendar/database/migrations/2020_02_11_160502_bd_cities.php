<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_cities', function (Blueprint $table) {
            $table->bigIncrements('bd_cities_id');            
            $table->string('name');
            $table->boolean('isActive')->nullable();
            $table->char('description', 255)->nullable();
            $table->double('value')->nullable();
            $table->boolean('status')->nullable();            
           // $table->rememberToken();
            $table->timestamps();

            //Foreign Key
            $table->unsignedBigInteger('bd_organization_id');
            $table->foreign('bd_organization_id')->references('bd_organization_id')->on('bd_organization');
            //$table->unsignedBigInteger('bd_hotels_id');
            //$table->foreign('bd_hotels_id')->references('bd_hotels_id')->on('bd_hotels');
    
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
        Schema::dropIfExists('bd_cities');
    }
}
