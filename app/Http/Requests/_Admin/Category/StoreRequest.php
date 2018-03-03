<?php

namespace App\Http\Requests\_Admin\Category;

use App\Http\Requests\Request;
use App\Category;

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
            'name'  => [
                'required',
                'max:100',
            ],
            'name_en'  => [
                'max:100',
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
            'name.required' => '“カテゴリ名"は必ず入力してください',
            'name.max' => '“カテゴリ名"は:max文字以内で入力してください',
            'name_en.max' => '“Category name"は:max文字以内で入力してください',
            'name_en.ascii' => '“Category name"は半角英数字で入力してください',
        ];
    }
}
