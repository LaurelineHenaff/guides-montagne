<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbriController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\SommetController;
use App\Http\Controllers\ValleeController;
use App\Http\Controllers\AscensionController;
use App\Http\Controllers\RandonneeController;
use App\Http\Controllers\UserController;

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
}); //->middleware('auth');

Route::get('/enregistrer', [UserController::class, 'create'])->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
Route::get('/connecter', [UserController::class, 'login'])->name('login');
Route::post('/deconnecter', [UserController::class, 'logout'])->middleware('auth');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


/**
 * Guides Routes
 * 
 * index - Show all guides
 * (show - Show single guide)
 * create - Show form to create new guide
 * store - Store new guide in database
 * edit - Show form to edit guide
 * update - Update guide in database
 * delete - Show confirmation form to delete guide
 * destroy - Delete guide from database
 */
Route::middleware(['auth'])->name('guides')->group(function () {
    Route::get('/guides', [GuideController::class, 'index']);
    Route::get('/guides/create', [GuideController::class, 'create']);
    Route::post('/guides', [GuideController::class, 'store']);
    Route::get('/guides/{guide}/edit', [GuideController::class, 'edit']);
    Route::put('/guides/{guide}', [GuideController::class, 'update']);
    Route::get('/guides/{guide}/delete', [GuideController::class, 'delete']);
    Route::delete('/guides/{guide}', [GuideController::class, 'destroy']);
});

/**
 * Sommets Routes
 * 
 * index - Show all sommets
 * (show - Show single sommet)
 * create - Show form to create new sommet
 * store - Store new sommet in database
 * edit - Show form to edit sommet
 * update - Update sommet in database
 * delete - Show confirmation form to delete sommet
 * destroy - Delete sommet from database
 */
Route::middleware(['auth'])->name('sommets')->group(function () {
    Route::get('/sommets', [SommetController::class, 'index']);
    Route::get('/sommets/create', [SommetController::class, 'create']);
    Route::post('/sommets', [SommetController::class, 'store']);
    Route::get('/sommets/{sommet}/edit', [SommetController::class, 'edit']);
    Route::put('/sommets/{sommet}', [SommetController::class, 'update']);
    Route::get('/sommets/{sommet}/delete', [SommetController::class, 'delete']);
    Route::delete('/sommets/{sommet}', [SommetController::class, 'destroy']);
});

/**
 * Vallees Routes
 * 
 * index - Show all vallees
 * (show - Show single vallee)
 * create - Show form to create new vallee
 * store - Store new vallee in database
 * edit - Show form to edit vallee
 * update - Update vallee in database
 * delete - Show confirmation form to delete vallee
 * destroy - Delete vallee from database
 */
Route::middleware(['auth'])->name('vallees')->group(function () {
    Route::get('/vallees', [ValleeController::class, 'index']);
    Route::get('/vallees/create', [ValleeController::class, 'create']);
    Route::post('/vallees', [ValleeController::class, 'store']);
    Route::get('/vallees/{vallee}/edit', [ValleeController::class, 'edit']);
    Route::put('/vallees/{vallee}', [ValleeController::class, 'update']);
    Route::get('/vallees/{vallee}/delete', [ValleeController::class, 'delete']);
    Route::delete('/vallees/{vallee}', [ValleeController::class, 'destroy']);
});

/**
 * Abris Routes
 * 
 * index - Show all abris
 * (show - Show single abri)
 * create - Show form to create new abri
 * store - Store new abri in database
 * edit - Show form to edit abri
 * update - Update abri in database
 * delete - Show confirmation form to delete abri
 * destroy - Delete abri from database
 */
Route::middleware(['auth'])->name('abris')->group(function () {
    Route::get('/abris', [AbriController::class, 'index']);
    Route::get('/abris/create', [AbriController::class, 'create']);
    Route::post('/abris', [AbriController::class, 'store']);
    Route::get('/abris/{abri}/edit', [AbriController::class, 'edit']);
    Route::put('/abris/{abri}', [AbriController::class, 'update']);
    Route::get('/abris/{abri}/delete', [AbriController::class, 'delete']);
    Route::delete('/abris/{abri}', [AbriController::class, 'destroy']);
});

/**
 * Ascension Routes
 * 
 * index - Show all ascensions
 * (show - Show single ascension)
 * create - Show form to create new ascension
 * store - Store new ascension in database
 * edit - Show form to edit ascension
 * update - Update ascension in database
 * delete - Show confirmation form to delete ascension
 * destroy - Delete ascension from database
 */
Route::middleware(['auth'])->name('ascension')->group(function () {
    Route::get('/ascension', [AscensionController::class, 'index']);
    Route::get('/ascension/create', [AscensionController::class, 'create']);
    Route::post('/ascension', [AscensionController::class, 'store']);
    Route::get('/ascension/{abri}/{sommet}/edit', [AscensionController::class, 'edit']);
    Route::put('/ascension/{abri}/{sommet}', [AscensionController::class, 'update']);
    Route::get('/ascension/{abri}/{sommet}/delete', [AscensionController::class, 'delete']);
    Route::delete('/ascension/{abri}/{sommet}', [AscensionController::class, 'destroy']);
});

/**
 * Randonnees Routes
 * 
 * index - Show all randonnees
 * show - Show single randonnee
 * (create - Show form to create new randonnee)
 * (store - Store new randonnee in database)
 * (edit - Show form to edit randonnee)
 * (update - Update randonnee in database)
 * (delete - Show confirmation form to delete randonnee)
 * (destroy - Delete randonnee from database)
 */
Route::middleware(['auth'])->name('randonnees')->group(function () {
    Route::get('/randonnees', [RandonneeController::class, 'index']);
    Route::get('/randonnees/{randonnee}', [RandonneeController::class, 'show']);
});
