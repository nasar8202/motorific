<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeetingDateTimeToBidedVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bided_vehicles', function (Blueprint $table) {
            $table->string('admin_updated_status')->nullable();
            $table->timestamp('meeting_date_time')->nullable();
            $table->string('meeting_status')->nullable();
            $table->string('other_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bided_vehicles', function (Blueprint $table) {
            //
        });
    }
}
