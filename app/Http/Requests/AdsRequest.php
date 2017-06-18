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
            'city'=>'required',
            'year'=>'required',
            'car_make'=>'required',
            'car_model'=>'required',
            'car_version'=>'required',
            'registration_city'=>'required',
            'mileage'=>'required',
            'exterior_color'=>'required',
            'description'=>'required',
            'price'=>'required',
            'seller_name'=>'required',
            'mobile_number'=>'required',
        ];
    }
}
