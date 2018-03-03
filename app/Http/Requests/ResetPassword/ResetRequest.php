<?php

namespace App\Http\Requests\ResetPassword;

use App\Http\Requests\Request;

class ResetRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'token' => [
                'required',
            ],
            'password' => [
                'required',
                'between:6,20',
                'confirmed',
                'ascii',
            ],
            'password_confirmation' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'token.required' => '不正なアクセスです',
            'password.required' => '“新しいパスワード”は必ず入力してください',
            'password.confirmed' => '"新しいパスワード(確認)"が"新しいパスワード"と一致しません',
            'password.between' => '“新しいパスワード”は:min〜:max文字で入力してください',
            'password.ascii' => '“新しいパスワード”を正しく入力してください',
            'password_confirmation.required' => '“新しいパスワード(確認)”は必ず入力してください',
        ];
    }
}
