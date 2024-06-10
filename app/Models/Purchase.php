<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'user_id',
        'booking_id',
        'advisor_id',
        'order_id',
        'transaction_id',
        'payment_method',
        'total_amount',
        'currency',
        'status','residual',
        'disacount',
        'day',
        'register_status_day',
        'delivery_time',
        'confirm',
        'image',
        'note',
        'historypay',
        ''
    ];

    public function advisor(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function booking(){
        return $this->belongsTo(Booking::class);
    }

    // public function getImageAttribute($value)
    // {
    //     if ($value) {
    //         return asset('storage/images-payment-confirm/' . $value);
    //     } else {
    //         return asset('no-image-payment.png');
    //     }
    // }
    
  
}
