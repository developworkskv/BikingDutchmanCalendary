<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdOrganization extends Migration
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
            $table->boolean('isActive')->nullable();
            $table->char('description1', 255)->nullable();
            $table->char('description2', 255)->nullable();
            $table->double('value')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('bd_organization');
    }
}
