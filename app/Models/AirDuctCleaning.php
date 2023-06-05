<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirDuctCleaning extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_name',
        'schedule_date',
        'time_frame',
        'furnace',
        'area',
    ];

    const FURNACE = [
        '1' => '1',
        '2' => '2',
        '3+' => '3+',
    ];

    const TIME_FRAME = [
        '8am_9am' => "8 AM - 9 AM",
        '11am_1pm' => "11 AM - 1 PM",
        '1pm_4pm' => "1 PM - 4 PM"
    ];
}
