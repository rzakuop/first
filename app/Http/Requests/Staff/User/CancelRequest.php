<?php

namespace App\Http\Requests\Staff\User;

use App\Http\Requests\Request;
use App\Staff;

class CancelRequest extends Request
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
            'canceled_reason' => [
                'required',
                'in:' . implode(',', Staff::getCanceledReasons()),
            ],
            'canceled_other_reason' => [
                'max:500',
            ],
            'password' => [
                'required',
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
            'canceled_reason.required' => '“退会理由”は必ず選択してください',
            'canceled_reason.in' => '“退会理由”を正しく選択してください',
            'canceled_other_reason.max' => '“その他の理由”は:max文字以内で入力してください',
            'password.required' => '“パスワード”は必ず入力してください',
        ];
    }
}
