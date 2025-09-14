<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaBackendController extends Controller
{
        public function index()
        {
            return view('page.backend.Media.index');
        }
    
        public function create()
        {
            return view('page.backend.Media.create');
        }
        public function edit()
        {
            return view('page.backend.Media.edit');
        }
}
