<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
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
        Schema::dropIfExists('vehicles');
    }
}
