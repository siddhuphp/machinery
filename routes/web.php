<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('owner',  [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
// Route::get('signout', [AuthController::class, 'signOut'])->name('signout');


// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Logout route
    Route::get('/signOut', [AuthController::class, 'signOut'])->name('signOut');
    Route::get('dashboard',  [AuthController::class, 'index'])->name('dashboard');

    Route::get('admin-categories',  [CategoriesController::class, 'listCategories'])->name('categories');
    Route::get('add-category',  [CategoriesController::class, 'addCategory'])->name('add-category');
    Route::post('store-category',  [CategoriesController::class, 'storeCategory'])->name('store-category');
    Route::get('edit-category/{id}',  [CategoriesController::class, 'editCategory'])->name('edit-category');
    Route::put('update-category/{id}',  [CategoriesController::class, 'updateCategory'])->name('update-category');


    Route::get('admin-products',  [ProductsController::class, 'listProducts'])->name('products');
    Route::get('delete-category',  [ProductsController::class, 'addCategory'])->name('delete-category');
});
