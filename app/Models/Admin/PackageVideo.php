<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PackageVideo extends Model
{
    protected $fillable = [
        'package_id',
        'video_youtube_id'
    ];
}
