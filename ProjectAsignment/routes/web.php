<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kelas','App\Http\Controllers\KelasController@index');
Route::get('/kelas/detail','App\Http\Controllers\KelasController@detail');
Route::get('/siswa','App\Http\Controllers\StudentController@index');
Route::get('/siswa/detail','App\Http\Controllers\StudentController@detail');
Route::get('/siswa/detailmapel','App\Http\Controllers\StudentController@detailmapel');
Route::get('/penilaian', 'App\Http\Controllers\ScoringController@index');
//Route::get('/mapel', 'App\Http\Controllers\CourseController@index');
