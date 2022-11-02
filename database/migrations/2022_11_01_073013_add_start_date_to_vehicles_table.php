<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartDateToVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {

            $table->date('start_vehicle_date')->format('d/m/Y')->nullable();
            $table->date('end_vehicle_date')->format('d/m/Y')->nullable();
            $table->time("start_vehicle_time")->nullable();
            $table->time("end_vehicle_time")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
        });
    }
}
