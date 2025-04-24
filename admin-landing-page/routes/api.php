<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\StatsSectionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
|--------------------------------------------------------------------------
| API Routes for Home‐Page Sections
|--------------------------------------------------------------------------
|
| Semua route ini akan diakses via /admin/api/{section} dan
| otomatis menangani index, store, show, update, destroy.
|
*/

// Route::prefix('admin/api')->middleware('api')->group(function () {
//     // Hero section
//     Route::apiResource('hero', HeroSectionController::class)
//          ->only(['index','store','edit','update','destroy']);

//     // Clients/Mitra
//     Route::apiResource('clients', MitraController::class)
//          ->only(['index','store','edit','update','destroy']);

//     // About Us
//     Route::apiResource('about', AboutSectionController::class)
//          ->only(['index','store','edit','update','destroy']);

//     // Stats (Clients, Projects, Hours, Workers)
//     Route::apiResource('stats', StatsSectionController::class)
//          ->only(['index','store','edit','update','destroy']);

//     // Services
//     Route::apiResource('services', ServiceController::class)
//          ->only(['index','store','edit','update','destroy']);

//     // Features
//     Route::apiResource('features', FeatureController::class)
//          ->only(['index','store','edit','update','destroy']);

//     // Team Members
//     Route::apiResource('team', TeamMemberController::class)
//          ->only(['index','store','edit','update','destroy']);
// });

