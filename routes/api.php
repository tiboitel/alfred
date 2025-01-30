<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public dummy login route for Sanctum
Route::post('/login', function (Request $request) {
    return response()->json(['message' => 'Login is not needed for API authentication'], 200);
})->name('login');

// Public route to test job dispatching
Route::post('/ask-alfred', [AIController::class, 'askAlfred'])->middleware('auth:sanctum');
