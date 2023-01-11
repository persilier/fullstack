<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAwardRequest extends FormRequest
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
            'award_information'=>'string',
            'gift'=>'string',
            'cash'=>'string',
            'company_id'=>'integer',
            'department_id'=>'integer',
            'user_id'=> 'integer',
            'award_date'=>'date',
            'award_type_id'=>'integer',
        ];
    }
}
