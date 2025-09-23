<?php

use App\Models\About;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\HeroBackendController;
use App\Http\Controllers\Backend\AboutBackendController;
use App\Http\Controllers\Backend\MediaBackendController;
use App\Http\Controllers\Backend\WorkerBackendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Backend\GalleryBackendController;
use App\Http\Controllers\Backend\HistoryBackendController;
use App\Http\Controllers\Backend\PartnerBackendController;
use App\Http\Controllers\Backend\ServiceBackendController;
use App\Http\Controllers\Frontend\AboutFrontendController;
use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\StatisticBackendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\ServicesFrontendController;
use App\Http\Controllers\Backend\TestimonialsBackendController;
use App\Http\Controllers\Frontend\TestimonialsFrontendController;

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
Route::middleware('auth')->prefix('adminpanel')->group(function () {

// PROFILE //
Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');

// USER MANAGEMENT //
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('adminpanel/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle');

// HERO //
Route::get('/hero', [HeroBackendController::class, 'index'])->name('admin.hero');
Route::get('/hero/create', [HeroBackendController::class, 'create'])->name('admin.hero.create');
Route::get('/hero/{id}/edit', [HeroBackendController::class, 'edit'])->name('admin.hero.edit');
Route::put('/hero/{id}/update', [HeroBackendController::class, 'update'])->name('admin.hero.update');
Route::delete('/hero/{id}', [HeroBackendController::class, 'destroy'])->name('admin.hero.destroy');
Route::post('/hero/store', [HeroBackendController::class, 'store']);
Route::post('/hero/toggle-status', [HeroBackendController::class, 'toggleStatus'])->name('admin.hero.toggle');

// ABOUT //
Route::get('/about', [AboutBackendController::class, 'index'])->name('admin.about');
Route::get('/about/create', [AboutBackendController::class, 'create'])->name('admin.about.create');
Route::get('/about/{id}/edit', [AboutBackendController::class, 'edit'])->name('admin.about.edit');
Route::post('/about/store', [AboutBackendController::class, 'store']);
Route::put('/about/{id}/update', [AboutBackendController::class, 'update'])->name('admin.about.update');
Route::delete('/about/{id}', [AboutBackendController::class, 'destroy'])->name('admin.about.destroy');
Route::post('/about/toggle-status', [AboutBackendController::class, 'toggleStatus'])->name('admin.about.toggle');

// GALLERY //
Route::get('/gallery', [GalleryBackendController::class, 'index'])->name('admin.gallery');
Route::get('/gallery/create', [GalleryBackendController::class, 'create'])->name('admin.gallery.create');
Route::get('/gallery/{id}/edit', [GalleryBackendController::class, 'edit'])->name('admin.gallery.edit');
Route::put('/gallery/{id}/update', [GalleryBackendController::class, 'update'])->name('admin.gallery.update');
Route::delete('/gallery/{id}', [GalleryBackendController::class, 'destroy'])->name('admin.gallery.destroy');
Route::post('/gallery/store', [GalleryBackendController::class, 'store']);
Route::post('/gallery/toggle-status', [GalleryBackendController::class, 'toggleStatus'])->name('admin.gallery.toggle');

// HISTORY //
Route::get('/history', [HistoryBackendController::class, 'index'])->name('admin.history');
Route::get('/history/create', [HistoryBackendController::class, 'create'])->name('admin.history.create');
Route::get('/history/{id}/edit', [HistoryBackendController::class, 'edit'])->name('admin.history.edit');
Route::put('/history/{id}/update', [HistoryBackendController::class, 'update'])->name('admin.history.update');
Route::delete('/history/{id}', [HistoryBackendController::class, 'destroy'])->name('admin.history.destroy');
Route::post('/history/store', [HistoryBackendController::class, 'store']);
Route::post('/history/toggle-status', [HistoryBackendController::class, 'toggleStatus'])->name('admin.history.toggle');

// MEDIA //
Route::get('/media', [MediaBackendController::class, 'index'])->name('admin.media');
Route::get('/media/create', [MediaBackendController::class, 'create'])->name('admin.media.create');
Route::get('/media/{id}/edit', [MediaBackendController::class, 'edit'])->name('admin.media.edit');
Route::put('/media/{id}/update', [MediaBackendController::class, 'update'])->name('admin.media.update');
Route::delete('/media/{id}', [MediaBackendController::class, 'destroy'])->name('admin.media.destroy');
Route::post('/media/store', [MediaBackendController::class, 'store']);
Route::post('/media/toggle-status', [MediaBackendController::class, 'toggleStatus'])->name('admin.media.toggle');

// PARTNER //
Route::get('/partner', [PartnerBackendController::class, 'index'])->name('admin.partner');
Route::get('/partner/create', [PartnerBackendController::class, 'create'])->name('admin.partner.create');
Route::get('/partner/{id}/edit', [PartnerBackendController::class, 'edit'])->name('admin.partner.edit');
Route::put('/partner/{id}/update', [PartnerBackendController::class, 'update'])->name('admin.partner.update');
Route::delete('/partner/{id}', [PartnerBackendController::class, 'destroy'])->name('admin.partner.destroy');
Route::post('/partner/store', [PartnerBackendController::class, 'store']);
Route::post('/partner/toggle-status', [PartnerBackendController::class, 'toggleStatus'])->name('admin.partner.toggle');

// SERVICE //
Route::get('/services', [ServiceBackendController::class, 'index'])->name('admin.service');
Route::get('/services/create', [ServiceBackendController::class, 'create'])->name('admin.service.create');
Route::get('/services/{id}/edit', [ServiceBackendController::class, 'edit'])->name('admin.service.edit');
Route::put('/services/{id}/update', [ServiceBackendController::class, 'update'])->name('admin.service.update');
Route::delete('/services/{id}', [ServiceBackendController::class, 'destroy'])->name('admin.service.destroy');
Route::post('/services/store', [ServiceBackendController::class, 'store']);
Route::post('/services/toggle-status', [ServiceBackendController::class, 'toggleStatus'])->name('admin.service.toggle');

// TESTIMONIALS //
Route::get('/testimonial', [TestimonialsBackendController::class, 'index'])->name('admin.testimonial');
Route::get('/testimonial/create', [TestimonialsBackendController::class, 'create'])->name('admin.testimonial.create');
Route::get('/testimonial/{id}/edit', [TestimonialsBackendController::class, 'edit'])->name('admin.testimonial.edit');
Route::put('/testimonial/{id}/update', [TestimonialsBackendController::class, 'update'])->name('admin.testimonial.update');
Route::delete('/testimonial/{id}', [TestimonialsBackendController::class, 'destroy'])->name('admin.testimonial.destroy');
Route::post('/testimonial/store', [TestimonialsBackendController::class, 'store']);
Route::post('/testimonial/toggle-status', [TestimonialsBackendController::class, 'toggleStatus'])->name('admin.testimonial.toggle');

// WORKER //
Route::get('/worker', [WorkerBackendController::class, 'index'])->name('admin.worker');
Route::get('/worker/create', [WorkerBackendController::class, 'create'])->name('admin.worker.create');
Route::get('/worker/{id}/edit', [WorkerBackendController::class, 'edit'])->name('admin.worker.edit');
Route::put('/worker/{id}/update', [WorkerBackendController::class, 'update'])->name('admin.worker.update');
Route::delete('/worker/{id}', [WorkerBackendController::class, 'destroy'])->name('admin.worker.destroy');
Route::post('/worker/store', [WorkerBackendController::class, 'store']);
Route::post('/worker/toggle-status', [WorkerBackendController::class, 'toggleStatus'])->name('admin.worker.toggle');

// STATISTIC //
Route::get('/statistic', [StatisticBackendController::class, 'index'])->name('admin.statistic');
Route::get('/statistic/create', [StatisticBackendController::class, 'create'])->name('admin.statistic.create');
Route::get('/statistic/{id}/edit', [StatisticBackendController::class, 'edit'])->name('admin.statistic.edit');
Route::put('/statistic/{id}/update', [StatisticBackendController::class, 'update'])->name('admin.statistic.update');
Route::delete('/statistic/{id}', [StatisticBackendController::class, 'destroy'])->name('admin.statistic.destroy');
Route::post('/statistic/store', [StatisticBackendController::class, 'store']);
Route::post('/statistic/toggle-status', [StatisticBackendController::class, 'toggleStatus'])->name('admin.statistic.toggle');

});

// LOGIN LOGOUT //
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('signin', [AuthController::class, 'login'])->name('signin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');