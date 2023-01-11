<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingRequest extends FormRequest
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
            'user_id'=>'integer',
            'trainer_id'=>'integer',
            'training_list_id'=> 'integer',
            'start_date'=>'date|after_or_equal:today',
            'end_date'=>'date|after:start_date',
            'description'=>'string|min:3|max:255',
        ];
    }
}
