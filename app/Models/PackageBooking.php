<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBooking extends Model
{
    protected $fillable = [
        'package_id',
        'date',
        'user_name',
        'user_phone',
        'user_email',
        'no_of_riders',
        'services',
        'amount',
        'payment_status',
        'message',
        'package_type'
    ];

    protected $casts = [
        'services' => 'array',
        'package_type' => 'string'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}