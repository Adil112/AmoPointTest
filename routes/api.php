<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TrackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/comments', [CommentController::class, 'index']);
    Route::post('/track', [TrackController::class, 'store']);
});
