<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bd_persons', function (Blueprint $table) {
            $table->bigIncrements('bd_persons_id');
            $table->string('name');
            $table->string('lastName');
            $table->string('email');
           // $table->string('password');
           // $table->string('nacionality');
          //  $table->decimal('height');
         //   $table->decimal('weight');
            $table->date('birth_date');
            $table->string('gender');
            $table->integer('dni')->unique()->nullable();
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
        Schema::dropIfExists('bd_person');
    }
}