<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\LoginAuth;

Route::post('/login', [LoginAuth::class, 'login']);

Route::post('/recipes', [RecipesController::class, 'fetchRecipes']);

Route::get('/articles', [ArticlesController::class, 'fetchArticles']);

// In routes/api.php
// Route::get('/csrf-token', function () {
//     return response()->json(['csrf_token' => csrf_token()]);
// });


// Route::options('/{any}', function () {
//     return response()->json([], 200);
// })->where('any', '.*');