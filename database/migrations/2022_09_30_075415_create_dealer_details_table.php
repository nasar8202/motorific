<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_details', function (Blueprint $table) {
            $table->id();
            $table->integer('dealer_id')->unsigned()->default(0);
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('postcode');
            $table->string('company_type');
            $table->string('website');
            $table->string('company_phone');
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
        Schema::dropIfExists('dealer_details');
    }
}
