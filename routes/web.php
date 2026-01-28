<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Order Routes
Route::post('/order/add-to-cart', [OrderController::class, 'addToCart'])->name('order.add-to-cart');
Route::get('/cart', [OrderController::class, 'cart'])->name('order.cart');
Route::delete('/cart/{menuItemId}', [OrderController::class, 'removeFromCart'])->name('order.remove-from-cart');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::get('/order/success/{orderId}', [OrderController::class, 'success'])->name('order.success');
Route::post('/review/find', [OrderController::class, 'findOrderForReview'])->name('order.review.find');
Route::get('/order/{orderId}/review', [OrderController::class, 'showReviewForm'])->name('order.review');
Route::post('/order/{orderId}/review', [OrderController::class, 'submitReview'])->name('order.review.submit');
Route::get('/check-order', [OrderController::class, 'checkOrderForm'])->name('order.check-form');
Route::post('/check-order', [OrderController::class, 'checkOrder'])->name('order.check');
Route::post('/direct-review', [OrderController::class, 'submitDirectReview'])->name('order.direct-review');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('admin.register.submit');
    
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/pending-orders', [AdminController::class, 'pendingOrders'])->name('admin.pending-orders');
        Route::get('/order-history', [AdminController::class, 'orderHistory'])->name('admin.order-history');
        Route::get('/review-history', [AdminController::class, 'reviewHistory'])->name('admin.review-history');
        Route::get('/order/{orderId}', [AdminController::class, 'viewOrder'])->name('admin.order.view');
        Route::put('/order/{orderId}/status', [AdminController::class, 'updateStatus'])->name('admin.order.update-status');
        Route::delete('/order/{orderId}', [AdminController::class, 'deleteCompletedOrder'])->name('admin.order.delete');
        // Admin Menu management
        Route::get('/menu', [MenuItemController::class, 'index'])->name('admin.menu.index');
        Route::post('/menu', [MenuItemController::class, 'store'])->name('admin.menu.store');
        Route::delete('/menu/{id}', [MenuItemController::class, 'destroy'])->name('admin.menu.destroy');
        Route::post('/menu/{id}/toggle', [MenuItemController::class, 'toggleAvailability'])->name('admin.menu.toggle');
        Route::post('/menu/{id}/out-of-stock', [MenuItemController::class, 'outOfStock'])->name('admin.menu.outofstock');
        // Admin Gallery
        Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    });
});
