<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(array $data, Request $request){
        return Quote::create([
            'user' => $request->user(),
            'author' => $data['author'],
            'quote' => $data['quote'],
            'category' => $data['category'],
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
