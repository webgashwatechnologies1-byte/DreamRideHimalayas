<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tours extends Model
{
    use HasFactory;
    protected $table = "tours";
    protected $fillable = [
        "name","image","place_id","category_id" 
    ];

      // One Tour belongs to one Place
     public function place()
            {
                return $this->belongsTo(Places::class, 'place_id', 'id');
            }

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

      // One Tour has many Packages
      public function packages()
      {
          return $this->hasMany(Packages::class);
      }
}
