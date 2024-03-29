<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'p_name',
        'p_slug',
        'p_photo',
        'p_description',
        'p_description_short',
        'p_location',
        'p_start_date',
        'p_end_date',
        'p_last_booking_date',
        'p_map',
        'p_itinerary',
        'p_price',
        'p_policy',
        'p_terms',
        'p_is_featured',
        'destination_id',
        'p_age_range',
        'p_max_group_size',
        'p_tour_operator',
        'p_started_from',
        'p_operated_in',
        'p_qoute_form_photo',
        'p_travel_guide',
        'p_transposition_id',
        'p_accomodation_id',
        'p_traveller_id',
        'p_rating',
        'p_price_id',
        'p_distance_id',
        'p_combine_id',
        'p_travel_day',
        'p_travel_accomodation',
        'p_travel_type',
        'seo_title',
        'seo_meta_description',
    ];

    public function destination()
    {
        return $this->belongsTo('App\Models\Admin\Destination');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Admin\Review','package_id')->where('published', 1);
    }

    public function agency()
    {
        return $this->belongsTo('App\Models\Admin\Admin','p_tour_operator');
    }
    
    public function wishlist(){
        return $this->hasMany('App\Models\Wishlist');
    }
}