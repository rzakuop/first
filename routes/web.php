<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as' => 'root.index',
    'uses' => 'RootController@index',
]);

// 依頼一覧（カテゴリ、都道府県別に絞込み可）
Route::get('requests', [
    'as' => 'request.index',
    'uses' => 'RequestController@index',
]);

// 依頼詳細
Route::get('request/{request}', [
    'as' => 'request.show',
    'uses' => 'RequestController@show',
])->where('request', '[0-9]+');

// ユーザープロフィール
Route::get('user/{user}', [
    'as' => 'user.show',
    'uses' => 'UserController@show',
])->where('user', '[0-9]+');


// お問い合わせ
Route::resource(
    'contact',
    'ContactController',
    ['only' => ['index','store']]
);

// 利用規約
Route::get('agreement', [
    'as' => 'static.agreement',
    function () {
        return view('static/agreement');
    }
]);

// プライバシーポリシー
Route::get('privacy', [
    'as' => 'static.privacy',
    function () {
        return view('static/privacy');
    }
]);


Route::group(['middleware' => ['guest:web']], function () {
    Route::get('signin', [
        'as' => 'auth.signin_form',
        'uses' => 'AuthController@signinForm',
    ]);

    Route::post('signin', [
        'as' => 'auth.signin',
        'uses' => 'AuthController@signin',
    ]);

    // パスワード再設定
    Route::get('reset_password/request', [
        'as' => 'reset_password.request_form',
        'uses' => 'ResetPasswordController@requestForm',
    ]);

    Route::post('reset_password/request', [
        'as' => 'reset_password.request',
        'uses' => 'ResetPasswordController@request',
    ]);

    Route::get('reset_password/reset/{token?}', [
        'as' => 'reset_password.reset_form',
        'uses' => 'ResetPasswordController@resetForm',
    ]);

    Route::put('reset_password/reset', [
        'as' => 'reset_password.reset',
        'uses' => 'ResetPasswordController@reset',
    ]);

    // 会員登録
    Route::get('user/create', [
        'as' => 'user.create',
        'uses' => 'UserController@create',
    ]);

    Route::post('user', [
        'as' => 'user.store',
        'uses' => 'UserController@store',
    ]);
});

Route::group(['middleware' => ['auth:web'], 'prefix' => 'my'], function () {
    Route::get('signout', [
        'as' => 'auth.signout',
        'uses' => 'AuthController@signout',
    ]);

    Route::post('request/pay', [
        'as' => 'request.pay',
        'uses' => 'RequestController@pay',
    ]);

    // 買い物依頼
    Route::resource('requests', 'RequestController');

    Route::post('present/pay', [
        'as' => 'present.pay',
        'uses' => 'PresentController@pay',
    ]);

    // 受注提示
    Route::resource('presents', 'PresentController');

    // お知らせ
    Route::resource('orders', 'OrderController', ['only' => [
        'show', 'index',
    ]]);

    Route::get('user/cancel', [
        'as' => 'user.cancel_form',
        'uses' => 'UserController@cancelForm',
    ]);

    Route::delete('user/cancel', [
        'as' => 'user.cancel',
        'uses' => 'UserController@cancel',
    ]);

    // プロフィール編集
    Route::get('user/edit', [
        'as'   => 'user.edit',
        'uses' => 'UserController@edit',
    ]);

    // プロフィール更新
    Route::put('user/update', [
        'as'   => 'user.update',
        'uses' => 'UserController@update',
    ]);

    //ユーザー メール変更
    Route::get('user/edit_email', [
        'as' => 'user.edit_email',
        'uses' => 'UserController@editEmail',
    ]);

    //ユーザー メール変更 メール送信
    Route::put('user/request_email', [
        'as' => 'user.request_email',
        'uses' => 'UserController@requestEmail',
    ]);

    //ユーザー メール変更 更新
    Route::get('user/update_email/{token?}', [
        'as' => 'user.update_email',
        'uses' => 'UserController@updateEmail',
    ]);

    //ユーザー パスワード変更
    Route::get('user/edit_password', [
        'as' => 'user.edit_password',
        'uses' => 'UserController@editPassword',
    ]);

    //ユーザー パスワード変更 更新
    Route::put('user/update_password', [
        'as' => 'user.update_password',
        'uses' => 'UserController@updatePassword',
    ]);
});


Route::group(['namespace' => '_Admin', 'prefix' => '_admin'], function () {

    Route::group(['middleware' => ['guest:admin']], function () {

        Route::get('signin', [
            'as' => '_admin.auth.signin_form',
            'uses' => 'AuthController@signinForm',
        ]);

        Route::post('signin', [
            'as' => '_admin.auth.signin',
            'uses' => 'AuthController@signin',
        ]);

    });


    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('signout', [
            'as' => '_admin.auth.signout',
            'uses' => 'AuthController@signout',
        ]);

        Route::get('/', [
            'as' => '_admin.root.index',
            'uses' => 'RootController@index',
        ]);

        // お知らせ
        Route::resource('notices', 'NoticeController', ['only' => [
            'show', 'index', 'store', 'create', 'edit', 'update', 'destroy',
        ]]);

        // カテゴリ
        Route::resource('categories', 'CategoryController', ['except' => [
            'show', 'index', 'create',
        ]]);

        Route::get('categories/{parent?}', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
        ])->where('parent', '[0-9]+');

        Route::get('categories/create/{parent?}', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
        ])->where('parent', '[0-9]+');

        // 管理者管理
        Route::resource('admins', 'AdminController');

        // ユーザー管理
        Route::resource('users', 'UserController');

    });

});
