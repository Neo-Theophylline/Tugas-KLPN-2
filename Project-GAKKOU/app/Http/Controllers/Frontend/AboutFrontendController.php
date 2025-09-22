<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Worker;
use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutFrontendController extends Controller
{
           public function index()
    {
        $abouts = About::limit(1)->get();
        $histories = History::limit(1)->get();
        $workers = Worker::all();

        return view('page.frontend.about.index', compact( 'histories', 'abouts', 'workers'));
    }
}
