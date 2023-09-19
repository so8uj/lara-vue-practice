<?php

use App\Http\Controllers\API\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{any}', function () {
    return view('admin.dashboard');
    // return view('welcome');
})->prefix('admin/')->where('router','*.');


Route::get('/api/students',[StudentController::class,'all_students']);
Route::controller(StudentController::class)->prefix('/api/student')->group(function(){
    Route::post('/add','add_student');
    Route::post('/update','update_student');
    Route::post('/delete/{id}','delete_student');
});


// Route::get('/admin/dashboard',function(){
//     return view('admin.dashboard');
// });
