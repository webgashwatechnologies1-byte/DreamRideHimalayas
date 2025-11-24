<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicles extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = [
        "name","images","rc","model","number","status","v_cat_id"
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(VehicleCategory::class, 'v_cat_id');
    }
}
