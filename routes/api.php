<?php

use App\Http\Controllers\ChatbotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/test', [ChatbotController::class, 'getResponse']);
Route::get('/get', [ChatbotController::class, 'test']);

