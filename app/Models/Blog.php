<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'content',
        'reading_time',
        'tags',
        'meta_description',
        'comments',
        'thumbnail',
    ];

    protected $casts = [
        'author' => 'array',
        'tags' => 'array',
        'meta_description' => 'array',
        'comments' => 'array',
    ];
}
