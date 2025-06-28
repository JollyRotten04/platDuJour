<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use App\Http\Controllers\LoginAuth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show'])->middleware('web');
// // Single login route (not duplicated)
// Route::post('/login', [LoginAuth::class, 'login']); // Changed from 'register' to 'login'

// // If you want separate registration route
// Route::post('/register', [LoginAuth::class, 'register']);

?>