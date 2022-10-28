<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('postcode');
            $table->string('company_type');
            $table->string('website');
            $table->string('company_phone');
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
            $table->string('status')->default(2)->comment('1 = Approve Dealers , 2 = Block Dealers');
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
        Schema::dropIfExists('user_details');
    }
}
