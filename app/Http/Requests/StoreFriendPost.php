<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFriendPost extends FormRequest
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
            'title'=>'required',
            'url'=>'required|url',
            'sort'=>'integer'
        ];
    }

    public function messages(){
        return[
            'title.required' => '标题不能为空',
            'url.required' => '地址栏不能为空',
            'url.url' => '地址栏需要填写标准的格式',
            'sort.integer' => '排序栏必须填数字',
        ];
    }
}
