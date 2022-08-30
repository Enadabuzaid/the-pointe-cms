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
    Route::POST('redirect/store','App\Http\Controllers\RedirectController@store')->name('redirect.store');
    Route::DELETE('redirect/destroy','App\Http\Controllers\RedirectController@destroy')->name('redirect.destroy');
    Route::PUT('redirect/switch-status','App\Http\Controllers\RedirectController@switchStatus')->name('redirect.switch');
    Route::PUT('redirect/update','App\Http\Controllers\RedirectController@update')->name('redirect.update');



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



    Route::get('slider','App\Http\Controllers\Sliders\SliderController@index')->name('slider');
    Route::POST('slider/store','App\Http\Controllers\Sliders\SliderController@store')->name('slider.store');
    Route::DELETE('slider/destroy','App\Http\Controllers\Sliders\SliderController@destroy')->name('slider.destroy');
    Route::PUT('slider/switch-status','App\Http\Controllers\Sliders\SliderController@switchStatus')->name('slider.switch');
    Route::PUT('slider/update','App\Http\Controllers\Sliders\SliderController@update')->name('slider.update');


    Route::get('slider/slide/{id}','App\Http\Controllers\Sliders\SlideController@index')->name('slide');
    Route::POST('slider/slide/store','App\Http\Controllers\Sliders\SlideController@store')->name('slide.store');
    Route::DELETE('slider/slide/destroy','App\Http\Controllers\Sliders\SlideController@destroy')->name('slide.destroy');
    Route::PUT('slider/slide/switch-status','App\Http\Controllers\Sliders\SlideController@switchStatus')->name('slide.switch');
    Route::PUT('slider/slide/update','App\Http\Controllers\Sliders\SlideController@update')->name('slide.update');

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








