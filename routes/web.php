<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name('home');
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, "index"])->name('gallery');
Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, "index"])->name('reviews');
Route::get('/faq', [\App\Http\Controllers\FaqController::class, "index"])->name('faq');
Route::get('/team', [\App\Http\Controllers\TeamController::class, "index"])->name('team');
Route::get('/location', [\App\Http\Controllers\PlaceController::class, "index"])->name('place');
Route::get('/about', [\App\Http\Controllers\AboutController::class, "index"])->name('about');
Route::get('/shifts', [\App\Http\Controllers\ShiftsController::class, "index"])->name('shifts');
Route::get('/oferta', [\App\Http\Controllers\OfertaController::class, "index"])->name('oferta');
Route::get('/payment', [\App\Http\Controllers\PaymentController::class, "index"])->name('payment');

/** forms */
Route::post('/orderTicket', [\App\Http\Controllers\OrderTicketController::class, "store"]);
Route::post('/askQuestion', [\App\Http\Controllers\AskQuestionController::class, "store"]);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
