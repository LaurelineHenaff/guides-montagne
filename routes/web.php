<?php

use App\Http\Controllers\GuideController;
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
    return view('home');
});

/**
 * Guides Routes
 * 
 * index - Show all guides
 * (show - Show single guide)
 * create - Show form to create new guide
 * store - Store new guide in database
 * edit - Show form to edit guide
 * update - Update guide in database
 * destroy - Delete guide from database
 */
Route::get('/guides', [GuideController::class, 'index']);
Route::get('/guides/create', [GuideController::class, 'create']);
Route::post('/guides', [GuideController::class, 'store']);
Route::get('/guides/{guide}/edit', [GuideController::class, 'edit']);
Route::put('/guides/{guide}', [GuideController::class, 'update']);
Route::delete('/guides/{guide}', [GuideController::class, 'delete']);
