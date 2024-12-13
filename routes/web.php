<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(DashboardController::class)->prefix('dashboard')->group(function() {
    Route::get('', 'index')->name('dashboard');
});

Route::middleware('auth')->group(function () {
    //Menus
    Route::get('menus', [MenuController::class, 'index'])->name('menus.index');
    Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::get('delete/{id}', [MenuController::class, 'delete'])->name('menus.delete'); 

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories
    Route::get('category', [categoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [categoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [categoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
    Route::get('category/delete/{id}', [categoryController::class, 'delete'])->name('category.delete');
    Route::post('category/update/{id}', [categoryController::class, 'update'])->name('category.update');
});

require __DIR__.'/auth.php';
