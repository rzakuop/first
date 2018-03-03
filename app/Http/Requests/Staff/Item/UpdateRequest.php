<?php

namespace App\Http\Requests\Staff\Item;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('staff')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => [
                'required',
                'exists:items,category_id',
            ],
            'title' => [
                'required',
                'max:255',
            ],
            'price' => [
                'required',
                'integer',
            ],
            'max_hours' => [
                'required',
                'integer',
            ],
            'location' => [
                'required',
                'max:255',
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'file',
                'mimes:jpeg,bmp,png',
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'サービス名は必須です',
            'title.max' => '最大:max文字までです',
            'category.required' => 'カテゴリは必須です',
            'category.exists' => 'そのカテゴリは指定できません',
            'price.required' => '時給は必須です',
            'price.integer' => '数字で入力してください',
            'max_hours.required' => '最高時間は必須です',
            'max_hours.integer' => '数字で入力してください',
            'location.required' => '詳細な場所は必須です',
            'location.max' => '最大:max文字までです',
            'description.required' => '詳細説明は必須です',
            'image.file' => '画像ファイルを選択してください',
            'image.mimes' => 'ファイルタイプが正しくありません(:values)',
        ];
    }
}
