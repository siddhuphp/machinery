<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;


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
    Route::get('delete-category/{id}',  [CategoriesController::class, 'deleteCategory'])->name('delete-category');


    Route::get('admin-products',  [ProductsController::class, 'listProducts'])->name('products');
    Route::get('add-product',  [ProductsController::class, 'create'])->name('add-product');
    Route::post('store-product',  [ProductsController::class, 'storeProduct'])->name('store-product');
    Route::get('edit-product/{id}',  [ProductsController::class, 'edit'])->name('edit-product');
    Route::post('update-product/{id}',  [ProductsController::class, 'updateProduct'])->name('update-product');
    Route::get('delete-product/{id}',  [ProductsController::class, 'deleteProduct'])->name('delete-product');
    Route::get('view-product/{id}',  [ProductsController::class, 'view'])->name('view-product');


    Route::get('admin-about',  [AboutController::class, 'create'])->name('add-about');
    Route::post('update-about',  [AboutController::class, 'updateAbout'])->name('update-about');
});

//Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories-list');
Route::get('/prod', [HomeController::class, 'prodtectDetails'])->name('product-details');
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact-us');
Route::post('/mail', [HomeController::class, 'sendMail'])->name('mail');
