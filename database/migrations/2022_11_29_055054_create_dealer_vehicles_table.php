<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('vehicle_registartion_number')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->string('vehicle_year')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_tank')->nullable();
            $table->string('previous_owners')->nullable();
            $table->integer('vehicle_mileage')->nullable();
            $table->integer('vehicle_price')->nullable();
            $table->integer('retail_price')->nullable();
            $table->integer('clean_price')->nullable();
            $table->integer('average_price')->nullable();
            $table->integer('hidden_price')->nullable();
            $table->string('vehicle_category')->nullable();
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
        Schema::dropIfExists('dealer_vehicles');
    }
}
