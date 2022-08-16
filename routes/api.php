<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiLogoutController;
use App\Http\Controllers\GetTotalNumController;
use App\Http\Controllers\SubmitReplyController;
use App\Http\Controllers\GetCountingNumController;
use App\Http\Controllers\SubmitNewMessageController;



// Route::post("log-in", [ApiLoginController::class, "login"]);
// Route::post('log-out', [ApiLogoutController::class, 'logout']);


/*
Route::middleware('auth:api')->group(function() {

    Route::resource("/get_data", GetDataController::class);

    Route::resource("/get_total_num", GetTotalNumController::class)->only("index");

    Route::resource("/get_counting_num/{beginning_date}/{ending_date}", GetCountingNumController::class)->only("index");

    Route::resource("/submit_new_message", SubmitNewMessageController::class)->only("store");

    Route::resource("/submit_reply", SubmitReplyController::class)->only("store");
});
*/

Route::resource("/get_data", GetDataController::class);

Route::resource("/get_total_num", GetTotalNumController::class)->only("index");

Route::resource("/get_counting_num/{beginning_date}/{ending_date}", GetCountingNumController::class)->only("index");

Route::resource("/submit_new_message", SubmitNewMessageController::class)->only("store");

Route::resource("/submit_reply", SubmitReplyController::class)->only("store");



