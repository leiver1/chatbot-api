<?php

use App\Http\Controllers\ChatbotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/chatbot', [ChatbotController::class, 'getResponse']);
Route::post('/chatbot2', [ChatbotController::class, 'getResponse2']);
Route::get('/test', [ChatbotController::class, 'test']);
Route::get('/test2', [ChatbotController::class, 'test2']);

