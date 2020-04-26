<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BdTypeUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_type_users', function (Blueprint $table) {
            $table->bigIncrements('bd_type_users_id');
            $table->string('type_user');
            $table->string('code');
            $table->boolean('isAdmin');
            $table->boolean('isEmployer');
            $table->boolean('isDesigned');
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
        Schema::dropIfExists('bd_type_users');
    }
}
