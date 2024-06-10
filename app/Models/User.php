<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avater',
        'phone',
        'address',
        'description',
        'phone2',
        'status',
        'specialization',
        'lastname',
        'files',
        'country_id',
        'service_id',
        'language_id',
        'degree',
        'provider',
        'provider_id',
        'access_token',
        'email_verified_at',
        'facebook_id',
        'amount',
        'duration',
        'whatsapp',
        'facebook',
        'link',
        'emailpay'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'files'=>'array',
    ];

    public function isadmin(){
        return $this->hasRole('Admin');
    }
 

    public function isuser(){
        return $this->hasRole('User');
    }
    public function isadvisor(){
        return $this->hasRole('Employee');
    }

    public function country(){
        return $this->BelongsTo(country::class);
    }
    public function service(){
        return $this->BelongsTo(service::class);
    }
    public function language(){
        return $this->BelongsTo(language::class);
    }

    public function services(){
        return $this->hasMany(Services::class);
    }

   
}

