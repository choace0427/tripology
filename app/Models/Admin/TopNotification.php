<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_message',
    ];
}
