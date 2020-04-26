<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdHotels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_hotels', function (Blueprint $table) {
            $table->bigIncrements('bd_hotels_id');            
            $table->string('name');             
            $table->boolean('isActive')->nullable();
            $table->char('description1', 255)->nullable();
            $table->char('description2', 255)->nullable();
            $table->double('value')->nullable();
            $table->boolean('status')->nullable();            
            //$table->rememberToken();
            $table->timestamps();
            //foregien
            $table->unsignedBigInteger('bd_destination_id');
            $table->foreign('bd_destination_id')->references('bd_destination_id')->on('bd_destination');
    
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
        Schema::dropIfExists('bd_hotels');
    }
}
