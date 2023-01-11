<?php

namespace App\Http\Requests;

use App\Models\Trainer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTrainerRequest extends FormRequest
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
            'first_name' => ['required', 'string','max:255'],
            'last_name' => ['required', 'string','max:255'],
            'phone' => ['string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255'],

            'contact'=>['string','min:6','max:60'],
            'expertise'=>['string','min:4','max:120'],
            'address'=>['string','min:3','max:180'],
            'picture_url'=>['file']
        ];
    }
}
