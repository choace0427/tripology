<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'd_name',
        'd_slug',
        'd_photo',
        'd_heading',
        'd_short_description',
        'd_package_heading',
        'd_package_subheading',
        'd_detail_heading',
        'd_detail_subheading',
        'd_introduction',
        'd_experience',
        'd_weather',
        'd_hotel',
        'd_transportation',
        'd_culture',
        'd_order',
        'd_parent_id',
        'seo_title',
        'seo_meta_description'
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'd_parent_id');
    }
}
