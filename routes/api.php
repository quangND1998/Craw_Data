<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1'
], function () {
    Route::post('login', [AuthController::class, 'login']);



    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/product',[ProductController::class,'index']);
        
        Route::get('/product/paginate',[ProductController::class,'paginate']);
        Route::get('/product/search',[ProductController::class,'search']);
     
    
    });
    Route::middleware('jwt.refresh')->get('/token/refresh', 'API\AuthController@refresh');

});