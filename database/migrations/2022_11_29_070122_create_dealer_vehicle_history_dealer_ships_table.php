<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerVehicleHistoryDealerShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_vehicle_history_dealer_ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_vehicle_historie_id')->nullable();
            $table->string('date')->nullable();
            $table->string('milage')->nullable();
            $table->string('dealership')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('dealer_vehicle_history_dealer_ships');
    }
}
