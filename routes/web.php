<?php

use App\Http\Livewire\Category\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Category\Create;
use App\Http\Livewire\Category\Update;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('category/index', Index::class)->name('category.index');
    Route::get('category/create', Create::class)->name('category.create');
    Route::get('category/{category}/edit', Update::class)->name('category.update');
});

require __DIR__.'/auth.php';
