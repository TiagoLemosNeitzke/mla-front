<?php

use App\Http\Livewire\Category\Index as CategoryIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Category\Create as CategoryCreate;
use App\Http\Livewire\Category\Update as CategoryUpdate;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Ecommerce\Productlist;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Index as ProductIndex;


Route::get('loja/produtos', Productlist::class);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category/index', CategoryIndex::class)->name('category.index');
    Route::get('/category/create', CategoryCreate::class)->name('category.create');
    Route::get('/category/{category}/edit', CategoryUpdate::class)->name('category.update');

    Route::get('/product/index', ProductIndex::class)->name('product.index');
    Route::get('/product/create', ProductCreate::class)->name('product.create');
    Route::get('/product/{product}/edit', ProductCreate::class)->name('product.update');


});

require __DIR__.'/auth.php';
