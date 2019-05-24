<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePagePost extends FormRequest
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
            'type'=>'required',
            'title'=>'required',
            'file'=>"image"
        ];
    }

    public function messages(){
        return[
            'title.required' => '标题不能为空',
            'type.required' => '类型不能为空',
            'file.image' => '文件上传只能是图片',
        ];
    }

}
