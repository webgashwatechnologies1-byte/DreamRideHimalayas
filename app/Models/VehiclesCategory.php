<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehiclesCategory extends Model
{
    use HasFactory;
    protected $table = 'v_cat';
    protected $fillable = [
        "name"
    ];
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
