<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'id',
        'image',
        'entitle',
      
    ];
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('storage/images-services/' . $value);
        } else {
            return asset('no-image.png');
        }
    }

  
}
