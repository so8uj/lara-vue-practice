<?php

use App\Http\Controllers\API\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::controller(StudentController::class)->prefix('/api/student/')->group(function(){
//     Route::post('/add','add_student');
// });
Route::post('/api/student/add',[StudentController::class,'add_student']);
Route::get('/api/students/trash_students',[StudentController::class,'trash_students']);