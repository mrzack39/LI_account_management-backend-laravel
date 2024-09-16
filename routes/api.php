<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LiAccountsReferenceController;
use App\Http\Controllers\LiAccountsStatusController;
use App\Http\Controllers\LiAccountsStageController;
use App\Http\Controllers\LiAccountsTypeController;


 
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});
// for refrence controller
Route::middleware('auth:api')->group(function () {
    Route::apiResource('li_accounts_reference', LiAccountsReferenceController::class);
});

//for account status
Route::middleware('auth:api')->group(function () {
    Route::apiResource('li_accounts_status', LiAccountsStatusController::class);
});

//for account stages
Route::middleware('auth:api')->group(function () {
    Route::apiResource('li_accounts_stages', LiAccountsStageController::class);
});

//for account type
Route::middleware('auth:api')->group(function () {
    Route::apiResource('li_accounts_type', LiAccountsTypeController::class);
});