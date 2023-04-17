<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\NewsBlogController;
use App\Http\Controllers\Admin\AdministrativeController;
use App\Http\Controllers\Admin\VideoController;

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

Route::get('/gallery', [App\Http\Controllers\Frontend\GalleryController::class, 'gallery'])->name('nav.gallery');
Route::get('/album-image/{id}', [App\Http\Controllers\Frontend\GalleryController::class, 'albumImage'])->name('album.image');
Route::get('/get-album/{id}', [App\Http\Controllers\Frontend\GalleryController::class, 'getAlbum'])->name('get.album');

Route::get('/contact', [IndexController::class, 'contact'])->name('nav.contact');
Route::post('/contact-message-store', [IndexController::class, 'contactMessageStore'])->name('contact.message.store');

Route::get('/news-blog', [NewsBlogController::class, 'newsBlog'])->name('nav.news');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// <================ Backend Part Admin ============>

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/',[App\Http\Controllers\Admin\AdminController::class,'admin'])->name('admin');
    Route::get('/profile-edit',[App\Http\Controllers\Admin\AdminController::class,'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/profile-update/{id}',[App\Http\Controllers\Admin\AdminController::class,'adminProfileUpdate'])->name('admin.profile.update');
//Banner Section
    Route::resource('/banner',BannerController::class);
    Route::post('/banner-status',[App\Http\Controllers\Admin\BannerController::class,'bannerStatus'])->name('banner.status');
//News Section
    Route::resource('/news',NewsController::class);
    Route::post('/news-status',[App\Http\Controllers\Admin\NewsController::class,'newsStatus'])->name('news.status');
//Gallery Section
    Route::resource('/gallery',GalleryController::class);
    Route::post('/gallery-status',[App\Http\Controllers\Admin\GalleryController::class,'galleryStatus'])->name('gallery.status');

    Route::get('/album-index',[App\Http\Controllers\Admin\GalleryController::class,'albumIndex'])->name('album.index');
    Route::get('/album-create',[App\Http\Controllers\Admin\GalleryController::class,'albumCreate'])->name('album.create');
    Route::post('/album-store',[App\Http\Controllers\Admin\GalleryController::class,'albumStore'])->name('album.store');
    Route::get('/album-edit/{id}',[App\Http\Controllers\Admin\GalleryController::class,'albumEdit'])->name('album.edit');
    Route::post('/album-update/{id}',[App\Http\Controllers\Admin\GalleryController::class,'albumUpdate'])->name('album.update');
    Route::post('/album-destroy/{id}',[App\Http\Controllers\Admin\GalleryController::class,'albumDestroy'])->name('album.destroy');
    Route::post('/album-status',[App\Http\Controllers\Admin\GalleryController::class,'albumStatus'])->name('album.status');
//Video Section
    Route::resource('/video',VideoController::class);
    Route::post('/video-status',[App\Http\Controllers\Admin\VideoController::class,'videoStatus'])->name('video.status');
//Testimonial Section
    Route::resource('/testimonial',TestimonialController::class);
    Route::post('/testimonial-status',[App\Http\Controllers\Admin\TestimonialController::class,'testimonialStatus'])->name('testimonial.status');
//Administrative Section
    Route::resource('/administrative',AdministrativeController::class);
    Route::post('/administrative-status',[App\Http\Controllers\Admin\AdministrativeController::class,'administrativeStatus'])->name('administrative.status');
//Client Section
    Route::resource('/client',ClientController::class);
    Route::post('/client-status',[App\Http\Controllers\Admin\ClientController::class,'clientStatus'])->name('client.status');
//About Section
    Route::resource('/about',AboutController::class);
    // Route::post('/about-status',[App\Http\Controllers\Admin\AboutController::class,'aboutStatus'])->name('about.status');
//Contact Section
    Route::resource('/contact',ContactController::class);
    Route::get('/contact-message', [ContactController::class, 'contactMessage'])->name('contact.message');
    Route::DELETE('/contact-message-destroy/{id}', [ContactController::class, 'contactMessageDestroy'])->name('contact.message.destroy');
//Social Section
    Route::resource('/social-link',SocialLinkController::class);
});

