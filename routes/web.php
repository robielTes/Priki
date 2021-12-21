<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\OpinionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/days', [HomeController::class, 'index'])->name('days');
Route::get('/domains', [DomainController::class, 'index'])->name('domains');
Route::get('/days/{nbDays}', [HomeController::class, 'show']);
Route::get('/domains/{slug}', [DomainController::class, 'show']);
Route::get('/practices/{id}', [PracticeController::class, 'show'])->name('practices.show');
Route::post('/practices/{id}/opinion', [OpinionController::class, 'store'])->name('opinion.store');
