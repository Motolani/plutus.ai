<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titlesearch extends Model
{
    use HasFactory;

    protected $table = "titlesearches";

    protected $fillable = ['lastname', 'firstname', 'middlename', 'parcel_id'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'titlesearch_user', 'titlesearch_id', 'user_id')
            ->withTimestamps();
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_titlesearch', 'titlesearch_id', 'employee_id')
            ->withTimestamps();
    }
}
