<?php
namespace App\Http\Requests\_Admin\Notice;
use App\Http\Requests\Request;
use App\Notice;
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
            'title'  => [
                'required',
                'max:100',
            ],
            'content'  => [
                'required',
            ],
            'start_at' => [
                'required',
                'date_format:Y-m-d',
                'before:end_at'
            ],
            'end_at' => [
                'required',
                'date_format:Y-m-d',
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
            'title.required' => '“タイトル"は必ず入力してください',
            'title.max' => '“タイトル"は:max文字以内で入力してください',
            'content.required' => '“内容"は必ず入力してください',
            'start_at.required' => '“開始日“は必ず入力してください',
            'start_at.date_format' => '“開始日“を正しく入力してください',
            'start_at.before' => '”開始日”は“終了日”より前の日付を入力してください',
            'end_at.required' => '“終了日“は必ず入力してください',
            'end_at.date_format' => '“終了日“を正しく入力してください',
      ];
    }
}
