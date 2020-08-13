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
        
       

        //TABLA BD_CLIENTS
        
        Schema::create('bd_clients', function (Blueprint $table) {
            $table->bigIncrements('bd_clients_id');
            $table->string('nacionality');
            $table->decimal('height');
            $table->decimal('weight');
            $table->bigInteger('passport')->nullable();
            $table->boolean('isActive')->nullable();
            $table->char('description1', 255)->nullable();
            $table->char('description2', 255)->nullable();
            $table->double('value')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            //FOREIGN KEY 
            $table->unsignedBigInteger('bd_organization_id');
            $table->foreign('bd_organization_id')->references('bd_organization_id')->on('bd_organization');

            $table->unsignedBigInteger('bd_persons_id');
            $table->foreign('bd_persons_id')->references('bd_persons_id')->on('bd_persons');
            
            
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