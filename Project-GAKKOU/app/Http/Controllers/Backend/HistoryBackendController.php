<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryBackendController extends Controller
{
        public function index()
        {
            return view('page.backend.History.index');
        }
    
        public function create()
        {
            return view('page.backend.History.create');
        }
        public function edit()
        {
            return view('page.backend.History.edit');
        }
}
