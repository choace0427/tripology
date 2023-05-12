<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'start_date',
        'end_date',
        'price',
    ];
}
