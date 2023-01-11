<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'description'=>'string|min:6|max:255',
            'travel_type'=>'integer',
            'status'=>'string',
            'company_id'=>'integer',
            'travel_mode'=>'string',
            'user_id'=> 'integer',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'purpose_of_visit'=>'string',
            'place_of_visit'=>'string',
            'expected_budget'=>'string',
            'actual_budget'=>'string',
        ];
    }
}
