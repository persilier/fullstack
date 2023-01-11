<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiplomaRequest extends FormRequest
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
            'user_id' => 'integer',
            'name' => 'required|string|min:3|max:100',
            'years' => 'required|date',
            'institution' => 'required|string|min:3|max:140',
            'diplomas' => 'file'
        ];
    }
}
