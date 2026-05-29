<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FontController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\online_Publicationscontroller;
use App\Http\Controllers\CreditController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function() {
Route::apiResource('Publishings',online_Publicationscontroller::class);
Route::apiResource('Credit_account',CreditController::class);
Route::apiResource('Document',DocumentController::class);
Route::apiResource('user',UserController::class);
Route::apiResource('Account',AccountController::class);
Route::apiResource('Font',FontController::class);
});


