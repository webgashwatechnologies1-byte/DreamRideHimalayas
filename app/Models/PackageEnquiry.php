<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageEnquiry extends Model
{
    protected $fillable = [
        'package_id',
        'date',
        'user_name',
        'user_phone',
        'user_email',
        'no_of_riders',
        'services',
        'message'
    ];

    protected $casts = [
        'services' => 'array',
        'date' => 'date'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

