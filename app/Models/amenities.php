<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Amenities extends Model
{
    use HasFactory;
    protected $table = "amenities";
    protected $fillable = [
        "name",
    ];
}
