<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLeaveTypeRequest extends FormRequest
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
            'earned_leave'=>['string', Rule::in(['true', 'false'])],
            'carry_forward'=>['string', Rule::in(['true', 'false'])],
            'number_days'=>'integer',
            'max'=>'integer',
            'status'=>['string', Rule::in(['active', 'inactive'])],
            'applicable' => ['required','string', Rule::in(['male', 'female','anyone']),],
        ];
    }
}
