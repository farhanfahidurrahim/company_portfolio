<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\GalleryController;

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

// <================ Frontend Part ============>
Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// <================ Backend Part Admin ============>

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/',[App\Http\Controllers\Admin\AdminController::class,'admin'])->name('admin');
//Banner Section
    Route::resource('/banner',BannerController::class);
    Route::post('/banner-status',[App\Http\Controllers\Admin\BannerController::class,'bannerStatus'])->name('banner.status');
//News Section
    Route::resource('/news',NewsController::class);
    Route::post('/news-status',[App\Http\Controllers\Admin\NewsController::class,'newsStatus'])->name('news.status');
//News Section
    Route::resource('/gallery',GalleryController::class);
    Route::post('/gallery-status',[App\Http\Controllers\Admin\GalleryController::class,'galleryStatus'])->name('gallery.status');

    Route::get('/album-index',[App\Http\Controllers\Admin\GalleryController::class,'albumIndex'])->name('album.index');
    Route::get('/album-create',[App\Http\Controllers\Admin\GalleryController::class,'albumCreate'])->name('album.create');
    Route::post('/album-store',[App\Http\Controllers\Admin\GalleryController::class,'albumStore'])->name('album.store');
    Route::get('/album-edit/{id}',[App\Http\Controllers\Admin\GalleryController::class,'albumEdit'])->name('album.edit');
    Route::post('/album-update/{id}',[App\Http\Controllers\Admin\GalleryController::class,'albumUpdate'])->name('album.update');
    Route::post('/album-destroy',[App\Http\Controllers\Admin\GalleryController::class,'albumDestroy'])->name('album.destroy');
    Route::post('/album-status',[App\Http\Controllers\Admin\GalleryController::class,'albumStatus'])->name('album.status');
});
