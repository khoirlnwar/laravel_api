<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;

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

// Route::group(array('prefix' => 'api'), function() {
//     Route::resource('comments', 'CommentController', array('except' => array('create', 'edit')));
// });

// get index
Route::get('comments', 'CommentController@index');

// store data
Route::post('comments', 'CommentController@store');

// view by id
Route::get('comments/{id}', 'CommentController@show');

// update data by id
Route::put('comments/{id}', 'CommentController@update');

// delete data by id
Route::get('comments/delete/{id}', 'CommentController@destroy');