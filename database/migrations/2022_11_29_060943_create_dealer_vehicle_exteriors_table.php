<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerVehicleExteriorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_vehicle_exteriors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_vehicle_id')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
            $table->string('image_6')->nullable();
            $table->string('image_7')->nullable();
            $table->string('image_8')->nullable();
            $table->string('image_9')->nullable();
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
        Schema::dropIfExists('dealer_vehicle_exteriors');
    }
}
