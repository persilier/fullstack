<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTerminationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'description'=>'string|min:6|max:255',
            'company_id'=>'integer',
            'terminated_employee'=>'integer',
            'termination_type'=> 'integer',
            'termination_date'=>'required|date|after_or_equal:notice_date',
            'notice_date'=>'required|date|after_or_equal:today',
            'status'=>'string',
        ];
    }
}
