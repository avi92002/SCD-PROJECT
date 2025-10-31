<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        $featuredProducts = Product::with('category')->latest()->take(6)->get();
        $topCategories = Category::orderBy('name')->take(6)->get();
        return view('pages.home', compact('featuredProducts', 'topCategories'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }
}


