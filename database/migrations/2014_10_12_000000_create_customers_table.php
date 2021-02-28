<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->tinyInteger('gender')->default(1)->nullable()->comment('1=male, 2=female');
            $table->integer('location_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->string('website')->nullable();
            $table->integer('account_status')->nullable()->comment('1=active,0=inactive,3=suspended,');
            $table->string('slug')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_website')->nullable();
            $table->text('about')->nullable();
            $table->string('logo')->nullable()->default('avatar.png');
            $table->string('avatar')->nullable()->default('avatar.png');
            $table->integer('verification')->nullable()->comment('0=unverified, 1=verified');
            $table->integer('verified_by')->nullable();
            $table->dateTime('date_verified')->nullable();
            $table->string('verification_document')->nullable();
            $table->rememberToken();
            $table->unsignedBigInteger('registered_by')->nullable()->default(0)->comment('0=self');
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
        Schema::dropIfExists('customers');
    }
}
