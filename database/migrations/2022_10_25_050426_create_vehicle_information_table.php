<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->string('vehicle_feature_id')->nullable();
            $table->unsignedBigInteger('seat_material_id')->nullable();
            $table->unsignedBigInteger('number_of_keys_id')->nullable();
            $table->unsignedBigInteger('tool_pack_id')->nullable();
            $table->unsignedBigInteger('looking_wheel_nut_id')->nullable();
            $table->unsignedBigInteger('smooking_id')->nullable();
            $table->unsignedBigInteger('logbook_id')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('vehicle_owner_id')->nullable();
            $table->unsignedBigInteger('private_plate_id')->nullable();
            $table->unsignedBigInteger('finance_id')->nullable();
            
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
        Schema::dropIfExists('vehicle_information');
    }
}
