<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'sliders_title' =>'required',

            'expires_date'   =>  'required',
//            'expires_date'   =>  'required|date|date_format:d/m/Y|after_or_equal:today',

        ];
    }
    
    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            $checkRecord=[];
            if($this->id) {
                
                $checkRecord = [];

            } else {
                 if(!$this->newImage){
                    $checkRecord=['newImage'];
                 }
            }

            if ( count($checkRecord)> 0 ) {

                $validator->errors()->add('newImage', 'Please select image.');
            }

        });
    }
}
