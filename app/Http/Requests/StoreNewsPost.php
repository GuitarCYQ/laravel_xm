<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsPost extends FormRequest
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
            'title' => 'required|unique:news|max:255',
            'contents' => 'required',
            'views' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'contents.required' => '内容不能为空',
            'views.required' => '浏览次数不能为空',
            'views.integer' => '浏览次数只能填数字',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'views' => '浏览次数'
        ];
    }
}
