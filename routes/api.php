<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    
    Route::get("patient","PatientController@index");
    Route::post("register","RegisterController@register");
    Route::post("login","AuthController@login");

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post("logout","AuthController@logout");

        Route::get("doctor","DoctorController@index");

        Route::get("schedule","ScheduleController@get");
        Route::post("schedule/submission","ScheduleController@submission");

        Route::get("patient-schedule","PatientScheduleController@get");

        Route::get("doctor-schedule","DoctorScheduleController@get");
    });
});