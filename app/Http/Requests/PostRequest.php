<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'email',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '名前を入力してください',
            'email.email' => '正しい形式で入力してください',
            'body.required' => 'お問い合わせ内容をを入力してください',
        ];    
    }
}
