<?php

namespace App\Http\Controllers;

use App\Models\Like;
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

        return redirect()->back();
    }

    public function unlike($id) {
        $like = Like::where([
            'quote_id' => $id,
            'user_id' => Auth::id()
        ])->first();

        $like->delete();

        Session::flash('success', 'You have unliked the quote');

        return redirect()->back();
    }
}
