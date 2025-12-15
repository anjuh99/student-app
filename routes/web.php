<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController; // Controller එක උඩින්ම දාන්න

// 1. මුල් පිටුව (මෙහිදී අපි ශිෂ්‍ය ලැයිස්තුව සහ ෆෝම් එක පෙන්නමු)
Route::get('/', [StudentController::class, 'index']);

// 2. දත්ත සේව් කරන පාර (POST)
Route::post('/save-student', [StudentController::class, 'store']);

// 3. Delete Route
Route::delete('/delete-student/{id}', [StudentController::class, 'destroy']);

// 4. Edit Page පෙන්වන Route එක
Route::get('/edit-student/{id}', [StudentController::class, 'edit']);

// 5. Update Route (PUT method)
Route::put('/update-student/{id}', [StudentController::class, 'update']);