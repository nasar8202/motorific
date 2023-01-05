<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerVehicleExteriorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_vehicle_exterior_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_vehicle_id')->nullable();
            $table->string('front_door_left')->nullable();
            $table->string('back_door_left')->nullable();
            $table->string('front_door_right')->nullable();
            $table->string('back_door_right')->nullable();
            $table->string('top')->nullable();
            $table->string('bonut')->nullable();
            $table->string('front')->nullable();
            $table->string('back')->nullable();
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
        Schema::dropIfExists('dealer_vehicle_exterior_details');
    }
}
