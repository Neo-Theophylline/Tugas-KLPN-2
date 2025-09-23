<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Worker;
use App\Models\History;
use App\Models\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutFrontendController extends Controller
{
    public function index()
    {
        $abouts = About::where('is_active', 'active')->limit(1)->get();
        $histories = History::where('is_active', 'active')->limit(1)->get();
        $workers = Worker::where('is_active', 'active')->get();
        $statistics = Statistic::where('is_active', 'active')->get();

        return view('page.frontend.about.index', compact('histories', 'abouts', 'workers','statistics'));
    }
}
