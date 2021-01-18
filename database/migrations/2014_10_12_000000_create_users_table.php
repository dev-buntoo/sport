<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // custom


            
		$table->string('fname')->nullable()->default('NULL');
		$table->string('mname')->nullable()->default('NULL');
		$table->string('lname')->nullable()->default('NULL');
		$table->string('date_of_birth')->nullable()->default('NULL');
		$table->string('phone_1')->nullable()->default('NULL');
		$table->string('phone_2')->nullable()->default('NULL');
		$table->string('email_1')->nullable()->default('NULL');
		$table->string('email_2')->nullable()->default('NULL');
		$table->string('gender')->nullable()->default('NULL');
		$table->text('address')->nullable()->default('NULL');
		$table->string('acc_name')->nullable()->default('NULL');
		$table->string('acc_number')->nullable()->default('NULL');
		$table->string('bank_name')->nullable()->default('NULL');
		$table->string('bsb_number')->nullable()->default('NULL');
		$table->string('tfn_number')->nullable()->default('NULL');
		$table->string('payment_frequency')->nullable()->default('NULL');
		$table->string('member_number')->nullable()->default('NULL');
		$table->string('status')->nullable()->default('NULL');
		$table->string('role')->nullable()->default('NULL');
		$table->string('life_member')->nullable()->default('NULL');
		$table->string('date_of_joining')->nullable()->default('NULL');
		$table->string('referre_level')->nullable()->default('NULL');
		$table->string('coach_level')->nullable()->default('NULL');
		$table->string('wwcc_number')->nullable()->default('NULL');
		$table->string('wwcc_expiry')->nullable()->default('NULL');
		$table->string('photo')->nullable()->default('NULL');



            
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
