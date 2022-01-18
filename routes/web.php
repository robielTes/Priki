<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\ReferenceController;

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

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/days', [HomeController::class, 'index'])->name('days');
Route::get('/domains', [DomainController::class, 'index'])->name('domains');

Route::get('/days/{nbDays}', [HomeController::class, 'show'])
    ->whereNumber('nbDays');

Route::get('/domains/{slug}', [DomainController::class, 'show'])
    ->whereAlpha('slug');

Route::get('/practices', [PracticeController::class, 'index'])
    ->name('practices.index');

Route::get('/practices/{id}', [PracticeController::class, 'show'])
    ->name('practices.show')
    ->whereNumber('id');

Route::post('/practices/{id}/opinion', [OpinionController::class, 'store'])
    ->name('opinion.store')
    ->whereNumber('id');

Route::delete('/practices/{id}/opinion{oId}', [OpinionController::class, 'destroy'])
    ->name('opinion.destroy')
    ->whereNumber('id')
    ->whereNumber('oId');

Route::post('/practices/{id}/opinion{oId}/{vote}', [OpinionController::class, 'updateVote'])
    ->name('opinion.vote')
    ->whereNumber('id')
    ->whereNumber('oId')
    ->where('vote', '0|1|-1')
    ->middleware('auth');

Route::post('/practices/{id}/opinion{oId}/', [OpinionController::class, 'updateComment'])
    ->name('opinion.comment')
    ->whereNumber('id')
    ->whereNumber('oId')
    ->middleware('auth');

Route::get('/references', [ReferenceController::class, 'index'])->name('references');
Route::get('/references/create', [ReferenceController::class, 'create'])->name('references.create')
    ->middleware('auth');
Route::post('/references', [ReferenceController::class, 'store'])->name('references.store');
Route::post('/practices/{id}/publish', [ReferenceController::class, 'store'])->name('references.store');
