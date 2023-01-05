<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealersOrderVehicleRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers_order_vehicle_requests', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('vehicle_id')->nullable();
            $table->string('request_price')->nullable();
            $table->string('status')->nullable();
            $table->string('admin_updated_status')->nullable();
            $table->timestamp('meeting_date_time')->nullable();
            $table->string('meeting_status')->nullable();
            $table->string('other_description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('dealers_order_vehicle_requests');
    }
}
