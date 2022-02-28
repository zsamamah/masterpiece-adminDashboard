<?php

use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/rooms',[RoomController::class,'index']);
});

// Route::get('/rooms',[RoomController::class,'index']);

Route::post('/rooms',function(){
    return Room::create([
        'name'=>'test',
        'description'=>'lorem ipsum dolom',
        'capacity'=>'10'
    ]);
});