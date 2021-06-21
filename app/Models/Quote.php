<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'author', 'quote', 'category_id', 'image_src'];

    public function category() {
        return $this->hasOne('Category');
    }
}
