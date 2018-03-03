<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UpdateEmailRequest extends Request
{
    public function authorize()
    {
        return \Auth::guard('web')->check();
    }

    public function rules()
    {
        return [
            'new_email' => [
                'required',
                'email',
                'max:255',
                'unique:staffs,email,NULL,id,canceled_at,NULL',
            ],
        ];
    }

    public function messages()
    {
        return [
            'new_email.required' => '“メールアドレス"は必ず入力してください',
            'new_email.email' => '"メールアドレス"を正しく入力してください',
            'new_email.max' => '“メールアドレス”は:max文字以内で入力してください',
            'new_email.unique' => '入力した“メールアドレス”は既に登録されています',
        ];
    }
}
