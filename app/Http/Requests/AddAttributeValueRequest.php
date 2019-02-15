<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\ProductsOptionsValue;

class AddAttributeValueRequest extends FormRequest
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
            'products_options_values_name' => 'required',

        ];
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            
            if($this->products_options_values_id) {
                 
                $checkRecord = ProductsOptionsValue::where([
                             'products_options_values_name'      =>   $this->products_options_values_name, 
                    ])->whereNotIn('products_options_values_id',[$this->products_options_values_id]
                    )->get();

            } else {

                $checkRecord = ProductsOptionsValue::where([
                    'products_options_values_name'                    =>   $this->products_options_values_name])->get();
            }

            if ( count($checkRecord)> 0 ) {

                $validator->errors()->add('products_options_values_name', 'Option value  allready exits.');
            }

        });
    }

}
