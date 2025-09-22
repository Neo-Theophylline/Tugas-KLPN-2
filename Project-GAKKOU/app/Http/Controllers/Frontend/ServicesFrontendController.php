<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesFrontendController extends Controller
{
           public function index()
    {
        $services = Service::where('is_active', 'active')->get();

        return view('page.frontend.services.index', compact('services'));
    }
}
