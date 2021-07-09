<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($id) {
        Follow::create([
            'follower_id' => Auth::id(),
            'user_id' => $id
        ]);
        return redirect()->back();
    }

    public function unfollow($id) {
        $follow = Follow::where([
            'follower_id' => Auth::id(),
            'user_id' => $id
        ])->first();
        echo $follow;
        $follow->delete();
        return redirect()->back();
    }

    public function following() {
        $users = Follow::all()->where('follower_id', Auth::id());
        return view('user.follow', [
            'users' => $users,
        ]);
    }

    public function followers() {
        $users = Follow::all()->where('user_id', Auth::id());
        return view('user.follow', [
            'users' => $users,
        ]);
    }
}
