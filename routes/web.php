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

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');



    Route::get('redirect','App\Http\Controllers\RedirectController@index')->name('redirect');
    Route::POST('redirect/store','App\Http\Controllers\RedirectController@store')->name('redirect.store');
    Route::DELETE('redirect/destroy','App\Http\Controllers\RedirectController@destroy')->name('redirect.destroy');
    Route::PUT('redirect/switch-status','App\Http\Controllers\RedirectController@switchStatus')->name('redirect.switch');
    Route::PUT('redirect/update','App\Http\Controllers\RedirectController@update')->name('redirect.update');

//    ******  SITEMAP START ROUTES  *******
    Route::get('/sitemap', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
    Route::get('/sitemap/generate', [App\Http\Controllers\SitemapController::class, 'generate'])->name('sitemap.generate');

//    ******* SITEMAP END ROUTES



    Route::get('menu','App\Http\Controllers\Menus\MenuController@index')->name('menu');
    Route::POST('menu/store','App\Http\Controllers\Menus\MenuController@store')->name('menu.store');
    Route::DELETE('menu/destroy','App\Http\Controllers\Menus\MenuController@destroy')->name('menu.destroy');
    Route::PUT('menu/switch-status','App\Http\Controllers\Menus\MenuController@switchStatus')->name('menu.switch');
    Route::PUT('menu/update','App\Http\Controllers\Menus\MenuController@update')->name('menu.update');




    Route::get('menu/menuitem/{id}','App\Http\Controllers\Menus\MenuItemController@index')->name('menuitem');
    Route::POST('menu/menuitem/store','App\Http\Controllers\Menus\MenuItemController@store')->name('menuitem.store');
    Route::DELETE('menu/menuitem/destroy','App\Http\Controllers\Menus\MenuItemController@destroy')->name('menuitem.destroy');
    Route::PUT('menu/menuitem/switch-status','App\Http\Controllers\Menus\MenuItemController@switchStatus')->name('menuitem.switch');
    Route::PUT('menu/menuitem/update','App\Http\Controllers\Menus\MenuItemController@update')->name('menuitem.update');







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


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

//Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');








