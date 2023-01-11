<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
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
            'complaint_title'=>'required|string|min:3|max:30',
            'company_id'=>'integer',
            'description'=>'required|string|min:16|max:255',
            'complaint_date'=>'date|after_or_equal:today',
            'complaint_from'=>'integer',
            'complaint_against'=> 'integer',
            'status'=>'string',
        ];
    }
}
