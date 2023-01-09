<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\SommetController;
use App\Http\Controllers\ValleeController;

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

/**
 * Sommets Routes
 * 
 * index - Show all sommets
 * (show - Show single sommet)
 * create - Show form to create new sommet
 * store - Store new sommet in database
 * edit - Show form to edit sommet
 * update - Update sommet in database
 * destroy - Delete sommet from database
 */
Route::get('/sommets', [SommetController::class, 'index']);
Route::get('/sommets/create', [SommetController::class, 'create']);
Route::post('/sommets', [SommetController::class, 'store']);
Route::get('/sommets/{sommet}/edit', [SommetController::class, 'edit']);
Route::put('/sommets/{sommet}', [SommetController::class, 'update']);
Route::delete('/sommets/{sommet}', [SommetController::class, 'delete']);

/**
 * Vallees Routes
 * 
 * index - Show all vallees
 * (show - Show single vallee)
 * create - Show form to create new vallee
 * store - Store new vallee in database
 * edit - Show form to edit vallee
 * update - Update vallee in database
 * destroy - Delete vallee from database
 */
Route::get('/vallees', [ValleeController::class, 'index']);
Route::get('/vallees/create', [ValleeController::class, 'create']);
Route::post('/vallees', [ValleeController::class, 'store']);
Route::get('/vallees/{vallee}/edit', [ValleeController::class, 'edit']);
Route::put('/vallees/{vallee}', [ValleeController::class, 'update']);
Route::delete('/vallees/{vallee}', [ValleeController::class, 'delete']);
