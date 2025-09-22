<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsFrontendController extends Controller
{
           public function index()
    {
        $testimonials = Testimonial::where('is_active', 'active')->get();

        return view('page.frontend.testimonials.index', compact('testimonials'));    }
}
