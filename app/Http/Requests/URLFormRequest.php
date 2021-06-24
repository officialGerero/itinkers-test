<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class URLFormRequest extends FormRequest
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
            'link'=>'required|url',
        ];
    }

    public function messages()
    {
        return [
            'link.required'=>'You have to provide a link',
            'link.url'=>'Provided link isn`t valid!',
        ];
    }
}
