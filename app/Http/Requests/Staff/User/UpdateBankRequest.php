<?php

namespace App\Http\Requests\Staff\User;

use App\Http\Requests\Request;
use App\Staff;

class UpdateBankRequest extends Request
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
            'bank_name' => [
                'required',
                'max:100'
            ],
            'bank_branch_name' => [
                'required',
                'max:100'
            ],
            'bank_account_number' => [
                'required',
                'digits_between:7,8'
            ],
            'bank_account_last_name' => [
                'required',
                'max:20'
            ],
            'bank_account_first_name' => [
                'required',
                'max:20'
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
            'bank_name.required' => '"銀行名"は必ず入力してください',
            'bank_name.max' => '"銀行名"は:max文字以内で入力してください',
            'bank_branch_name.required' => '"支店名"は必ず入力してください',
            'bank_branch_name.max' => '"支店名"は:max文字以内で入力してください',
            'bank_account_number.required' => '"口座番号"は必ず入力してください',
            'bank_account_number.digits_between' => '"口座番号"は:min桁～:max桁の数字を入力してください',
            'bank_account_last_name.required' => '"口座名義 姓"は必ず入力してください',
            'bank_account_last_name.max' => '"口座名義 姓"は:max文字以内で入力してください',
            'bank_account_first_name.required' => '"口座名義 名"は必ず入力してください',
            'bank_account_first_name.max' => '"口座名義 名"は:max文字以内で入力してください',
        ];
    }
}
