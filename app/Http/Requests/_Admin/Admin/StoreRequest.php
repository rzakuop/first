<?php
namespace App\Http\Requests\_Admin\Admin;

use App\Http\Requests\Request;
use App\Admin;

class StoreRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'unique:admins,email',
            ],
            'password' => [
                'required',
                'max:255',
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
            'email.required' => '"email"は必ず入力してください',
            'email.max' => '"email"は:max文字以内で入力してください',
            'email.unique' => '同一の"email"が登録されています。',
            'password.required' => '"パスワード"は必ず入力してください',
            'password.max' => 'password"は:max文字以内で入力してください',
        ];
    }
}
