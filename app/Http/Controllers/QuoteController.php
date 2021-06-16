<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class QuoteController extends Controller
{
    public function index(){
        return view('quote.list', [
            'quotes' => Quote::all()
        ]);
    }

    public function show($id)
    {
        return view('quote.single', [
            'quote' => Quote::findOrFail($id)
        ]);
    }
}
