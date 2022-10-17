<?php

use App\Http\Controllers\LinkController;
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

Route::get('/links', [LinkController::class, 'show'])->name('links.show');
Route::post('/links', [LinkController::class, 'create'])->name('links.create');
Route::get('/links/{short}', [LinkController::class, 'redirect'])
    ->middleware(['link.page_counter', 'link.expiration'])
    ->name('links.redirect');
