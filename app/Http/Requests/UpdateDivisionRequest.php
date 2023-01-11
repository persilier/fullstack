<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDivisionRequest extends FormRequest
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
            'name'=>'string|required',
            'address'=>'string|required',
            'telephone'=>'string|required',
            'company_id'=>'integer|required',
            'country_id'=>'integer|required',
            'city_id'=>'integer|required',
            'location_manager'=>'integer|required',
        ];
    }
}
