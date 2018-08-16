<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewEditRequest extends FormRequest
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
            'catagory_id' => 'required',
            'title' => 'required|',
            'description' => 'required',
            'content' => 'required',
            'newsImg' => 'image',
        ];
    }
    public  function messages()
    {
        return [
            'catagory_id.required' => 'Vui lòng chọn danh mục',
            'title.required' => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
            'content.required' => 'Vui lòng nhập nội dung',
            'newsImg.image' => 'Định dạng không phải là hình ảnh',
        ];
    }
}
