<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function messages(){
        return [
            'pic.dimensions' => 'Image width cannot be greater than :max_widthpx and height cannot be greater than :max_heightpx.',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|min:3',
            'phone' => 'required',
            'bio'   => 'required',
            'pic'   => 'dimensions:max_width=250,max_height=500',
        ];
    }
}
