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
        $heroes = Hero::all();
        $abouts = About::limit(1)->get();
        $partners = Partner::all();
        $galleries = Gallery::all();

        return view('page.frontend.home.index', compact('heroes', 'abouts', 'partners', 'galleries'));
    }
}
