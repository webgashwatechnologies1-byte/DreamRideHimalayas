<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
    protected $fillable = ['title','slug','meta_title','meta_description', 'keywords',];
    protected $casts = [
        'keywords' => 'array',   // ← RETURNS ARRAY AUTOMATICALLY
    ];
    public function sections() {
        return $this->hasMany(PageSection::class)->orderBy('order_index');
    }
}

