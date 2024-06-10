<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Configuration extends Model 
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'address',
        'facebook',
        'instagram',
        'whatsapp',
        'twiter',
        'footernote',
        'desginby',
        'websitename',
        'iconwebsite',
       'description',
       'title',
       'iconwebsiteen',
    ];

    public function geticonwebsiteenAttribute($value)
    {
        if ($value) {
            return asset('storage/icons/' . $value);
        } else {
            return asset('no-image-en.png');
        }
    }
    public function getIconwebsiteAttribute($value)
    {
        if ($value) {
            return asset('storage/icons/' . $value);
        } else {
            return asset('no-image-ar.png');
        }
    }

}

