<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\About;
use App\Models\Partner;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeFrontendController extends Controller
{
    public function index()
    {
        $heroes = Hero::where('is_active', 'active')->get();
        $abouts = About::where('is_active', 'active')->get();
        $partners = Partner::where('is_active', 'active')->get();
        $galleries = Gallery::where('is_active', 'active')->get();

        return view('page.frontend.home.index', compact('heroes', 'abouts', 'partners', 'galleries'));
    }
}
