<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['follower_id', 'user_id'];

    use HasFactory;

}
