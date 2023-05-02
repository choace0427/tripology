<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PackagePhoto extends Model
{
    protected $fillable = [
        'package_id',
        'photo'
    ];
}
