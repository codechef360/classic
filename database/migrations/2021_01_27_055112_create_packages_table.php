<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->integer('duration');
            $table->double('amount')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=Active, 0=inactive');
            $table->integer('adpack')->default(2)->comment('maximum # of ads that can be posted');
            $table->integer('adpack_category')->nullable()->comment('1=in_cars, 2=in_property, 3=in_others | maximum # of ads that can be posted');
            $table->tinyInteger('auto_renew')->default(0)->comment('in hours, time interval to renew');
            $table->tinyInteger('sms_notification')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('email_notification')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('website_link')->default(0)->comment('0=no, 1=yes');
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
        Schema::dropIfExists('packages');
    }
}
