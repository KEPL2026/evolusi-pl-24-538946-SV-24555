<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Prefix semua API endpoint di sini. Route ini akan di-handle oleh Laravel.
| Contoh: Route::get('/api/users', [UserController::class, 'index']);
|
*/

// Route::prefix('api')->group(function () {
//     // Definisikan API routes di sini
// });

/*
|--------------------------------------------------------------------------
| SPA Catch-All
|--------------------------------------------------------------------------
|
| Semua request yang bukan API akan diarahkan ke blade view `app`,
| yang berisi React SPA. React Router akan menangani routing di frontend.
|
*/

Route::get('/{any?}', function () {
    return view('app');
})->where('any', '.*');
