<?php


use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get("index",[SiswaController::class,"index"]);
Route::post('store',[SiswaController::class,"store"])->name("apiStore");
Route::put("update",[SiswaController::class,"update"]);
Route::delete("delete",[SiswaController::class,"delete"]);
Route::get("show",[SiswaController::class,"show"]);
