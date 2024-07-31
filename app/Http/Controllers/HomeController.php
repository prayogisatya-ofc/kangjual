<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::where('is_published', true)->orderBy('created_at', 'desc')->limit(6)->get();

        return view('home', [
            'title' => 'Belajar dari Source Code',
            'latestProducts' => $latestProducts
        ]);
    }
}
