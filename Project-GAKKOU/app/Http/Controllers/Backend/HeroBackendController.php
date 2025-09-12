<?php

namespace App\Http\Controllers\Backend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroBackendController extends Controller
{
     public function index()
    {
        $heroes = Hero::all();

        return view('page.backend.Hero.index', compact('heroes'));
    }

     public function create()
    {
        return view('page.backend.Hero.create');

    }

    public function store (Request $request) {

      $request -> validate([
         'title'     => 'required',
         'subtitle'         => 'required',
         'photo'        =>'required',
      ]);

      $hero_store = [
         'title'         => $request->title,
         'subtitle'         => $request->subtitle,
      ];

      $hero_store['photo'] = $request->file('photo')->store('img', 'public');
      
      Hero::create($hero_store);

      return redirect ('/adminpanel/hero');
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
