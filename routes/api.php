<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\MediumController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    // Collections
    Route::get('/collections',[CollectionController::class,'index']);
    Route::get('/collections/{id}',[CollectionController::class,'show']);
    Route::post('/collections',[CollectionController::class,'store']);
    Route::put('/collections',[CollectionController::class,'update']);
    Route::delete('/collections/{id}',[CollectionController::class,'destroy']);

    // Bids
    Route::get('/bids',[BidController::class,'index']);
    Route::post('/bids',[BidController::class,'store']);
    Route::put('/bids',[BidController::class,'update']);
    Route::delete('/bids/{id}',[BidController::class,'destroy']);
    
    //Artwork
    Route::get('/artworks',[ArtworkController::class,'index']);
    Route::post('/artworks',[ArtworkController::class,'store']);
    Route::get('/artworks/{id}',[ArtworkController::class,'show']);
    Route::put('/artworks',[ArtworkController::class,'update']);
    Route::delete('/artworks/{id}',[ArtworkController::class,'destroy']);

    // Media
    Route::get('/media',[MediumController::class,'index']);
    Route::get('/category',[CategoryController::class,'index']);
});

// User
Route::post('/user',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);
});