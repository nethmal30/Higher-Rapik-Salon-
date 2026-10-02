<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'service',
        'message',
        'status',
        'booking_date',
        'booking_time',
    ];
}
