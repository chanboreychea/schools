<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
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

Route::post('students/register', [StudentController::class, 'studentRegister']);
Route::post('students/login', [StudentController::class, 'login']);

Route::group(['prefix' => 'v1', 'middleware' => ['studentChecker']], function () {

    Route::post('students/logout', [StudentController::class, 'logout']);

    Route::post('schools/national-register', [SchoolController::class, 'nationalRegister']);
    Route::post('schools/international-register', [SchoolController::class, 'internationalRegister']);
    Route::post('schools/transfer-register', [SchoolController::class, 'transferRegister']);

    Route::get('schools/registers',[SchoolController::class, 'allRegister']);

});
