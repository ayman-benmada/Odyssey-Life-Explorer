<?php

use App\Http\Controllers\OpenAiController;
use Illuminate\Support\Facades\Route;

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/openai/show', [OpenAiController::class, 'show']);
Route::post('/openai/send-message', [OpenAiController::class, 'sendMessage']);
