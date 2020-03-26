<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TABLA BD_ORGANIZATION
        Schema::create('bd_organization', function (Blueprint $table) {
            $table->bigIncrements('bd_organization_id');
            $table->string('name');
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();
        });

        //TABLA BD_CLIENTS
        Schema::create('bd_clients', function (Blueprint $table) {
            $table->bigIncrements('bd_clients_id');
            $table->string('nacionality');
            $table->decimal('height');
            $table->decimal('weight');
            $table->date('birth_day');
            $table->integer('passport');
            $table->rememberToken();
            $table->timestamps();
            //FOREIGN KEY
            $table->unsignedBigInteger('bd_organization_id');
            $table->foreign('bd_organization_id')->references('bd_organization_id')->on('bd_organization');
            
            
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
        Schema::dropIfExists('bd_clients');
        Schema::dropIfExists('bd_organization');
    }
}