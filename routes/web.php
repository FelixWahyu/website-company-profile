<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WeddingPackageController;

// Route::middleware('redirect.access')->group(function () {});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD untuk Products
    Route::resource('products', ProductController::class);

    // CRUD untuk Wedding Packages
    Route::resource('wedding-packages', WeddingPackageController::class);

    // Testimonials
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    // Tambahkan rute lain untuk approve, reply, delete jika perlu

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__ . '/auth.php';
