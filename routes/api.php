<?php

use App\Http\Controllers\ArticuloController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('products' , [ProductsController::class,'index']);
Route::post('product/add' , [ProductsController::class,'store']);
Route::get('product/{id}/show' , [ProductsController::class,'show']);
Route::delete('product/{id}/delete' , [ProductsController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('api/articulos', 'ArticuloController');
