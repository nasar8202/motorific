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
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('post_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mile_age')->nullable();
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->string('hear_about_us')->nullable();
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
