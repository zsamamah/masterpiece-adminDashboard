<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']],function(){
    //admin dashboard
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    //users CRUD
    Route::get('/admin-users',[UserController::class,'index'])->name('admin-users');
    Route::get('/admin-users/{user}/edit',[UserController::class,'show'])->name('edit-user');
    Route::put('/admin-users/{user}/edit',[UserController::class,'update'])->name('update-user');
    Route::delete('/admin-users/{user}/delete',[UserController::class,'destroy'])->name('delete-user');
    //rooms CRUD
    Route::get('admin-rooms',[RoomController::class,'index'])->name('admin-rooms');
    Route::get('admin-rooms/create',function(){return view('admin.rooms.add');});
    Route::post('admin-rooms/create',[RoomController::class,'create'])->name('create-room');
    Route::delete('admin-rooms/{room}/delete',[RoomController::class,'destroy'])->name('delete-room');
    Route::get('admin-rooms/{room}/edit',[RoomController::class,'edit'])->name('edit-room');
    Route::put('admin-rooms/{room}',[RoomController::class,'update'])->name('store-room');
    //problems crud
    Route::resource('admin-problems',ProblemController::class);
});