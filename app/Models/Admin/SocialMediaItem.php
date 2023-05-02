<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SocialMediaItem extends Model
{
    protected $fillable = [
        'social_url',
        'social_icon',
        'social_order'
    ];

}
