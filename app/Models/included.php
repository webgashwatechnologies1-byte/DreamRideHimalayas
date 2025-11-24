<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Included extends Model
{
    use HasFactory;
    protected $table = "included";
    protected $fillable = [
        "name",
    ];
}
