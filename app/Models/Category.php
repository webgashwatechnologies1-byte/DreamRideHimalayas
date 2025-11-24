<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image'];

    public function tours()
    {
        return $this->hasMany(Tours::class);
    }
}

