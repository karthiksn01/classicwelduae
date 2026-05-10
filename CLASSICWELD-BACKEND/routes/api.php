<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']); // Public but role-aware
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);

// Public Route for categories
Route::get('/categories', [\App\Http\Controllers\ProductUpdaterController::class, 'getCategories']);

// Public Route for messages
Route::post('/messages', [\App\Http\Controllers\MessageController::class, 'store']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Admin Routes
    Route::prefix('admin')->group(function () {
        // Product Updater Routes
        Route::get('/products', [\App\Http\Controllers\ProductUpdaterController::class, 'indexAdmin']);
        Route::post('/products', [\App\Http\Controllers\ProductUpdaterController::class, 'store']);
        Route::match(['POST', 'PUT'], '/products/{id}', [\App\Http\Controllers\ProductUpdaterController::class, 'update']);
        Route::delete('/products/{id}', [\App\Http\Controllers\ProductUpdaterController::class, 'destroy']);
        
        Route::post('/products/{id}/toggle-hot-sale', [\App\Http\Controllers\ProductUpdaterController::class, 'toggleHotSale']);
        Route::post('/products/{id}/toggle-sold-out', [\App\Http\Controllers\ProductUpdaterController::class, 'toggleSoldOut']);
        
        Route::get('/products/trash', [\App\Http\Controllers\ProductUpdaterController::class, 'trash']);
        Route::post('/products/{id}/restore', [\App\Http\Controllers\ProductUpdaterController::class, 'restore']);
        Route::delete('/products/{id}/force', [\App\Http\Controllers\ProductUpdaterController::class, 'forceDelete']);

        // Category Management Routes
        Route::post('/categories', [\App\Http\Controllers\ProductUpdaterController::class, 'storeCategory']);
        Route::put('/categories/{id}', [\App\Http\Controllers\ProductUpdaterController::class, 'updateCategory']);

        // Message Management Routes
        Route::get('/messages', [\App\Http\Controllers\MessageController::class, 'index']);
        Route::post('/messages/{id}/read', [\App\Http\Controllers\MessageController::class, 'markAsRead']);
        Route::delete('/messages/{id}', [\App\Http\Controllers\MessageController::class, 'destroy']);
    });

    // Company Settings (Admin only, but strictly speaking checking role in controller)
    Route::get('/settings/company', [\App\Http\Controllers\CompanySettingsController::class, 'getSettings']);
    Route::post('/settings/company', [\App\Http\Controllers\CompanySettingsController::class, 'updateSettings']);

    // User Profile
    Route::post('/user/profile', [\App\Http\Controllers\AuthController::class, 'updateProfile']);
    Route::post('/user/password', [\App\Http\Controllers\AuthController::class, 'changePassword']);
});
