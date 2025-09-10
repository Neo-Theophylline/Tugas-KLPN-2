<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Frontend\AboutFrontendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\ServicesFrontendController;
use App\Http\Controllers\Frontend\TestimonialsFrontendController;

Route::get('',[HomeFrontendController::class ,'index'] )->name('home');
Route::get('about',[AboutFrontendController::class ,'index'] );
Route::get('services',[ServicesFrontendController::class ,'index'] );
Route::get('testimonials',[TestimonialsFrontendController::class ,'index'] );
Route::get('contact',[ContactFrontendController::class ,'index'] );
