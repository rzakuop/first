<?php

use \hellolaravel\app\Task; //app\Task��ǉ�
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
 * �S�^�X�N�\��
 */
Route::get('/', function () {
    return view('tasks');
});

/**
 * �V�^�X�N�ǉ�
 */
Route::post('/task', function (Request $request) {
    //
});

/**
 * �����^�X�N�폜
 */
Route::delete('/task/{id}', function ($id) {
    //
});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
