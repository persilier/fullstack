<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarningRequest extends FormRequest
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
        return [
            'subject'=>'string|min:3|max:30',
            'description'=>'string|min:12|max:255',
            'company_id'=>'integer',
            'warning_to'=>'integer',
            'warning_type'=> 'integer',
            'warning_date'=>'date|after_or_equal:today',
            'status'=>'string',
        ];
    }
}
