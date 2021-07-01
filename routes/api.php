<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/questions','API\QuestionController@index');
Route::post('/exam-save/{exam}','API\QuestionController@saveExam');
Route::post('/questions-save','API\QuestionController@questionStore');
Route::put('/questions-update/{id}','API\QuestionController@updateQuestion');
Route::get('/all-questions','API\QuestionController@allQuestions');
