<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'author',
        'slug',
        'image',
        'category_id'
    ];
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('storage/images-blog/' . $value);
        } else {
            return asset('no-image.png');
        }
    }
}
