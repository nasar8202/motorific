<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerAdvertVehicleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_advert_vehicle_details', function (Blueprint $table) {
            $table->unsignedBigInteger('dealer_vehicle_id')->nullable();
            $table->string('listing_type')->nullable();
            $table->string('stand_in_value')->nullable();
            $table->string('vat')->nullable();
            $table->boolean('confirm')->default(0);
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
        Schema::dropIfExists('dealer_advert_vehicle_details');
    }
}
