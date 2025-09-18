<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsFrontendController extends Controller
{
           public function index()
    {
        $testimonials = Testimonial::all();

        return view('page.frontend.testimonials.index', compact('testimonials'));    }
}
