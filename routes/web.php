<?php

use App\Enum\RegisterType;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

    $n = DB::table('schools')->where([
        'registerType' => RegisterType::NATIONAL,
        'status' => RegisterType::REGISTER_ENROLL
    ])->get();
    $i = DB::table('schools')->where([
        'registerType' => RegisterType::INTERNATIONAL,
        'status' => RegisterType::REGISTER_ENROLL
    ])->get();
    $t = DB::table('schools')->where([
        'registerType' => RegisterType::TRANSFER,
        'status' => RegisterType::REGISTER_ENROLL
    ])->get();

    $national = count($n);
    $international = count($i);
    $transfer = count($t);

    return view('dashboard', compact('national', 'international', 'transfer'));

});
// Route::resource('api',FamilyController::class);

Route::get('/admins/registers', [SchoolController::class, 'getRegister']);
Route::get('/admins/register/{id}', [SchoolController::class, 'showRegisterById']);
Route::get('/admins/register/{id}/edit', [SchoolController::class, 'editRegisterById']);
Route::put('/admins/registers/{id}',[SchoolController::class, 'updatedRegisterById']);
Route::get('/admins/register-delete/{id}', [SchoolController::class, 'deleteRegisterById']);
