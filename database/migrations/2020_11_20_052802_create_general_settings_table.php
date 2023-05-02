<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('favicon');
            $table->text('login_bg');
            $table->text('top_bar_email')->nullable();
            $table->text('top_bar_phone')->nullable();
            $table->text('top_bar_social_status');
            $table->text('top_bar_login_status');
            $table->text('top_bar_registration_status');
            $table->text('top_bar_cart_status');
            $table->tinyInteger('sidebar_total_recent_post');
            $table->text('theme_color');
            $table->text('footer_column1_heading');
            $table->text('footer_column1_total_item');
            $table->text('footer_column2_heading');
            $table->text('footer_column2_total_item');
            $table->text('footer_column3_heading');
            $table->text('footer_column3_total_item');
            $table->text('footer_column4_heading');
            $table->text('footer_address');
            $table->text('footer_email');
            $table->text('footer_phone');
            $table->text('footer_copyright');
            $table->text('preloader_photo');
            $table->text('preloader_status');
            $table->text('google_analytic_tracking_id');
            $table->text('google_analytic_status');
            $table->text('tawk_live_chat_code');
            $table->text('tawk_live_chat_status');
            $table->text('cookie_consent_message');
            $table->text('cookie_consent_button_text');
            $table->text('cookie_consent_text_color');
            $table->text('cookie_consent_bg_color');
            $table->text('cookie_consent_button_text_color');
            $table->text('cookie_consent_button_bg_color');
            $table->text('cookie_consent_status');
            $table->text('google_recaptcha_site_key');
            $table->text('google_recaptcha_status');
            $table->text('layout_direction');
            $table->text('banner_about');
            $table->text('banner_service');
            $table->text('banner_service_detail');
            $table->text('banner_blog');
            $table->text('banner_blog_detail');
            $table->text('banner_category');
            $table->text('banner_team_member');
            $table->text('banner_team_member_detail');
            $table->text('banner_faq');
            $table->text('banner_contact');
            $table->text('banner_search');
            $table->text('banner_payment');
            $table->text('banner_login');
            $table->text('banner_registration');
            $table->text('banner_forget_password');
            $table->text('banner_term');
            $table->text('banner_privacy');
            $table->text('banner_testimonial');
            $table->text('banner_destination');
            $table->text('banner_destination_detail');
            $table->text('banner_package');
            $table->text('banner_package_detail');
            $table->text('paypal_environment');
            $table->text('paypal_client_id');
            $table->text('paypal_secret_key');
            $table->text('stripe_public_key');
            $table->text('stripe_secret_key');
            $table->text('currency_name');
            $table->text('currency_sign');
            $table->text('currency_per_usd_value');
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
        Schema::dropIfExists('general_settings');
    }
}
