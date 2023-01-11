<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransfertRequest extends FormRequest
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
            'description' =>'string|min:6|max:255',
            'company_id'=>'integer',
            'from_department_id'=>'integer',
            'to_department_id'=> 'integer',
            'user_id'=> 'integer',
            'transfer_date'=> 'required|date|after_or_equal:today',
        ];
    }
}
