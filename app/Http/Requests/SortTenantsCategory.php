<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortTenantsCategory extends FormRequest
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
            'category_name_en'=>'required',
            'category_name_ar'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'category_name_en.required' => "[ Tenant Category English ] this field is required",
            'category_name_ar.required' => "[ Tenant Category Arabic ] this field is required"
        ];
    }
}
