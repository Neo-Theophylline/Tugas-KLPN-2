<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesFrontendController extends Controller
{
           public function index()
    {
        $services = Service::all();

        return view('page.frontend.services.index', compact('services'));
    }
}
