<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('index');
});
Route::get('/blog', function () {
    return view('blog-details');
});
// routes/web.php

