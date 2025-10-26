<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::with('category')
            ->where('is_featured', true)
            ->take(6)
            ->get();
            
        $categories = Category::withCount('products')->get();
        
        return view('home', compact('featuredProducts', 'categories'));
    }

    public function about()
    {
        return view('about');
    }
}