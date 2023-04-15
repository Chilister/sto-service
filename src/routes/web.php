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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [\App\Http\Controllers\MainController::class, 'index']);
Route::get('/pricing/categories', [\App\Http\Controllers\PricingController::class, 'categories'])
->name('pricing.categories');
Route::get('/pricing/categories/{category:slug}', [\App\Http\Controllers\PricingController::class, 'category'])
->name('pricing.category');
Route::group(['as' => 'docs.'], function () {
    includeRouteFiles(__DIR__.'/docs/');
});

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});
