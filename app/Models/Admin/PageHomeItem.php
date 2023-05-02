<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PageHomeItem extends Model
{
    protected $fillable = [
        'seo_title',
        'seo_meta_description',
        'service_title',
        'service_subtitle',
        'service_status',
        'featured_package_title',
        'featured_package_subtitle',
        'featured_package_status',
        'counter1_number',
        'counter1_text',
        'counter2_number',
        'counter2_text',
        'counter3_number',
        'counter3_text',
        'counter4_number',
        'counter4_text',
        'counter_bg',
        'counter_status',
        'destination_title',
        'destination_subtitle',
        'destination_status',
        'testimonial_title',
        'testimonial_subtitle',
        'testimonial_status',
        'testimonial_bg',
        'team_member_title',
        'team_member_subtitle',
        'team_member_status',
        'latest_blog_title',
        'latest_blog_subtitle',
        'latest_blog_status',
        'client_title',
        'client_subtitle',
        'client_status',
        'newsletter_title',
        'newsletter_text',
        'newsletter_bg',
        'newsletter_status'
    ];

}
