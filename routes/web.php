<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopCurtomerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\PromoSlideController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WeddingPackageController;
use App\Http\Controllers\TestimonialCustomerController;

// Route::middleware('redirect.access')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->middleware('auth', 'verified')->name('dashboard');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/toko', [ShopCurtomerController::class, 'index'])->name('shop');
Route::get('/wedding', [TestimonialCustomerController::class, 'index'])->name('wedding');

Route::middleware('auth')->group(function () {
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD untuk Products
    Route::resource('products', ProductController::class);

    Route::resource('/categories', CategoryController::class)->names('categories');

    // CRUD untuk Wedding Packages
    Route::resource('wedding-packages', WeddingPackageController::class);

    Route::resource('galleries', GalleryController::class)->except(['show', 'edit', 'update']);

    Route::resource('promotions', PromotionController::class)->except('show');
    Route::resource('/promo-slides', PromoSlideController::class)->names('promo-slides');

    // Testimonials
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::patch('testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::post('/testimonials/{testimonial}/reply', [TestimonialController::class, 'reply'])
        ->name('testimonials.reply');
    Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__ . '/auth.php';
