<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutBackendController extends Controller
{
        public function index()
        {
            return view('page.backend.About.index');
        }
    
        public function create()
        {
            return view('page.backend.About.create');
        }
        public function edit()
        {
            return view('page.backend.About.edit');
        }
}
