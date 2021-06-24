<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function create() {
        return view('quotes.create', [
            'categories' => Category::all()
        ]);
    }

    public function edit($id) {
        $quote = Quote::findOrFail($id);
        return view('quotes.edit', [
            'categories' => Category::all(),
            'quote' => $quote,
        ]);
    }

    public function store(Request $request) {
        $imageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageName);
        $quote = new Quote;
        $quote->user_id = Auth::user()->id;
        $quote->category_id = $request->category;
        $quote->author = $request->input('author');
        $quote->quote = $request->input('quote');
        $quote->image_src = 'images/' . $imageName;
        $quote->save();
        return redirect()->route('single', [$quote->id]);
    }

    public function update(Request $request, $id) {
        $quote = Quote::findOrFail($id);
        if(file_exists($quote->image_src)) {
            unlink($quote->image_src);
        }
        $imageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageName);
        $quote->id = $id;
        $quote->category_id = $request->category;
        $quote->author = $request->input('author');
        $quote->quote = $request->input('quote');
        $quote->image_src = 'images/' . $imageName;
        $quote->update();
        return redirect()->route('single', [$quote->id]);
    }

    public function show($id) {
        $quote = Quote::findOrFail($id);
        $author = false;
        if (Auth::check()) {
            $author = $quote->user_id == Auth::user()->id;
        }
        return view('quotes.single', [
            'quote' => $quote,
            'user' => User::find($quote->user_id),
            'author' => $author
        ]);
    }

    public function dashboard() {
        $user = Auth::user();
        $user_quotes = Quote::all()->where('user_id',  $user->id);
        return view('user.dashboard', [
           'quotes' => $user_quotes,
           'user' => $user,
        ]);
    }
}
