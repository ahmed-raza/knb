<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
            'car_make'=>'required',
            'car_model'=>'required',
            'car_year'=>'required',
            'mileage'=>'required',
            'car_color'=>'required',
            'price'=>'required',
            'description'=>'required',
        ];
    }
}
