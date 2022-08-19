<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
//Language Translation

//Route::prefix('tenantsCategory')->group(function () {
//    Route::get('/', function () {
//        return view('tenantsCategory.index');
//    });
//});;
//-----------------------------

Route::prefix('admin')->group(function () {
    Route::get('redirect','App\Http\Controllers\RedirectController@index')->name('redirect');
});

// ------------------------
Route::group(['namespace' => 'App\Http\Controllers\Tenants'], function () {
    Route::resource('tenants-category', 'TenantsCategoryController');
});

Route::group(['namespace' => 'App\Http\Controllers\Tenants'], function () {
    Route::resource('tenants-sub-category', 'TenantsSubCategoryController');
});


Route::group(['namespace' => 'App\Http\Controllers\Tenants'], function () {
    Route::resource('tenants', 'TenantController');
});


Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');








