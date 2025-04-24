<?php

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
// Packages
use App\Http\Controllers\MitraController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\StatsSectionController;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Artisan;

// Packages
use Illuminate\Support\Facades\Route;
use App\Models\Mitra;
use App\Models\Stats;

require __DIR__.'/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});


//UI Pages Routs
Route::get('/', [HomeController::class, 'uisheet'])->name('uisheet');

Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/role-permission',[RolePermission::class, 'index'])->name('role.permission.list');
    Route::resource('permission',PermissionController::class);
    Route::resource('role', RoleController::class);
    
    // Blog
    Route::get(('blog'), [BlogController::class, 'blog'])-> name(('blog.blog'));
    Route::get('blog/tambah', [BlogController::class, 'rute'])->name('crud.tambah');


    // Blog crud    
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{id}', [PostController::class, 'edit']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    Route::get('/posts/all', [PostController::class, 'getAll']);


    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    // Users Module
    Route::resource('users', UserController::class);
});

//App Details Page => 'Dashboard'], function() {
Route::group(['prefix' => 'menu-style'], function() {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function() {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Widget Routs
Route::group(['prefix' => 'widget'], function() {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function() {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

//Auth pages Routs
Route::group(['prefix' => 'auth'], function() {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

//Error Page Route
Route::group(['prefix' => 'errors'], function() {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});


//Forms Pages Routs
Route::group(['prefix' => 'forms'], function() {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});


//Table Page Routs
Route::group(['prefix' => 'table'], function() {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function() {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});

//Extra Page Routs
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');

Route::prefix('admin/section')->name('admin.section.')->group(function () {
    Route::get('/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::put('/hero/update', [HeroSectionController::class, 'update'])->name('hero.update');
    Route::resource('hero', HeroSectionController::class);
    
    Route::get('/mitra/edit', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::put('/mitra/update', [MitraController::class, 'update'])->name('mitra.update');
    Route::resource('mitra', MitraController::class);
    
    Route::get('/about/edit', [AboutSectionController::class, 'edit'])->name('about.edit');
    Route::put('/about/update', [AboutSectionController::class, 'update'])->name('about.update');
    Route::resource('about', AboutSectionController::class);
   
    Route::get('/stats/edit', [StatsSectionController::class, 'edit'])->name('stats.edit');
    Route::put('/stats/update', [StatsSectionController::class, 'update'])->name('stats.update');
    Route::resource('stats', StatsSectionController::class);
    
    Route::get('/services/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/update', [ServiceController::class, 'update'])->name('services.update');
    Route::resource('services', ServiceController::class);
    
    Route::get('/features/edit', [FeatureController::class, 'edit'])->name('features.edit');
    Route::put('/features/update', [FeatureController::class, 'update'])->name('features.update');
    Route::resource('features', FeatureController::class);

    Route::get('/team/edit', [TeamMemberController::class, 'edit'])->name('team.edit');
    Route::put('/team/update', [TeamMemberController::class, 'update'])->name('team.update');
    Route::resource('team', TeamMemberController::class);
});

Route::prefix('admin/api')->group(function () {
    // Hero section
    Route::apiResource('hero', HeroSectionController::class)
         ->only(['index','store','edit','update','destroy']);

    // Clients/Mitra
    Route::apiResource('mitra', MitraController::class)
         ->only(['index','store','edit','update','destroy']);

    // About Us
    Route::apiResource('about', AboutSectionController::class)
         ->only(['index','store','edit','update','destroy']);

    // Stats (Clients, Projects, Hours, Workers)
    Route::apiResource('stats', StatsSectionController::class)
         ->only(['index','store','edit','update','destroy']);

    // Services
    Route::apiResource('services', ServiceController::class)
         ->only(['index','store','edit','update','destroy']);

    // Features
    Route::apiResource('features', FeatureController::class)
         ->only(['index','store','edit','update','destroy']);

    // Team Members
    Route::apiResource('team', TeamMemberController::class)
         ->only(['index','store','edit','update','destroy']);
});