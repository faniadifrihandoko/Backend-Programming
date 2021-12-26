<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

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
//    return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function(){

Route::apiResource('patients',PatientController::class);

# Search resource by name
Route::get('/patients/search/{name}', [PatientController::class, 'search']);

# Get Positive Resource 
Route::get('/patients/status/positive', [PatientController::class, 'positive']);

# Get Recovered Resource
Route::get('/patients/status/recovered', [PatientController::class, 'recovered']);

# Get Dead Resource
Route::get('/patients/status/dead', [PatientController::class, 'dead']);

});

# Endpoint Register dan Login
Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);