<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', [SiteController::class, 'home'])->name('home');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact', [ContactController::class, 'contact'])->name('contact.index');
Route::get('page/{name}', [PageController::class, 'showPage'])->name('page.show');
Route::post('/subscribe', [SubscriberController::class, 'store']);


Route::get('/home', [SiteController::class, 'home'])->name('home');
Route::get('/sliders', [SiteController::class, 'getSliders'])->name('sliders.get');
Route::get('/testimonials', [SiteController::class, 'getTestimonials'])->name('testimonials.get');
Route::get('/blogs', [SiteController::class, 'getBlogs'])->name('blogs.get');
Route::get('/blog/{blog_id}', [SiteController::class, 'getBlogId'])->name('blog.getById');
Route::get('/services', [SiteController::class, 'getServices'])->name('services.get');
Route::get('/pages', [SiteController::class, 'getPages'])->name('pages.get');
Route::get('/page/{page_id}', [SiteController::class, 'getPageId'])->name('page.getById');
