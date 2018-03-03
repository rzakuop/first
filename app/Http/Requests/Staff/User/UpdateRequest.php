<?php

namespace App\Http\Requests\Staff\User;

use App\Http\Requests\Request;
use App\Staff;

class UpdateRequest extends Request
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
            'image' => [
                'image',
            ],
            'last_name' => [
                'required',
                'max:50',
            ],
            'first_name' => [
                'required',
                'max:50',
            ],
            'area' => [
                'required',
                'max:50',
            ],
            'description' => [
                'required',
                'max:1000',
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
            'image.image' => '"画像"はjpg,png,gifのいずれかを選択してください',
            'last_name.required' => '"姓"は必ず入力してください',
            'last_name.max' => '"姓"は:max文字以内で入力してください',
            'first_name.required' => '"名"は必ず入力してください',
            'first_name.max' => '"名"は:max文字以内で入力してください',
            'area.required' => '"エリア"は必ず入力してください',
            'area.max' => '"エリア"は:max文字以内で入力してください',
            'description.required' => '"プロフィール"は必ず入力してください',
            'description.max' => '"プロフィール"は:max文字以内で入力してください',
        ];
    }
}
