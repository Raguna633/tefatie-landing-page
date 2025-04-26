<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('service');
    }

    public function serviceDetails()
    {
        return view('services-details');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function portfolioDetails()
    {
        return view('portfolio-details');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function team()
    {
        return view('team');
    }

    public function blog()
    {
        return view('blog');
    }

    public function blogDetails()
    {
        return view('blog-details');
    }
}
