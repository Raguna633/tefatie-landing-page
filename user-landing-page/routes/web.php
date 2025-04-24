<?php

use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('index');
})->name('home');

// Halaman Blog
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Detail Blog Post
Route::get('/blog/{slug}', function ($slug) {
    return view('blog-details', ['slug' => $slug]);
})->name('blog.details');

// Detail Portfolio
Route::get('/portfolio/{id}', function ($id) {
    return view('portfolio-details', ['id' => $id]);
})->name('portfolio.details');

// Form Contact
Route::post('/contact', function () {
    // Proses form contact disini
    return redirect()->back()->with('success', 'Terima kasih pesan Anda sudah kami terima!');
})->name('contact.submit');

// Newsletter Subscription
Route::post('/subscribe', function () {
    // Proses newsletter disini
    return response()->json(['success' => true]);
})->name('newsletter.submit');
