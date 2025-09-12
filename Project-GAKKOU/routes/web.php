<?php

use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\HeroBackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Frontend\AboutFrontendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\ServicesFrontendController;
use App\Http\Controllers\Frontend\TestimonialsFrontendController;

                                     // FRONTEND //

Route::get('',[HomeFrontendController::class ,'index'] )->name('home');
Route::get('about',[AboutFrontendController::class ,'index'] );
Route::get('services',[ServicesFrontendController::class ,'index'] );
Route::get('testimonials',[TestimonialsFrontendController::class ,'index'] );
Route::get('contact',[ContactFrontendController::class ,'index'] );



                                     // BACKEND //

Route::get('adminpanel/dashboard',[DashboardBackendController::class ,'index'] );
Route::get('adminpanel/hero',[HeroBackendController::class ,'index'] );
Route::get('adminpanel/hero/create',[HeroBackendController::class ,'create'] );
Route::post('adminpanel/hero/store',[HeroBackendController::class ,'store'] );
