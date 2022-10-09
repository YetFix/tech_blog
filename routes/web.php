<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardCOntroller;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','IsUser'])->name('dashboard');

Route::prefix('admin')->middleware(['auth','IsAdmin'])->group(function(){
    Route::get('/dashboard',[DashboardCOntroller::class,'index'])->name('admin.dashboard');
   //category resource
    Route::resource('/categories',CategoryController::class);
    //posts resource
    Route::resource('/posts',PostController::class);

    //users resource
    Route::resource('/users',UserController::class);
});

require __DIR__.'/auth.php';
