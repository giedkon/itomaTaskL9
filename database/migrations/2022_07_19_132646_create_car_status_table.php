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
        Schema::create('car_status', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();

            $table->integer('cars_id');
            $table->foreign('cars_id')->references('id')->on('cars');    
            
            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');  

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
        Schema::dropIfExists('car_status');
    }
};
