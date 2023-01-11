<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLeaveTypeRequest extends FormRequest
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
            'code'=>'string|nullable|max:3',
            'name'=>'required|string',
            'description'=>'string',
            'earned_leave'=>'boolean',
            'carry_forward'=>'boolean',
            'number_days'=>'integer',
            'max'=>'integer',
            'status'=>'boolean',
            'applicable' => ['required','string', Rule::in(['male', 'female','anyone']),],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'earned_leave'=>$this->boolean('earned_leave'),
            'carry_forward'=>$this->boolean('carry_forward'),
            'status'=>$this->boolean('status'),
        ]);
    }
}
