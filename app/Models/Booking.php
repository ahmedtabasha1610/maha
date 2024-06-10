<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title', 'start_date', 'end_date','start_time','end_time','status'];

    public function purchase(){
        return $this->hasOne(Purchase::class,'booking_id','id');
    }
}
