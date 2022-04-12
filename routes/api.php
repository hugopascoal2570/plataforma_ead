<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController,
    LessonController
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

Route::get('/modules{id}/lessons', [LessonController::class, 'index']);
Route::get('/modules/{îd}', [LessonController::class, 'show']);


Route::get('/', function () {
    return response()->json(['success ok' => true]);
});
