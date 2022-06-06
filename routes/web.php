<?php

use App\Http\Controllers\BranchOfficeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class)->names('users');
Route::resource('branch-offices', BranchOfficeController::class)->names('branch.offices');
Route::resource('customers', CustomerController::class)->names('customers');
Route::resource('products', ProductController::class)->names('products');
Route::resource('product-types', ProductTypeController::class)->names('product.types');
Route::resource('providers', ProviderController::class)->names('providers');

Route::get('search-dni', [UserController::class, 'search_dni'])->name('search.dni');
Route::get('search-ruc', [ProviderController::class, 'search_ruc'])->name('search.ruc');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
