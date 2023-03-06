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
            $table->unsignedBigInteger('vehicle_history_id')->nullable();
            $table->string('interior')->nullable();
            $table->string('body_type')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('HPI_history_check')->nullable();
            $table->string('vin')->nullable();
            $table->date('first_registered')->format('d/m/Y')->nullable();
            $table->date('keeper_start_date')->format('d/m/Y')->nullable();
            $table->date('last_mot_date')->format('d/m/Y')->nullable();
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
