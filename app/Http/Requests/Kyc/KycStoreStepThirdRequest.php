<?php

namespace App\Http\Requests\Kyc;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KycStoreStepThirdRequest extends FormRequest
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
    public function rules(Request $request)
    {
    
        $rules =  [
            'liveImage' => [
                'required',
                'image',
                'mimes:jpeg,jpg,png'
            ],
            
        ];
        
        
        return $rules;
    }

    
}
