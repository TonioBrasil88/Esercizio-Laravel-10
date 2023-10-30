<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('homepage'); })->name('homepage');

Route::middleware(['auth'])->group(function () {  //middleware serve a proteggere le rotte agli utenti non loggati

    //* con il middleware auth andiamo a proteggere le rotte alle quali lo applichiamo
    Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('article/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('article/delete/{article}', [ArticleController::class, 'destroy'])->name('article.delete');

});

Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('article.show');