<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialsBackendController extends Controller
{
        public function index()
        {
            return view('page.backend.Testimonials.index');
        }
    
        public function create()
        {
            return view('page.backend.Testimonials.create');
        }
        public function edit()
        {
            return view('page.backend.Testimonials.edit');
        }
}
