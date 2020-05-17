<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('students','StudentsController',['except' => ['edit', 'create']]);
    Route::apiResource('teachers','TeachersController',['except' => ['edit', 'create']]);
    Route::prefix('attendance')->group(function(){
        Route::get('/daily/{class}/{section}','AttendanceController@daily')->name('attendance.daily');
        Route::get('/monthly/{class}/{section}/{month}','AttendanceController@monthly')->name('attendance.monthly');
    });
});
