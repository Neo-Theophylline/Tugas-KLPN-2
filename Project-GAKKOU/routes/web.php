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
Route::get('about',[AboutFrontendController::class ,'index'] )->name('about');
Route::get('services',[ServicesFrontendController::class ,'index'] )->name('services');
Route::get('testimonials',[TestimonialsFrontendController::class ,'index'] )->name('testimonials');
Route::get('contact',[ContactFrontendController::class ,'index'] )->name('contact');



                                     // BACKEND //

Route::get('adminpanel/dashboard',[DashboardBackendController::class ,'index'] )->name('admin.dasboard');

Route::get('adminpanel/hero',[HeroBackendController::class ,'index'] )->name('admin.hero');
Route::get('adminpanel/hero/create',[HeroBackendController::class ,'create'] )->name('admin.hero.create');
Route::get('adminpanel/hero/edit',[HeroBackendController::class ,'edit'] )->name('admin.hero.edit');

Route::get('adminpanel/about',[HeroBackendController::class ,'index'] )->name('admin.about');
Route::get('adminpanel/about/create',[HeroBackendController::class ,'create'] )->name('admin.about.create');
Route::get('adminpanel/about/edit',[HeroBackendController::class ,'edit'] )->name('admin.about.edit');

