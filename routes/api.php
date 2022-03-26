<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\AuthCommand;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user',[AuthController::class,'user']);
});

Route::get('problems',[ProblemController::class,'get_problems']);
Route::get('user/problems/{user}',[ProblemController::class,'user_problems']);
Route::get('user_solved/problems/{user}',[ProblemController::class,'user_solved']);
Route::get('count_solved/problems/{user}',[ProblemController::class,'count_solved']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/compile',[CodeController::class,'compile']);
Route::post('/contact',[ContactController::class,'store']);
Route::get('problems/{problem}',[ProblemController::class,'one_problem']);
Route::get('tests/{test}',[TestController::class,'one_test']);
Route::post('solve/{user}/{email}/{problem}',[TestController::class,'solved']);
Route::post('reset-password/{email}',[MailController::class,'reset_password']);
Route::get('change-password/{email}',[UserController::class,'changePassword']);
Route::post('change-password/{email}/{user}',[UserController::class,'changePassword3']);