<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model 
{
    use HasFactory;

    protected $fillable=[
           'catname',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     ->logOnly(['catname'])
    //     ->useLogName('categoryArticale');
    //     // Chain fluent methods for configuration options
    // }
}
