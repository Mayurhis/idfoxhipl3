<?php

namespace App\Http\Requests\Kyc;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KycStoreStepFirstRequest extends FormRequest
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
            'first_name'=> [
                'required',
                'max:255',
            ],
            'last_name'=> [
                'required',
                'max:255',
            ],
            'dob'=> [
                'required',
                'date',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                 Rule::unique('customers')->where(function ($query) {
                         $query->whereNull('deleted_at');
                 }),

            ],
            'mobile_number'=> [
                'nullable',
                'digits_between:7,15',
            ],
            'address_line_1'=> [
                'required',
                'max:255',
            ],
            'city'=> [
                'required',
                'max:255',
            ],
            'region'=> [
                'required',
                'max:255',
            ],
            'country_id'=> [
                'required',
                Rule::exists('countries', 'id'),
            ]
        ];
        return $rules;
    }

    // public function messages()
    // {
    //     $lang = request()->header('accepted-lang');

    //     return [
    //         'first_name.required' => __('validation.required', ['attribute' => __('attributes.first_name')], $lang),
    //         'first_name.max' => __('validation.max.string', ['attribute' => __('attributes.first_name')], $lang),

    //         'last_name.required' => __('validation.required', ['attribute' => __('attributes.last_name')], $lang),
    //         'last_name.max' => __('validation.max.string', ['attribute' => __('attributes.last_name')], $lang),

    //         'mobile_number.digits_between' => __('validation.digits_between', ['attribute' => __('attributes.mobile_number')], $lang),

    //         'dob.required' => __('validation.required', ['attribute' => __('attributes.dob')], $lang),
    //         'dob.date' => __('validation.date', ['attribute' => __('attributes.dob')], $lang),

    //         'address_line_1.required' => __('validation.required', ['attribute' => __('attributes.address')], $lang),
    //         'address_line_1.max' => __('validation.max.string', ['attribute' => __('attributes.address')], $lang),

    //         'city.required' => __('validation.required', ['attribute' => __('attributes.city')], $lang),
    //         'city.max' => __('validation.max.string', ['attribute' => __('attributes.city')], $lang),

    //         'region.required' => __('validation.required', ['attribute' => __('attributes.region')], $lang),
    //         'region.max' => __('validation.max.string', ['attribute' => __('attributes.region')], $lang),

    //         'country_id.required' => __('validation.required', ['attribute' => __('attributes.country')], $lang),
    //         'country_id.exists' => __('validation.exists', ['attribute' => __('attributes.country')], $lang),

    //         'email.required' => __('validation.required', ['attribute' => __('attributes.email')], $lang),
    //         'email.email' => __('validation.email', ['attribute' => __('attributes.email')], $lang),
    //         'email.max' => __('validation.max.string', ['attribute' => __('attributes.email')], $lang),
    //         'email.unique' => __('validation.unique', ['attribute' => __('attributes.email')], $lang),
            
    //     ];
    // }
}
