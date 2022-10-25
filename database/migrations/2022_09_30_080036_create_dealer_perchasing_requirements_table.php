<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerPerchasingRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_perchasing_requirements', function (Blueprint $table) {
            $table->id();
            $table->integer('dealer_id')->unsigned()->default(0);
            $table->string('all_makes')->nullable();
            $table->string('specific_makes')->nullable();
            $table->integer('lowest_purchase_price');
            $table->integer('highest_purchase_price');
            $table->integer('age_range_from');
            $table->integer('age_range_to');
            $table->integer('mileage_from');
            $table->integer('mileage_to');
            $table->string('how_far_distance');
            $table->string('purchase_each_month_vehicles');
            $table->string('any_thing_else')->nullable();
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
        Schema::dropIfExists('dealer_perchasing_requirements');
    }
}
