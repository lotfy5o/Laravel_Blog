<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;

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

// Theme Routes
Route::controller(ThemeController::class)->name('Theme.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/category', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/singleBlog', 'singleBlog')->name('singleBlog');
});

// Subscriber Routes
Route::controller(SubscriberController::class)->name('Subscriber.')->group(function(){
    Route::post('/subscriber/store', [SubscriberController::class, 'store'])->name('store');
});


// Contact Routes
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
