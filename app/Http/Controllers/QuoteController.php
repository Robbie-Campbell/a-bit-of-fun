<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\User;

class QuoteController extends Controller
{
    public function index(){
        return view('quote.list', [
            'quotes' => Quote::all()
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
