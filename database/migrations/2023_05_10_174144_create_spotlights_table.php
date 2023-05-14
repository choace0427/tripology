<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spotlights', function (Blueprint $table) {
            $table->id();
            $table->string('spotlight_heading')->nullable();
            $table->text('spotlight_text')->nullable();
            $table->string('spotlight_deal_heading')->nullable();
            $table->string('spotlight_deal_offer_text')->nullable();
            $table->string('spotlight_deal_button_text')->nullable();
            $table->string('spotlight_deal_button_url')->nullable();
            $table->string('spotlight_deal_text')->nullable();
            $table->string('spotlight_facilities_heading')->nullable();
            $table->text('spotlight_facilities')->nullable();
            $table->text('spotlight_facilities_button_text')->nullable();
            $table->text('spotlight_facilities_button_url')->nullable();
            $table->string('spotlight_facilities_photo')->nullable();
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
        Schema::dropIfExists('spotlights');
    }
}
