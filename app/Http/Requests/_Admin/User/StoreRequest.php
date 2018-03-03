<?php
namespace App\Http\Requests\_Admin\User;

use App\Http\Requests\Request;
use App\User;

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
                'unique:users,email,NULL,id,deleted_at,NULL',
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
            'email.required' => '"メールアドレス"は必ず入力してください',
            'email.email' => '"メールアドレス"をemailの形式で入力してください',
            'email.unique' => '"メールアドレス"は既に使用されています',
            'password.required' => '"password"は必ず入力してください',
            'password.max' => '"password"は:max文字以内で入力してください',
        ];
    }
}
