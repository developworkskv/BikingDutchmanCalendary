<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdPackagesDestination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_packages_destination', function (Blueprint $table) {
            $table->bigIncrements('bd_packages_destination_id');            
            $table->string('code_pack_destination');
            $table->timestamps();
            //FOREIGN KEY
            $table->unsignedBigInteger('bd_destination_id');
            $table->foreign('bd_destination_id')->references('bd_destination_id')->on('bd_destination');
            $table->unsignedBigInteger('bd_packages_id');
            $table->foreign('bd_packages_id')->references('bd_packages_id')->on('bd_packages');
        

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
        Schema::dropIfExists('bd_packages_destination');
    }
}
