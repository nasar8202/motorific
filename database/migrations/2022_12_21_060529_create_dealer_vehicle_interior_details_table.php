<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerVehicleInteriorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_vehicle_interior_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_vehicle_id')->nullable();
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
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealer_vehicle_interior_details');
    }
}
