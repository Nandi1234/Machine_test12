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

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
Route::resource('users','UserController')->middleware('admin');
Route::resource('questions','QuestionController');
Route::get('exam-create','ExamController@createExam')->name('exam');
Route::get('exams','ExamController@indexExam')->name('indexexam');
Route::get('exam-show/{exam_id}','ExamController@showExam')->name('showexam');
Route::post('exam-save/{exam_id}','ExamController@saveExam')->name('examSave');
});
