<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services-details', [PageController::class, 'serviceDetails'])->name('services.details');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio-details', [PageController::class, 'portfolioDetails'])->name('portfolio.details');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog-details', [PageController::class, 'blogDetails'])->name('blog.details');
