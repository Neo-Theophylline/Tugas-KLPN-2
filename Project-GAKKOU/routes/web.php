<?php

use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\ServiceBackendController;
use App\Http\Controllers\Backend\WorkerBackendController;
use App\Http\Controllers\Backend\HistoryBackendController;
use App\Http\Controllers\Backend\GalleryBackendController;
use App\Http\Controllers\Backend\PartnerBackendController;
use App\Http\Controllers\Backend\TestimonialsBackendController;
use App\Http\Controllers\Backend\MediaBackendController;
use App\Http\Controllers\Backend\HeroBackendController;
use App\Http\Controllers\Backend\AboutBackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Frontend\AboutFrontendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\ServicesFrontendController;
use App\Http\Controllers\Frontend\TestimonialsFrontendController;

// FRONTEND //

Route::get('', [HomeFrontendController::class, 'index'])->name('home');
Route::get('about', [AboutFrontendController::class, 'index'])->name('about');
Route::get('services', [ServicesFrontendController::class, 'index'])->name('services');
Route::get('testimonials', [TestimonialsFrontendController::class, 'index'])->name('testimonials');
Route::get('contact', [ContactFrontendController::class, 'index'])->name('contact');

// BACKEND //

// DASHBOARD //
Route::get('adminpanel/dashboard', [DashboardBackendController::class, 'index'])->name('admin.dasboard');
// HERO //
Route::get('adminpanel/hero', [HeroBackendController::class, 'index'])->name('admin.hero');
Route::get('adminpanel/hero/create', [HeroBackendController::class, 'create'])->name('admin.hero.create');
Route::get('adminpanel/hero/{id}/edit', [HeroBackendController::class, 'edit'])->name('admin.hero.edit');
Route::put('adminpanel/hero/{id}/update', [HeroBackendController::class, 'update'])->name('admin.hero.update');
Route::delete('adminpanel/hero/{id}', [HeroBackendController::class, 'destroy'])->name('admin.hero.destroy');
Route::post('adminpanel/hero/store', [HeroBackendController::class, 'store']);
// ABOUT //
Route::get('adminpanel/about', [AboutBackendController::class, 'index'])->name('admin.about');
Route::get('adminpanel/about/create', [AboutBackendController::class, 'create'])->name('admin.about.create');
Route::get('adminpanel/about/edit', [AboutBackendController::class, 'edit'])->name('admin.about.edit');
// GALLERY //
Route::get('adminpanel/gallery', [GalleryBackendController::class, 'index'])->name('admin.gallery');
Route::get('adminpanel/gallery/create', [GalleryBackendController::class, 'create'])->name('admin.gallery.create');
Route::get('adminpanel/gallery/edit', [GalleryBackendController::class, 'edit'])->name('admin.gallery.edit');
// HISTORY //
Route::get('adminpanel/history', [HistoryBackendController::class, 'index'])->name('admin.history');
Route::get('adminpanel/history/create', [HistoryBackendController::class, 'create'])->name('admin.history.create');
Route::get('adminpanel/history/edit', [HistoryBackendController::class, 'edit'])->name('admin.history.edit');
// MEDIA //
Route::get('adminpanel/media', [MediaBackendController::class, 'index'])->name('admin.media');
Route::get('adminpanel/media/create', [MediaBackendController::class, 'create'])->name('admin.media.create');
Route::get('adminpanel/media/edit', [MediaBackendController::class, 'edit'])->name('admin.media.edit');
// PARTNER //
Route::get('adminpanel/partner', [PartnerBackendController::class, 'index'])->name('admin.partner');
Route::get('adminpanel/partner/create', [PartnerBackendController::class, 'create'])->name('admin.partner.create');
Route::get('adminpanel/partner/edit', [PartnerBackendController::class, 'edit'])->name('admin.partner.edit');
// SERVICE //
Route::get('adminpanel/services', [ServiceBackendController::class, 'index'])->name('admin.service');
Route::get('adminpanel/services/create', [ServiceBackendController::class, 'create'])->name('admin.services.create');
Route::get('adminpanel/services/edit', [ServiceBackendController::class, 'edit'])->name('admin.services.edit');
// TESTIMONIALS //
Route::get('adminpanel/testimonials', [TestimonialsBackendController::class, 'index'])->name('admin.testimonials');
Route::get('adminpanel/testimonials/create', [TestimonialsBackendController::class, 'create'])->name('admin.testimonials.create');
Route::get('adminpanel/testimonials/edit', [TestimonialsBackendController::class, 'edit'])->name('admin.testimonials.edit');
// WORKER //
Route::get('adminpanel/worker', [WorkerBackendController::class, 'index'])->name('admin.worker');
Route::get('adminpanel/worker/create', [WorkerBackendController::class, 'create'])->name('admin.worker.create');
Route::get('adminpanel/worker/edit', [WorkerBackendController::class, 'edit'])->name('admin.worker.edit');
