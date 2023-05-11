<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spotlight extends Model
{
    protected $fillable = [
        'spotlight_heading',
        'spotlight_text',
        'spotlight_deal_heading',
        'spotlight_deal_offer_text',
        'spotlight_deal_button_text',
        'spotlight_deal_button_url',
        'spotlight_facilities_heading',
        'spotlight_deal_text',
        'spotlight_facilities_button_text',
        'spotlight_facilities_button_url',
        'spotlight_facilities',
        'spotlight_facilities_photo'
    ];
}
