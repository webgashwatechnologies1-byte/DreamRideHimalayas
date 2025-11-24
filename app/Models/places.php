<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Places extends Model
{
    use HasFactory;
    protected $table = "places";
    protected $fillable = [
        "name",
    ];
    public function tours()
    {
        return $this->hasMany(Tours::class, 'place_id', 'id');
    }
}
