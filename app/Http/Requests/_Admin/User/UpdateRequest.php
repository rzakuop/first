<?php
namespace App\Http\Requests\_Admin\User;

use App\Http\Requests\Request;
use App\User;

class UpdateRequest extends Request
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
                'unique:users,email,' . $this->id . ',id,deleted_at,NULL',
            ],
            'password' => [
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
            'password.max' => '"パスワード"は:max文字以内で入力してください',
        ];
    }
}
