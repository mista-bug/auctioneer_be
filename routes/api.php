<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// collections
Route::get('/collections',[CollectionController::class,'index']);
Route::get('/collections/{id}',[CollectionController::class,'show']);
Route::post('/collections',[CollectionController::class,'store']);
Route::put('/collections',[CollectionController::class,'update']);
Route::delete('/collections',[CollectionController::class,'destroy']);

// bids
Route::get('/bids',[BidController::class,'index']);
Route::post('/bids',[BidController::class,'store']);
Route::put('/bid',[BidController::class,'update']);
Route::delete('/bids',[BidController::class,'destroy']);

//artwork
Route::get('/artworks',[ArtworkController::class,'index']);
Route::post('/artworks',[ArtworkController::class,'store']);
Route::get('/artworks/{id}',[ArtworkController::class,'show']);
Route::put('/artworks',[ArtworkController::class,'update']);
Route::delete('/artworks',[ArtworkController::class,'destroy']);

// user
Route::post('/user',[UserController::class,'store']);
Route::post('/login',[UserController::class,'login']);