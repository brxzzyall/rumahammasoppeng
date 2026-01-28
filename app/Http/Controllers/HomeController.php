<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Review;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $menuItems = MenuItem::all();
        $galleries = Gallery::all();
        $testimonials = Testimonial::all();
        $reviews = Review::latest()->limit(10)->get();
        
        return view('index', [
            'menuItems' => $menuItems,
            'galleries' => $galleries,
            'testimonials' => $testimonials,
            'reviews' => $reviews
        ]);
    }
}
