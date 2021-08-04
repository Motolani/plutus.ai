<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitlesearchUser extends Model
{
    use HasFactory;

    protected $table = "titlesearch_user";

    protected $fillable = ['user_id', 'titlesearch_id'];
}
