<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPassengerBackDoorToVehicleInteriorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_interiors', function (Blueprint $table) {
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
        Schema::table('vehicle_interiors', function (Blueprint $table) {
            //
        });
    }
}
