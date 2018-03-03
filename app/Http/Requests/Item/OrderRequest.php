<?php

namespace App\Http\Requests\Item;

use App\Http\Requests\Request;

class OrderRequest extends Request
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
            'item_id' => [
                'required',
                'integer',
            ],
            'hours' => [
                'required',
                'integer',
            ],
            'prefer_date' => [
                'required',
                'date',
            ],
            'prefer_hour' => [
                'required',
                'regex:/^([0-9]{2}:[0-9]{2})$/',
            ],
            'prefer_date2' => [
                'date',
            ],
            'prefer_hour2' => [
                'regex:/^([0-9]{2}:[0-9]{2})$/',
            ],
            'prefer_date3' => [
                'date',
            ],
            'prefer_hour3' => [
                'regex:/^([0-9]{2}:[0-9]{2})$/',
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
            'item_id.required' => '"商品"は必ず選択してください',
            'hours.required' => '"利用時間"は必ず入力してください',
            'hours.integer' => '"利用時間"は整数をしてください',
            'prefer_date.required' => '"希望日時(日)"は必ず入力してください',
            'prefer_date.date' => '"希望日時(日)"は日付を入力してください',
            'prefer_hour.required' => '"希望日時(時間)"は必ず入力してください',
            'prefer_hour.regex' => '"希望日時(時間)"は時間(hh:mm)をしてください',
            'prefer_date2.date' => '"希望日時(日)"は日付を入力してください',
            'prefer_hour2.regex' => '"希望日時(時間)"は時間(hh:mm)をしてください',
            'prefer_date3.date' => '"希望日時(日)"は日付を入力してください',
            'prefer_hour3.regex' => '"希望日時(時間)"は時間(hh:mm)をしてください',
        ];
    }
}
