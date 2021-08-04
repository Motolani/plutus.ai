<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'avatar',
        'phone_number',
        'email',
        'city',
        'state_county',
        'postcode',
        'country',
        'role',
        'password',
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
    ];

    public function getAvatarAttribute($value)
    {
        if ($value) {
            return asset('storage/user-images/' . $value);
        } else {
            return asset('storage/user-images/no-image.jpeg');
        }
    }

    public function titleSearches()
    {
        return $this->belongsToMany(Titlesearch::class, 'titlesearch_user', 'user_id', 'titlesearch_id')
            ->withTimestamps();
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'enterprise_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }
}
