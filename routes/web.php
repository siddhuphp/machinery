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

Route::get('dashboard',  [AuthController::class, 'index'])->name('dashboard');
Route::get('admin-categories',  [CategoriesController::class, 'listCategories'])->name('categories');
Route::get('admin-products',  [ProductsController::class, 'listProducts'])->name('products');
Route::get('add-category',  [ProductsController::class, 'addCategory'])->name('add-category');
Route::get('edit-category',  [ProductsController::class, 'addCategory'])->name('edit-category');
Route::get('delete-category',  [ProductsController::class, 'addCategory'])->name('delete-category');
