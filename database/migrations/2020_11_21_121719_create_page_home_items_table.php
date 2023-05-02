<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageHomeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_home_items', function (Blueprint $table) {
            $table->id();
            $table->text('seo_title');
            $table->text('seo_meta_description');
            $table->text('service_title');
            $table->text('service_subtitle');
            $table->text('service_status');
            $table->text('featured_package_title');
            $table->text('featured_package_subtitle');
            $table->text('featured_package_status');
            $table->text('counter1_number');
            $table->text('counter1_text');
            $table->text('counter2_number');
            $table->text('counter2_text');
            $table->text('counter3_number');
            $table->text('counter3_text');
            $table->text('counter4_number');
            $table->text('counter4_text');
            $table->text('counter_bg');
            $table->text('counter_status');
            $table->text('destination_title');
            $table->text('destination_subtitle');
            $table->text('destination_status');
            $table->text('testimonial_title');
            $table->text('testimonial_subtitle');
            $table->text('testimonial_status');
            $table->text('testimonial_bg');
            $table->text('team_member_title');
            $table->text('team_member_subtitle');
            $table->text('team_member_status');
            $table->text('latest_blog_title');
            $table->text('latest_blog_subtitle');
            $table->text('latest_blog_status');
            $table->text('client_title');
            $table->text('client_subtitle');
            $table->text('client_status');
            $table->text('newsletter_title');
            $table->text('newsletter_text');
            $table->text('newsletter_bg');
            $table->text('newsletter_status');
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
        Schema::dropIfExists('page_home_items');
    }
}
