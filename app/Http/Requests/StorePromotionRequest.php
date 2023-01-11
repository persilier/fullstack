<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
{ /**
 * Determine if the user is authorized to make this request.
 *
 * @return bool
 */
    public function authorize():bool
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
            'user_id'=>['integer'],
            'company_id'=>['integer'],
            'promotion_title'=>['required','string','min:4','max:255'],
            'description'=>['required','string','min:10','max:255'],
            'promotion_date'=>['date'],
        ];
    }
}
