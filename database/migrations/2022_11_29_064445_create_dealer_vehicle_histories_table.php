<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerVehicleHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_vehicle_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_vehicle_id')->nullable();
            $table->string('keys')->nullable();
            $table->string('previous_owners')->nullable();
            $table->string('service_history_title')->nullable();
            $table->string('mileage')->nullable();
            $table->string('v5_status')->nullable();
            $table->string('origin')->nullable();
            $table->string('interior')->nullable();
            $table->string('exterior')->nullable();
            $table->string('audio_and_communications')->nullable();
            $table->string('drivers_assistance')->nullable();
            $table->string('checkbox_questions')->nullable();
            $table->string('illumination')->nullable();
            $table->string('performance')->nullable();
            $table->string('safety_and_security')->nullable();
            $table->string('status')->default(1)->comment('1 = Active , 2 = Deactive');
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
        Schema::dropIfExists('dealer_vehicle_histories');
    }
}
