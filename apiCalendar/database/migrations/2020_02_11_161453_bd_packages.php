<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_packages', function (Blueprint $table) {
            $table->bigIncrements('bd_packages_id');            
            $table->string('name');
            $table->double('price');
            $table->integer('numbers_clients');
            $table->boolean('isActive')->nullable();
            $table->char('description1', 255)->nullable();
            $table->char('description2', 255)->nullable();
            $table->double('value')->nullable();
            $table->boolean('status')->nullable(); 
            $table->timestamps();

            //FOREIGN KEY
            $table->unsignedBigInteger('bd_organization_id');
            $table->foreign('bd_organization_id')->references('bd_organization_id')->on('bd_organization');
            $table->unsignedBigInteger('bd_type_packages_id');
            $table->foreign('bd_type_packages_id')->references('bd_type_packages_id')->on('bd_type_packages');
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
        Schema::dropIfExists('bd_packages');
    }
}