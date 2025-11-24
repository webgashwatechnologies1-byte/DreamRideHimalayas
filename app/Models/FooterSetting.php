<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $table = 'footer_settings';

    protected $guarded = ['id'];

    protected $casts = [
        'about' => 'array',
        'services' => 'array',
        'gallery' => 'array',
        'newsletter' => 'array',
        'bottom' => 'array',
    ];

    // Helper: return the single instance
    public static function single()
    {
        return static::first();
    }
}
