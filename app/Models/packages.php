<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Packages extends Model
{
    use HasFactory;

    protected $table = "packages";

    protected $fillable = [
        'information',
        'tour',
        'locationshare',
        'reviews',
        'feature',
        'pricing',
        'services',
        'gallery',
        'tour_id',
        'place_id',
    ];

    protected $casts = [
        'information' => 'array',
        'tour' => 'array',
        'locationshare' => 'array',
        'reviews' => 'array',
        'feature' => 'array',
        'services' => 'array',
        'gallery' => 'array',
    ];
    public function tour()
    {
        return $this->belongsTo(Tours::class);
    }
}
