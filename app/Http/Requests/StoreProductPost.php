<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'cid'=>'required|integer',
            'title'=>'required',
            'remark'=>'required',
            'file'=>'required',
            'file'=>"image",
            'contents'=>'required',
        ];
    }

    public function messages(){
        return[
            'title.required' => '标题不能为空',
            'cid.required' => '所属分类不能为空',
            'remark.required' => '摘要不能为空',
            'file.required' => '文件上传不能为空',
            'file.image' => '文件上传只能是图片',
            'contents' => '内容不能为空',
        ];
    }
}
