<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatAddRequest extends FormRequest
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
            'title' => 'required|unique:catagories,title',
        ];
    }
    public  function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập danh mục',
            'title.unique' => 'Danh mục này đã tồn tại'
        ];
    }
}
