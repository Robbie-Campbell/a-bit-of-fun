<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
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

    public function following($id) {
        $follows = Follow::all()->where('follower_id', $id);
        $users = [];
        foreach($follows as $follow) {
            array_push($users, User::all()->where('id', $follow->user_id)->first());
        }
        return view('user.follow', [
            'users' => $users,
        ]);
    }

    public function followers($id) {
        $follows = Follow::all()->where('user_id', $id);
        $users = [];
        foreach($follows as $follow) {
            array_push($users, User::where('id', $follow->follower_id)->first());
        }
        return view('user.follow', [
            'users' => $users,
        ]);
    }
}
