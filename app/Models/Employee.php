<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        'name',
        'lastname',
        'enterprise_id',
        'user_id',
        'email',
        'company_name',
        'role',
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
        return $this->belongsToMany(Titlesearch::class, 'employee_titlesearch', 'employee_id', 'titlesearch_id')
            ->withTimestamps();
    }
    public function enterpriseUser()
    {
        return $this->belongsTo(User::class, 'enterprise_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
