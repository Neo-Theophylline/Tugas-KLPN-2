<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerBackendController extends Controller
{
        public function index()
        {
            return view('page.backend.Partner.index');
        }
    
        public function create()
        {
            return view('page.backend.Partner.create');
        }
        public function edit()
        {
            return view('page.backend.Partner.edit');
        }
}
