<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'author', 'quote', 'category_id', 'image_src'];

    public function category() {
        return $this->hasOne('Category');
    }

    public function likes() {
        return $this->hasMany(Like::class, 'quote_id');
    }

    public function is_liked_by_auth_user() {
        $like = Like::where([
            'quote_id' => $this->id,
            'user_id' => Auth::id()
        ])->first();

        return $like == null ? false : true;
    }

    public function count_total_likes() {
        return $this->likes()->count();
    }
}
