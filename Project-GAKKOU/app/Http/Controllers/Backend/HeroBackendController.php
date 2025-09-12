<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeroBackendController extends Controller
{
     public function index()
    {
        return view('page.backend.Hero.index');
    }

     public function create()
    {
        return view('page.backend.Hero.create');
    }
     public function edit()
    {
        return view('page.backend.Hero.edit');
    }
}
