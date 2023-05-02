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
            $table->text('p_name');
            $table->text('p_slug');
            $table->text('p_photo');
            $table->text('p_description')->nullable();
            $table->text('p_description_short')->nullable();
            $table->text('p_location')->nullable();
            $table->text('p_start_date');
            $table->text('p_end_date');
            $table->text('p_last_booking_date');
            $table->text('p_map')->nullable();
            $table->text('p_itinerary')->nullable();
            $table->text('p_price');
            $table->text('p_policy')->nullable();
            $table->text('p_terms')->nullable();
            $table->text('p_is_featured');
            $table->text('destination_id');
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_description')->nullable();
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
