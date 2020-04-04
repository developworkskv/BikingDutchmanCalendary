<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdClientsPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('bd_clients_packages', function (Blueprint $table) {
            $table->bigIncrements('bd_clients_packages_id');            
            $table->double('total');
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();
            //FOREIGN KEY
            $table->unsignedBigInteger('bd_clients_id');
            $table->foreign('bd_clients_id')->references('bd_clients_id')->on('bd_clients');
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
        Schema::dropIfExists('bd_clients_packages');
    }
}