<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function blog (Request $request)
    {
        return view('blog.blog');
    }

    public function rute (Request $request)
    {
        return view('blog.crud.tambah');
    }
}
