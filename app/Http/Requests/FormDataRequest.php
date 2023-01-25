<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
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
            // 'image_1.*' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image_1' => 'required',
            'image_1.*' => 'mimes:jpg,jpeg,png,gif,bmp',
            'interior_image_1' => 'required',
            'condition_damage' => 'required',
            'condition_damage_url' => 'required',
            'existing_condition_report' => 'required',
            'any_damage_checked' => 'required',
            'advert_description' => 'required',
            'attention_grabber' => 'required',
            'nearside_front' => 'required',
            'nearside_rear' => 'required',
            'offside_front' => 'required',
            'offside_rear' => 'required',
            'tyre_image' => 'required',
        ];
    }
}
