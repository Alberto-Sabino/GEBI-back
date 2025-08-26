<?php

use App\Http\Controllers\Child\CreateChildController;
use App\Http\Controllers\Child\DeleteChildController;
use App\Http\Controllers\Child\GetChildDetailsController;
use App\Http\Controllers\Child\GetChildListController;
use App\Http\Controllers\Child\UpdateChildController;
use App\Http\Controllers\Guardian\CreateGuardianController;
use App\Http\Controllers\Guardian\DeleteGuardianController;
use App\Http\Controllers\Guardian\GetGuardianDetailsController;
use App\Http\Controllers\Guardian\GetGuardianListController;
use App\Http\Controllers\Guardian\UpdateGuardianController;
use App\Http\Controllers\GuardianChildLinks\CreateGuardianChildLinkController;
use App\Http\Controllers\GuardianChildLinks\DeleteGuardianChildLinkController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Reports\GetAuditsReportController;
use App\Http\Controllers\Reports\GetChildenReportController;
use App\Http\Controllers\Reports\GetGuardiansReportController;
use App\Http\Controllers\Reports\GetUsersReportController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\GetUsersListController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Middleware\SavePersonalTokenInSession;
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

// Public routes
Route::withoutMiddleware(SavePersonalTokenInSession::class)->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [GetUsersListController::class, 'get']);
    Route::post('/', [CreateUserController::class, 'create']);
    Route::put('/{id}', [UpdateUserController::class, 'update']);
    Route::delete('/{id}', [DeleteUserController::class, 'delete']);
});

Route::prefix('children')->group(function () {
    Route::get('/', [GetChildListController::class, 'get']);
    Route::get('/{id}', [GetChildDetailsController::class, 'get']);

    Route::post('/', [CreateChildController::class, 'create']);
    Route::put('/{id}', [UpdateChildController::class, 'update']);
    Route::delete('/{id}', [DeleteChildController::class, 'delete']);
});

Route::prefix('guardians')->group(function () {
    Route::get('/', [GetGuardianListController::class, 'get']);
    Route::get('/{id}', [GetGuardianDetailsController::class, 'get']);

    Route::post('/', [CreateGuardianController::class, 'create']);
    Route::put('/{id}', [UpdateGuardianController::class, 'update']);
    Route::delete('/{id}', [DeleteGuardianController::class, 'delete']);
});

Route::prefix('links')->group(function () {
    Route::post('/', [CreateGuardianChildLinkController::class, 'create']);
    Route::delete('/{id}', [DeleteGuardianChildLinkController::class, 'delete']);
});

Route::prefix('reports')->group(function () {
    Route::get('/audits', [GetAuditsReportController::class, 'get']);
    Route::get('/children', [GetChildenReportController::class, 'get']);
    Route::get('/guardians', [GetGuardiansReportController::class, 'get']);
    Route::get('/users', [GetUsersReportController::class, 'get']);
});