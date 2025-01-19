<?php

use Illuminate\Http\Request;
use App\Helpers\TranslationHelper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ServiceController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\API\SubscriberController;


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
Route::post('storeText', function (Request $request) {
    $data = $request->all();
    return response()->json(TranslationHelper::storeText($data));
})->name('storeText');

    Route::get('getText', function (Request $request) {
        $languageId = $request->input('language_id');
        $token = $request->input('token');
        return response()->json(TranslationHelper::getText($languageId, $token));
    })->name('getText');



    Route::get('/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return "Cleared cach , config , view , optimize !";
    });


Route::get('set-locale/{locale}', [HomeController::class, 'setLocale'])->name('set.locale');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact', [ContactController::class, 'contact'])->name('contact.index');
Route::get('page/{name}', [HomeController::class, 'showPage'])->name('page.show');
Route::post('/subscribe', [SubscriberController::class, 'store']);


Route::get('service', [ServiceController::class, 'index'])->name('service.home');
Route::get('/service/{id}', [ServiceController::class, 'showServiceDetails'])->name('service.details');
Route::post('/service/subscribe', [ServiceController::class, 'subscribe'])->name('form.submit');


Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blog.show');
