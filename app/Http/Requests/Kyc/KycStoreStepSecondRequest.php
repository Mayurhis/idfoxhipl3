<?php

namespace App\Http\Requests\Kyc;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KycStoreStepSecondRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules =  [

            'PhotoIdRadio' => ['required'],
            'photoIdImage'=> ['required','image', 'mimes:jpeg,png,jpg'],
        ];

        // $rules = [];
        //  if(request()->has('PhotoIdRadio') && request()->get('PhotoIdRadio') > '0'){
                
        //     $rules['photoIdImage'] = ['required','image', 'mimes:jpeg,png,jpg'];

        // }
        return $rules;
    }

    
}
