<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

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
Route::post('signup', [AuthController::class, 'signup']);
Route::post('signin', [AuthController::class, 'signin']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('signout', [AuthController::class, 'signout']);
    Route::get('getuser', [AuthController::class, 'getuser']);
    Route::get('book', [BookController::class, 'index']);
    Route::get('book/{id}', [BookController::class, 'show']);
    Route::post('book', [BookController::class, 'store']);
    Route::put('book/{book}', [BookController::class, 'update']);
    Route::delete('book/{book}', [BookController::class, 'destroy']);
});