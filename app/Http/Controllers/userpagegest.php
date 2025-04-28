<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class userpagegest extends Controller
{
    public function userPage()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('layouts.userpage', compact('products'));
    }
}
