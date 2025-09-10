<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.backend.Dashboard.index');
});

Route::get('/hero', function () {
    return view('page.backend.Hero.index');
});
