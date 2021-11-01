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

Route::get('/topics', 'TopicController@index')->name('topics');
Route::get('/topics/{topic}', 'TopicController@show');

Route::get('/subscribers', 'SubscriberController@index');
Route::get('/subscribers/{subscriber}', 'SubscriberController@show');

Route::post('/subscribe/{topic}', 'SubscriptionsController@create');

Route::post('/publish/{topic}', 'EventController@create');

Route::post('/test', 'TestController@test');
Route::post('/test2', 'TestController@test2');
Route::post('/test3', 'TestController@test3');
