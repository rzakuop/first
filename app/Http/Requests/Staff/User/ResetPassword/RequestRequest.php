<?php

namespace App\Http\Requests\Staff\User\ResetPassword;

use App\Http\Requests\Request;
use App\Staff\User\ResetPassword;

class RequestRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '“メールアドレス”は必ず入力してください',
            'email.email' => '“メールアドレス”を正しく入力してください',
        ];
    }
}
