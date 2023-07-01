<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updatepackagestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            if (!Schema::hasColumn('packages', 'p_transposition_id')) {
                $table->integer('p_transposition_id')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_accomodation_id')) {
                $table->integer('p_accomodation_id')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_traveller_id')) {
                $table->integer('p_traveller_id')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_price_id')) {
                $table->integer('p_price_id')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_rating')) {
                $table->integer('p_rating')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_combine_id')) {
                $table->integer('p_combine_id')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_distance_id')) {
                $table->integer('p_distance_id')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_travel_guide')) {
                $table->text('p_travel_guide')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_travel_day')) {
                $table->text('p_travel_day')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_travel_accomodation')) {
                $table->text('p_travel_accomodation')->nullable();
            }
            if (!Schema::hasColumn('packages', 'p_travel_type')) {
                $table->text('p_travel_type')->nullable();
            }
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