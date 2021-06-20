<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function index(){
        return view('quote.list', [
            'quotes' => Quote::all()
        ]);
    }

    public function create(){
        return view('quotes.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        $imageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageName);
        return Quote::create([
            'user_id' => Auth::user()->id,
            'author' => $request->input('author'),
            'quote' => $request->input('quote'),
            'category' => $request->input('category'),
            'image_src' => 'images/' . $imageName,
        ]);
    }

    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return view('quotes.single', [
            'quote' => $quote,
            'user' => User::find($quote->user_id)
        ]);
    }
}
