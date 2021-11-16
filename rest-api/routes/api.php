<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Import Animal Controller
use App\Http\Controllers\AnimalController;
// Import Student Controller
use App\Http\Controllers\StudentController;

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

// method get, enpoint aninmals
Route::get('/animals', [AnimalController::class, 'index']);

Route::post('/animals', [AnimalController::class, 'store']);

Route::put('/animals/{id}', [AnimalController::class, 'update']);

Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

// Routing untuk Students

// Get All Resource
Route::get("/students", [StudentController::class, 'index']);

// Add resources
Route::post("/students", [StudentController::class, 'store']);

// Get detail
Route::get("/students/{id}", [StudentController::class, 'show']);

// Update resource
Route::put("/students/{id}", [StudentController::class, 'update']);

// Delete resource
Route::delete("/students/{id}", [StudentController::class, 'destroy']);