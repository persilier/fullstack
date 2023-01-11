<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
                'name'=>'required|string',
                'type'=>'required|string',
                'trading_name'=>'required|string',
                'registration_no'=>'required|string',
                'ifu'=>'required|string',
                'contact_no'=>'required|string',
                'email'=>'required|string',
                'website'=>'string',
                'tax_no'=>'string',
                //'is_active'=>'boolean',
            ];

    }
}
