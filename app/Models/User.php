<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
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

    public function quotes() {
        return $this->hasMany(Quote::class, 'user_id');
    }

    public function following()
    {
        return $this->belongsToMany($this, 'follows', 'follower_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany($this, 'follows', 'user_id', 'follower_id');
    }

    public function count_total_followers() {
        return $this->followers()->count();
    }

    public function count_total_following() {
        return $this->following()->count();
    }

    public function count_total_quotes() {
        return $this->quotes()->count();
    }

    public function is_following($id) {
        $check_exists = ['follower_id' => Auth::id(), 'user_id' => $id];
        $is_following = Follow::where($check_exists)->first();
        return is_null($is_following);
    }

    public function is_owner($id) {
        return $this->id == $id;
    }
}
