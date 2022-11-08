<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEngineSizeToVehicleInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_information', function (Blueprint $table) {
            $table->string('interior')->nullable();
            $table->string('body_type')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('HPI_history_check')->nullable();
            $table->string('vin')->nullable();
            $table->string('first_registered')->nullable();
            $table->string('keeper_start_date')->nullable();
            $table->string('last_mot_date')->nullable();
            $table->string('previous_owners')->nullable();
            $table->string('seller_keeping_plate')->nullable();
            $table->string('additional_information')->nullable();
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_information', function (Blueprint $table) {
            //
        });
    }
}
