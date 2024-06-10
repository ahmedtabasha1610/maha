<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class content extends Model 
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'id',
        'image',
        'titlear',
        'bodyar',
      
    ];
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('storage/images-page/' . $value);
        } else {
            return asset('no-image.png');
        }
    }
}

