<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->default(2)->comment('1 = Admin , 2 = User');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('post_code');
            $table->string('phone_number');
            $table->string('mile_age');
            $table->string('company_name');
            $table->string('position');
            $table->string('hear_about_us');
            $table->boolean('privacy_policy')->default(0);
            $table->string('status')->default(1)->comment('1 = Active , 2 = Deactive');;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
