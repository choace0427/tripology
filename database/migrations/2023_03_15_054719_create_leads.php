<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable();
            $table->string('travel_from_locality')->nullable();
            $table->integer('travel_from_city_id')->nullable();
            $table->integer('travel_from_state_id')->nullable();
            $table->integer('travel_from_country_id')->nullable();
            $table->string('travel_to_locality')->nullable();
            $table->integer('travel_to_city_id')->nullable();
            $table->integer('travel_to_state_id')->nullable();
            $table->integer('travel_to_country_id')->nullable();
            $table->string('travel_start_date')->nullable();
            $table->string('travel_end_date')->nullable();
            $table->string('travel_type')->nullable();
            $table->string('travel_budget')->nullable();
            $table->string('travel_desc')->nullable();
            $table->integer('passenger_cnt_adult')->nullable();
            $table->integer('passenger_cnt_minor')->nullable();
            $table->integer('passenger_minor_age')->nullable();
            $table->string('passenger_special_needs')->nullable();
            $table->integer('max_responses')->nullable();
            $table->boolean('status')->default(1)->comment('0 = deactivate,1 = active');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
