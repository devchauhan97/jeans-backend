<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DB;

class ProductStoreAttributeRequest extends FormRequest
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
                'products_options_id'                    =>   'required',
                'products_id'                            =>   'required', 
                'products_options_values_id'             =>   'required', 
                 
                ];
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            
            if($this->products_attributes_id) {
                
                $checkRecord = DB::table('products_attributes')->where([
                            'options_id'       =>   $this->products_options_id,
                            'products_id'      =>   $this->products_id, 
                            'options_values_id'=>   $this->products_options_values_id,  
                    ])->whereNotIn('products_attributes_id',[$this->products_attributes_id]
                    )->get();

            } else {

                $checkRecord = DB::table('products_attributes')->where([
                    'options_id'                    =>   $this->products_options_id,
                    'products_id'                   =>   $this->products_id, 
                    'options_values_id'             =>   $this->products_options_values_id,  
                    ])->get();
            }

            if ( count($checkRecord)> 0 ) {

                $validator->errors()->add('products_options_id', 'Option allready exits.');
            }

        });
    }

}
