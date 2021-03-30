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

/*Route::get('/', function () {
    return view('welcome');
});
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecettesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\RecettesController as AdminRecettesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/recettes', [\App\Http\Controllers\RecettesController::class, 'index'])->name('recipes');
Route::get('/recettes/{url}', [\App\Http\Controllers\RecettesController::class, 'show'])->name('recipe');
Route::get('admin/recettes', [\App\Http\Controllers\Admin\RecettesController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('send');
Route::get('admin/recettes/create', [\App\Http\Controllers\Admin\RecettesController::class, 'create'])->name('create');;
Route::post('admin/recettes/create', [\App\Http\Controllers\Admin\RecettesController::class, 'store'])->name('store');

