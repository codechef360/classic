<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('registered_by')->default(0)->comment('0=customer')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_domain')->nullable();
            $table->text('about')->nullable();
            $table->integer('delivery_estimate')->default(1)->nullable();
            $table->double('delivery_fee')->default(0)->nullable();
            $table->string('working_days')->default('1,2,3,4,5,6')->nullable();
            $table->string('working_hours_start')->nullable();
            $table->string('working_hours_end')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
