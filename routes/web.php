<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController; // Pastikan ini ada
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    $credentials = [
        'name' => request('name'),
        'password' => request('password')
    ];
    
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->intended('/');
    }
    
    return back()->withErrors([
        'name' => 'Username atau password salah.',
    ])->withInput(request()->only('name'));
})->name('login.post');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    $data = request()->validate([
        'name' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
    ]);
    
    $user = \App\Models\User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'is_admin' => false,
    ]);
    
    Auth::login($user);
    return redirect('/');
})->name('register.post');

// Public product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// User routes (hanya untuk user biasa)
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});

// Admin routes (hanya untuk admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Product management routes
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});