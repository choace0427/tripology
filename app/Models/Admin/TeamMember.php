<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'designation',
        'detail',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'instagram',
        'email',
        'phone',
        'website',
        'photo',
        'seo_title',
        'seo_meta_description'
    ];

}
