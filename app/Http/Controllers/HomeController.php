<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('home',['products'=> Product::skip(0)->take(3)->get()]);
    }
}
