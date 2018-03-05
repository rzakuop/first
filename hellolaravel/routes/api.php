<?php

use \hellolaravel\app\Task; //app\Taskを追加
use Illuminate\Http\Request;

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

/**
 * 全タスク表示
 */
Route::get('/', function () {
    return view('tasks');
});

/**
 * 新タスク追加
 */
Route::post('/task', function (Request $request) {
    //
});

/**
 * 既存タスク削除
 */
Route::delete('/task/{id}', function ($id) {
    //
});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
