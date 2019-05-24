<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBanneritemPost extends FormRequest
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
            'banner_id'=>'required|Checkbannerid',
            'digest'=>'required',
            'file'=>'sometimes|image',
        ];
    }

    public function messages(){
        return[
            'banner_id.required' => 'banner_id不能为空',
            'digest.required' => '摘要不能为空',
            'file.image' => '文件上传只能是图片',
        ];
    }
}
