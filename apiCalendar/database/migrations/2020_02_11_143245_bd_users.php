<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_users', function (Blueprint $table) {
            $table->bigIncrements('bd_users_id');
         //   $table->string('name');
         //   $table->string('email');
            $table->string('token');
            $table->string('password');
            $table->boolean('isActive')->nullable();
           // $table->char('description1', 255)->nullable();
          //  $table->char('description2', 255)->nullable();
            $table->double('value')->nullable();
            $table->boolean('status')->nullable();
            //$table->rememberToken();
            $table->timestamps();
            //FOREIGN KEY
            $table->unsignedBigInteger('bd_organization_id');
            $table->foreign('bd_organization_id')->references('bd_organization_id')->on('bd_organization');
            
            $table->unsignedBigInteger('bd_type_users_id');
            $table->foreign('bd_type_users_id')->references('bd_type_users_id')->on('bd_type_users');

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
        Schema::dropIfExists('bd_users');
    }
}
