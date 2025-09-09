<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.frontend.home.index');
});

Route::get('testimonials', function () {
    return view('page.frontend.testimonials.index');
});

Route::get('about', function () {
    return view('page.frontend.about.index');
});

Route::get('services', function () {
    return view('page.frontend.services.index');
});

Route::get('contact', function () {
    return view('page.frontend.contact.index');
});
