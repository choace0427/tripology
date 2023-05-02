<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PageContactItem extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'status',
        'contact_address',
        'contact_email',
        'contact_phone',
        'contact_map',
        'seo_title',
        'seo_meta_description'
    ];

}
