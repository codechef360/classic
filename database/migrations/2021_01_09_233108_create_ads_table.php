<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('registered_by');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('sub_category_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('package_id');
            $table->string('title');
            $table->text('description');
            $table->text('ad_tag')->nullable();
            $table->double('price')->default(0)->comment('price of item');
            $table->tinyInteger('negotiable')->default(0)->comment('0=no, 1=yes');
            $table->string('featured_image');
            $table->string('slug');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending, 1=in-progress, 2=expired, 3=declined');
            $table->unsignedInteger('view_counter')->default(0);
            $table->integer('price_type')->default(0)->comment('0=negotiable,1=fixed');
            $table->integer('product_condition')->default(0)->comment('0=used,1=new');
            $table->integer('ad_type')->default(0)->comment('0=Sales,1=promo');
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
        Schema::dropIfExists('ads');
    }
}
