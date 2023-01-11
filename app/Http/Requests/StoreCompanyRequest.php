<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'company_name'=>'required|string',
            'company_type'=>'required|string',
            'trading_name'=>'required|string',
            'registration_no'=>'required|string',
            'ifu'=>'string',
            'contact_no'=>'string',
            'email'=>'string',
            'website'=>'string',
            'tax_no'=>'string',
            'is_active'=>'boolean',
        ];
    }
}
