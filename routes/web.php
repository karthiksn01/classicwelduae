<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/product-detail', function () {
    return view('product-detail');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin-login');
    });

    Route::get('/dashboard', function () {
        return view('admin-dashboard');
    });
});

// Fallback redirects for old .html extensions
Route::redirect('/index.html', '/');
Route::redirect('/products.html', '/products');
Route::redirect('/about.html', '/about');
Route::redirect('/contact.html', '/contact');
Route::redirect('/feedback.html', '/feedback');
Route::redirect('/cart.html', '/cart');
Route::redirect('/wishlist.html', '/wishlist');
Route::redirect('/product-detail.html', '/product-detail');
Route::redirect('/admin-login.html', '/admin/login');
Route::redirect('/admin/admin-login.html', '/admin/login');
Route::redirect('/admin-dashboard.html', '/admin/dashboard');
Route::redirect('/admin/admin-dashboard.html', '/admin/dashboard');
