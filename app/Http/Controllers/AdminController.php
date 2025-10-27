<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('is_admin', false)->count();
        
        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalUsers'));
    }
}