<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPassengerBackDoorToDealerVehicleInteriorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealer_vehicle_interior_details', function (Blueprint $table) {
            $table->string('passenger_back_door')->nullable();
            $table->string('driver_back_door')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealer_vehicle_interior_details', function (Blueprint $table) {
            //
        });
    }
}
