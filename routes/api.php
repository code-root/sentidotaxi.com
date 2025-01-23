<?php

use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\SubscriberController;
use App\Http\Controllers\Site\ContactController;
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


Route::get('/', [APIController::class, 'home'])->name('home');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/subscribe', [SubscriberController::class, 'store']);


Route::get('/home', [APIController::class, 'home'])->name('home');
Route::get('/sliders', [APIController::class, 'getSliders'])->name('sliders.get');
Route::get('/testimonials', [APIController::class, 'getTestimonials'])->name('testimonials.get');
Route::get('/blogs', [APIController::class, 'getBlogs'])->name('blogs.get');
Route::get('/blog/{blog_id}', [APIController::class, 'getBlogId'])->name('blog.getById');
Route::get('/services', [APIController::class, 'getServices'])->name('services.get');
Route::get('/pages', [APIController::class, 'getPages'])->name('pages.get');
Route::get('/page/{page_id}', [APIController::class, 'getPageId'])->name('page.getById');
