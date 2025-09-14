<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceBackendController extends Controller
{
        public function index()
        {
            return view('page.backend.Service.index');
        }
    
        public function create()
        {
            return view('page.backend.Service.create');
        }
        public function edit()
        {
            return view('page.backend.Service.edit');
        }
}
