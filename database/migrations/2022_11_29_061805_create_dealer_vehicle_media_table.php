<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerVehicleMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_vehicle_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_vehicle_id')->nullable();
            $table->string('condition_damage')->nullable();
            $table->string('condition_damage_url')->nullable();
            $table->boolean('existing_condition_report')->default(0);
            $table->boolean('any_damage_checked')->default(0);
            $table->string('any_damage_on_your_vehicle')->nullable();
            $table->string('advert_description')->nullable();
            $table->string('attention_grabber')->nullable();
            $table->string('nearside_front')->nullable();
            $table->string('nearside_rear')->nullable();
            $table->string('offside_front')->nullable();
            $table->string('offside_rear')->nullable();
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
        Schema::dropIfExists('dealer_vehicle_media');
    }
}
