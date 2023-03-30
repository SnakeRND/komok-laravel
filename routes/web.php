<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AskQuestionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\OrderTicketController;
use App\Http\Controllers\PaymentRulesController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/gallery', [GalleryController::class, "index"])->name('gallery');
Route::get('/reviews', [ReviewController::class, "index"])->name('reviews');
Route::get('/faq', [FaqController::class, "index"])->name('faq');
Route::get('/team', [TeamController::class, "index"])->name('team');
Route::get('/location', [PlaceController::class, "index"])->name('place');
Route::get('/about', [AboutController::class, "index"])->name('about');
Route::get('/shifts', [ShiftsController::class, "index"])->name('shifts');
Route::get('/oferta', [OfertaController::class, "index"])->name('oferta');
Route::get('/payment_rules', [PaymentRulesController::class, "index"])->name('oferta');

/** forms */
Route::post('/orderTicket', [OrderTicketController::class, "store"]);
Route::post('/askQuestion', [AskQuestionController::class, "store"]);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
