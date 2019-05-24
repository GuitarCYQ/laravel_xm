<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCasesPost extends FormRequest
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
            'remark'=>'required',
            'file'=>'image'
        ];
    }

    public function messages(){
        return[
            'title.required' => '标题不能为空',
            'remark.required' => '摘要不能为空',
            'file.image' => '文件上传只能是图片',
        ];
    }


    public function attributes()
    {
        return [
            'remark' => '摘要',
            'file'=>'上传文件',
        ];
    }
}
