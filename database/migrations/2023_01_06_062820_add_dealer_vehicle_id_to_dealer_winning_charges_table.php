<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDealerVehicleIdToDealerWinningChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealer_winning_charges', function (Blueprint $table) {
            $table->string('dealer_vehicle_id')->after('vehicle_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealer_winning_charges', function (Blueprint $table) {
            //
        });
    }
}
