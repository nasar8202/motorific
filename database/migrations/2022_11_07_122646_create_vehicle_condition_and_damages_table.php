<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleConditionAndDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_condition_and_damages', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_id')->nullable();
            $table->string('exterior_grade')->nullable();
            $table->string('scratches_and_scuffs')->nullable();
            $table->string('dents')->nullable();
            $table->string('paintwork_problems')->nullable();
            $table->string('windscreen_damage')->nullable();
            $table->string('broken_missing')->nullable();
            $table->string('warning_lights_on_dashboard')->nullable();
            $table->string('service_record')->nullable();
            $table->string('main_dealer_services')->nullable();
            $table->string('independent_dealer_service')->nullable();
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
        Schema::dropIfExists('vehicle_condition_and_damages');
    }
}
