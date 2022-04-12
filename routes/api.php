<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\IndexController as UserController;
use App\Http\Controllers\API\Login\IndexController as LoginController;
use App\Http\Controllers\API\Event\IndexController as EventController;

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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/event', [EventController::class, 'saveEvent']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/event', [EventController::class, 'saveEvent']);
    Route::get('/event', [EventController::class, 'getEvent']);
    Route::post('/event/update', [EventController::class, 'updateEvent']);
    Route::post('/event/delete', [EventController::class, 'deleteEvent']);
});
