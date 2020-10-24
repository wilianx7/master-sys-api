<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\GraduationController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/addresses', AddressController::class);
Route::apiResource('/graduations', GraduationController::class);
Route::apiResource('/modalities', ModalityController::class);
Route::apiResource('/plans', PlanController::class);
Route::apiResource('/registrations', RegistrationController::class);
Route::apiResource('/students', StudentController::class);
Route::apiResource('/users', UserController::class);
