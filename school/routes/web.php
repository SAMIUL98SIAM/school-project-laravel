<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.layouts.home');
Route::get('/course', [App\Http\Controllers\Frontend\FrontendController::class, 'course'])->name('frontend.layouts.course');
Route::get('/teacher', [App\Http\Controllers\Frontend\FrontendController::class, 'teacher'])->name('frontend.layouts.teacher');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.layouts.about');
Route::get('/pricing', [App\Http\Controllers\Frontend\FrontendController::class, 'pricing'])->name('frontend.layouts.pricing');
Route::get('/blog', [App\Http\Controllers\Frontend\FrontendController::class, 'blog'])->name('frontend.layouts.blog');
Route::get('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact'])->name('frontend.layouts.contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function(){
    Route::get('/view',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.view');
    Route::get('/create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('users.create');
    Route::post('/create',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('users.store');
    //Route::get('/edit/{id}',[\App\Http\Controllers\Admin\UserController::class,'edit'])->name('users.edit');
    Route::put('/update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('users.update');
    Route::get('/delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('users.delete');
});

Route::prefix('profiles')->group(function(){
    Route::get('/view',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profiles.view');
    // Route::get('/create',[\App\Http\Controllers\Admin\ProfileController::class,'create'])->name('profiles.create');
    // Route::post('/create',[\App\Http\Controllers\Admin\ProfileController::class,'store'])->name('profiles.store');
    Route::get('/edit',[\App\Http\Controllers\Admin\ProfileController::class,'edit'])->name('profiles.edit');
    Route::post('/update',[\App\Http\Controllers\Admin\ProfileController::class,'update'])->name('profiles.update');
   // Route::get('/delete/{id}',[\App\Http\Controllers\Admin\ProfileController::class,'destroy'])->name('profiles.delete');
});
