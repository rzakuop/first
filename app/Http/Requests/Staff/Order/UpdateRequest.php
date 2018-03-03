<?php

namespace App\Http\Requests\Staff\Order;

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
            'order_id' => [
                'required',
            ],
            'ok' => [
                'required',
            ],
            'prefer' => [
                'required',
            ],
            'staff_comment' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'order_id.required' => 'オーダーは必須です',
            'ok.required' => '依頼受入は必須です',
            'prefer.required' => '時間は必須です',
            'staff_comment.required' => 'コメントは必須です',
        ];
    }
}
