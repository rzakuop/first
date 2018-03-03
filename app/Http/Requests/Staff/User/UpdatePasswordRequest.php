<?php

namespace App\Http\Requests\Staff\User;

use App\Http\Requests\Request;

class UpdatePasswordRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::guard('staff')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => [
                'required',
//                'between:6,20',
            ],
            'new_password' => [
                'required',
                'between:6,20',
                'confirmed',
                'ascii',
            ],
            'new_password_confirmation' => [
                'required',
                'between:6,20',
                'ascii',
            ],
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => '“現在のパスワード”は必ず入力してください',
            'password.between' => '“現在のパスワード”は:min〜:max文字で入力してください',
            'new_password.required' => '“新しいパスワード"は必ず入力してください',
            'new_password.between' => '“新しいパスワード”は:min〜:max文字で入力してください',
            'new_password.confirmed' => '“新しいパスワード(確認)”が“新しいパスワード”と一致しません',
            'new_password.ascii' => '“新しいパスワード”を正しく入力してください',
            'new_password_confirmation.required' => '“新しいパスワード(確認)”は必ず入力してください',
            'new_password_confirmation.between' => '“新しいパスワード(確認)”は:min〜:max文字で入力してください',
            'new_password_confirmation.ascii' => '“新しいパスワード(確認)”を正しく入力してください',
        ];
    }
}
