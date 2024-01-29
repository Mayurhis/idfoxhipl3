<?php

namespace App\Http\Requests\Kyc;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KycStoreStepFourthRequest extends FormRequest
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
            'addressRadio' => ['required'],
            'addressImage'=> ['required','image', 'mimes:jpeg,png,jpg'],
        ];

        // $rules = [];
        //  if(request()->has('addressRadio') && request()->get('addressRadio') > '0'){
                
        //     $rules['addressImage'] = ['required','image', 'mimes:jpeg,png,jpg'];

        // }
        return $rules;
    }

    
}
