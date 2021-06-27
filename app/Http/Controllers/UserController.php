<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard() {
        $user = Auth::user();
        $user_quotes = Quote::all()->where('user_id',  $user->id);
        return view('user.dashboard', [
            'quotes' => $user_quotes,
            'user' => $user,
            'profile' => Profile::all()->where('user_id', $user->id)->first()
        ]);
    }

    public function edit() {
        $profile = Profile::all()->where('user_id', Auth::id())->first();
        return view('user.edit', [
            'profile' => $profile
        ]);
    }

    public function update(Request $request) {
        $profile = Profile::all()->where('user_id', Auth::id())->first();
        if(file_exists($profile->profile_image) && $profile->profile_image != 'images/profile/plato.jpg') {
            unlink($profile->profile_image);
        }
        $imageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('images/profile'), $imageName);
        $profile->profile_image = 'images/profile/' . $imageName;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->update();
        return redirect()->route('user.dashboard');
    }
}
