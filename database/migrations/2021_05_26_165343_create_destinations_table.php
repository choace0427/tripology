<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->text('d_name');
            $table->text('d_slug');
            $table->text('d_photo');
            $table->text('d_heading')->nullable();
            $table->text('d_short_description')->nullable();
            $table->text('d_package_heading')->nullable();
            $table->text('d_package_subheading')->nullable();
            $table->text('d_detail_heading')->nullable();
            $table->text('d_detail_subheading')->nullable();
            $table->text('d_introduction')->nullable();
            $table->text('d_experience')->nullable();
            $table->text('d_weather')->nullable();
            $table->text('d_hotel')->nullable();
            $table->text('d_transportation')->nullable();
            $table->text('d_culture')->nullable();
            $table->smallInteger('d_order')->default(0);
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
        Schema::dropIfExists('destinations');
    }
}
