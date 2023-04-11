<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ScoringController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('kelas', KelasController::class);
Route::resource('siswa', StudentController::class);
Route::get('/penilaian/request-nisn-dan-id-mapel','App\Http\Controllers\ScoringController@nilai');

Route::resource('penilaian', ScoringController::class);
Route::resource('pelajaran', CourseController::class);
