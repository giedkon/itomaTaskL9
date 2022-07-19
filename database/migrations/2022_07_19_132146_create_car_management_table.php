<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_management', function (Blueprint $table) {
            $table->integer('id')->primary();

            $table->integer('cars_id');
            $table->foreign('cars_id')->references('id')->on('cars');

            $table->integer('department_id');
            $table->foreign('department_id')->references('id')->on('departments');    
            
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');  
            
            $table->date('date_from');
            $table->date('date_to');

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
        Schema::dropIfExists('car_management');
    }
};
