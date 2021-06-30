<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function like($id) {
        Like::create([
            'quote_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'You have liked the quote');

        return back();
    }

    public function unlike($id) {
        $like = Like::where([
            'quote_id' => $id,
            'user_id' => Auth::id()
        ])->first();

        $like->delete();

        Session::flash('success', 'You have unliked the quote');
    }


    public function user_likes($id) {
        $user = User::find($id);
        $likes = Like::with('quote')->get()->where('user_id', $id);
        $quotes = [];
        foreach($likes as $like) {
            array_push($quotes, Quote::find($like->quote_id));
        }
        return view('user.likes', [
            'user' => $user,
            'quotes' => $quotes
        ]);
    }
}
