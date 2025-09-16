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
use App\Models\About;
use App\Models\Gallery;

// FRONTEND //

Route::get('', [HomeFrontendController::class, 'index'])->name('home');
Route::get('about', [AboutFrontendController::class, 'index'])->name('about');
Route::get('services', [ServicesFrontendController::class, 'index'])->name('services');
Route::get('testimonials', [TestimonialsFrontendController::class, 'index'])->name('testimonials');
// CONTACT //
Route::get('contact', [ContactFrontendController::class, 'indexFrontend'])->name('contact.frontend');
Route::get('adminpanel/contact/{id}', [ContactFrontendController::class, 'show'])->name('admin.contact.show');
Route::get('adminpanel/contact', [ContactFrontendController::class, 'indexAdmin'])->name('admin.contact');
Route::delete('adminpanel/contact/{id}', [ContactFrontendController::class, 'destroy'])->name('admin.contact.destroy');
Route::post('adminpanel/contact/store', [ContactFrontendController::class, 'store'])->name('admin.contact.store');


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
Route::get('adminpanel/about/{id}/edit', [AboutBackendController::class, 'edit'])->name('admin.about.edit');
Route::post('adminpanel/about/store', [AboutBackendController::class, 'store']);
Route::put('adminpanel/about/{id}/update', [AboutBackendController::class, 'update'])->name('admin.about.update');
Route::delete('adminpanel/about/{id}', [AboutBackendController::class, 'destroy'])->name('admin.about.destroy');
// GALLERY //
Route::get('adminpanel/gallery', [GalleryBackendController::class, 'index'])->name('admin.gallery');
Route::get('adminpanel/gallery/create', [GalleryBackendController::class, 'create'])->name('admin.gallery.create');
Route::get('adminpanel/gallery/{id}/edit', [GalleryBackendController::class, 'edit'])->name('admin.gallery.edit');
Route::put('adminpanel/gallery/{id}/update', [GalleryBackendController::class, 'update'])->name('admin.gallery.update');
Route::delete('adminpanel/gallery/{id}', [GalleryBackendController::class, 'destroy'])->name('admin.gallery.destroy');
Route::post('adminpanel/gallery/store', [GalleryBackendController::class, 'store']);
// HISTORY //
Route::get('adminpanel/history', [HistoryBackendController::class, 'index'])->name('admin.history');
Route::get('adminpanel/history/create', [HistoryBackendController::class, 'create'])->name('admin.history.create');
Route::get('adminpanel/history/{id}/edit', [HistoryBackendController::class, 'edit'])->name('admin.history.edit');
Route::put('adminpanel/history/{id}/update', [HistoryBackendController::class, 'update'])->name('admin.history.update');
Route::delete('adminpanel/history/{id}', [HistoryBackendController::class, 'destroy'])->name('admin.history.destroy');
Route::post('adminpanel/history/store', [HistoryBackendController::class, 'store']);
// MEDIA //
Route::get('adminpanel/media', [MediaBackendController::class, 'index'])->name('admin.media');
Route::get('adminpanel/media/create', [MediaBackendController::class, 'create'])->name('admin.media.create');
Route::get('adminpanel/media/{id}/edit', [MediaBackendController::class, 'edit'])->name('admin.media.edit');
Route::put('adminpanel/media/{id}/update', [MediaBackendController::class, 'update'])->name('admin.media.update');
Route::delete('adminpanel/media/{id}', [MediaBackendController::class, 'destroy'])->name('admin.media.destroy');
Route::post('adminpanel/media/store', [MediaBackendController::class, 'store']);
// PARTNER //
Route::get('adminpanel/partner', [PartnerBackendController::class, 'index'])->name('admin.partner');
Route::get('adminpanel/partner/create', [PartnerBackendController::class, 'create'])->name('admin.partner.create');
Route::get('adminpanel/partner/{id}/edit', [PartnerBackendController::class, 'edit'])->name('admin.partner.edit');
Route::put('adminpanel/partner/{id}/update', [PartnerBackendController::class, 'update'])->name('admin.partner.update');
Route::delete('adminpanel/partner/{id}', [PartnerBackendController::class, 'destroy'])->name('admin.partner.destroy');
Route::post('adminpanel/partner/store', [PartnerBackendController::class, 'store']);
// SERVICE //
Route::get('adminpanel/services', [ServiceBackendController::class, 'index'])->name('admin.service');
Route::get('adminpanel/services/create', [ServiceBackendController::class, 'create'])->name('admin.service.create');
Route::get('adminpanel/services/{id}/edit', [ServiceBackendController::class, 'edit'])->name('admin.service.edit');
Route::put('adminpanel/services/{id}/update', [ServiceBackendController::class, 'update'])->name('admin.service.update');
Route::delete('adminpanel/services/{id}', [ServiceBackendController::class, 'destroy'])->name('admin.service.destroy');
Route::post('adminpanel/services/store', [ServiceBackendController::class, 'store']);
// TESTIMONIALS //
Route::get('adminpanel/testimonial', [TestimonialsBackendController::class, 'index'])->name('admin.testimonial');
Route::get('adminpanel/testimonial/create', [TestimonialsBackendController::class, 'create'])->name('admin.testimonial.create');
Route::get('adminpanel/testimonial/{id}/edit', [TestimonialsBackendController::class, 'edit'])->name('admin.testimonial.edit');
Route::put('adminpanel/testimonial/{id}/update', [TestimonialsBackendController::class, 'update'])->name('admin.testimonial.update');
Route::delete('adminpanel/testimonial/{id}', [TestimonialsBackendController::class, 'destroy'])->name('admin.testimonial.destroy');
Route::post('adminpanel/testimonial/store', [TestimonialsBackendController::class, 'store']);
// WORKER //
Route::get('adminpanel/worker', [WorkerBackendController::class, 'index'])->name('admin.worker');
Route::get('adminpanel/worker/create', [WorkerBackendController::class, 'create'])->name('admin.worker.create');
Route::get('adminpanel/worker/{id}/edit', [WorkerBackendController::class, 'edit'])->name('admin.worker.edit');
Route::put('adminpanel/worker/{id}/update', [WorkerBackendController::class, 'update'])->name('admin.worker.update');
Route::delete('adminpanel/worker/{id}', [WorkerBackendController::class, 'destroy'])->name('admin.worker.destroy');
Route::post('adminpanel/worker/store', [WorkerBackendController::class, 'store']);