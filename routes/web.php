<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleReportController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [InventoryController::class, 'index'])->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth', 'special'); //special
Route::post('/category', [CategoryController::class, 'create'])->middleware('auth', 'special');
Route::delete('/category/{id}', [CategoryController::class, 'delete'])->middleware('auth', 'special');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->middleware('auth', 'special');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->middleware('auth', 'special'); //special


Route::get('/products', [ProductController::class, 'index'])->middleware('auth', 'special'); //special
Route::get('/products/add', [ProductController::class, 'add'])->middleware('auth', 'special');
Route::post('/product', [ProductController::class, 'create'])->middleware('auth', 'special');
Route::delete('/product/{id}', [ProductController::class, 'delete'])->middleware('auth', 'special');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware('auth', 'special');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->middleware('auth', 'special'); //special


Route::get('/sales', [SaleController::class, 'index'])->middleware('auth', 'user'); //user
Route::get('/sales/add', [SaleController::class, 'add'])->middleware('auth', 'user');
Route::post('/sale/action', [SaleController::class, 'action'])->middleware('auth', 'user');
Route::post('/sale/{id}', [SaleController::class, 'create'])->middleware('auth', 'user');
Route::put('/sale/update/{id}', [SaleController::class, 'update'])->middleware('auth', 'user');
Route::delete('/sale/{id}', [SaleController::class, 'delete'])->middleware('auth', 'user');
Route::get('/search', [SaleController::class, 'search'])->middleware('auth', 'user');//user


Route::get('sales/report', [SaleReportController::class, 'index'])->middleware('auth', 'admin');
Route::post('/report', [SaleReportController::class, 'read'])->middleware('auth', 'admin');
Route::get('/sales/daily', [SaleReportController::class, 'daily'])->middleware('auth', 'admin');
Route::get('/sales/monthly', [SaleReportController::class, 'monthly'])->middleware('auth', 'admin');


Route::get('/users', [UserController::class, 'index'])->middleware('auth', 'admin');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth', 'admin');
Route::put('/user/update/{id}', [UserController::class, 'update'])->middleware('auth', 'admin');
Route::delete('/user/{id}', [UserController::class, 'delete'])->middleware('auth', 'admin');



/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
