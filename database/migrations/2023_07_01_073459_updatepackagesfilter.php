<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updatepackagesfilter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('p_transposition_id')->nullable();
            $table->integer('p_accomodation_id')->nullable();
            $table->integer('p_traveller_id')->nullable();
            $table->integer('p_price_id')->nullable();
            $table->integer('p_rating')->nullable();
            $table->integer('p_combine_id')->nullable();
            $table->integer('p_distance_id')->nullable();
            $table->text('p_travel_guide')->nullable();
            $table->text('p_travel_day')->nullable();
            $table->text('p_travel_accomodation')->nullable();
            $table->text('p_travel_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}