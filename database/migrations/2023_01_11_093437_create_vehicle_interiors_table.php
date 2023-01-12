<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInteriorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_interiors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->string('dashboard')->nullable();
            $table->string('passenger_side_interior')->nullable();
            $table->string('driver_side_interior')->nullable();
            $table->string('floor')->nullable();
            $table->string('ceiling')->nullable();
            $table->string('boot')->nullable();
            $table->string('rear_windscreen')->nullable();
            $table->string('passenger_seat')->nullable();
            $table->string('driver_seat')->nullable();
            $table->string('rear_seats')->nullable();
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
        Schema::dropIfExists('vehicle_interiors');
    }
}
