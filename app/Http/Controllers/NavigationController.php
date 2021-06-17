<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        return view('home', [
            'quotes' => Quote::all()
        ]);
    }
}
