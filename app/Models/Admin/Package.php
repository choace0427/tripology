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
        'seo_title',
        'seo_meta_description'
    ];

    public function destination()
    {
        return $this->belongsTo('App\Models\Admin\Destination');
    }

}
