<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkerBackendController extends Controller
{
        public function index()
        {
            return view('page.backend.Worker.index');
        }
    
        public function create()
        {
            return view('page.backend.Worker.create');
        }
        public function edit()
        {
            return view('page.backend.Worker.edit');
        }
}
