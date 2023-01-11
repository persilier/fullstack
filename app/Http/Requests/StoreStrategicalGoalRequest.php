<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStrategicalGoalRequest extends FormRequest
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
            'code'=>'string',
            'description'=>'required|string',
            'start_year'=>'required|integer',
            'end_year'=>'required|integer',
            'company_id'=>'integer',
            'weight'=>'integer',
            'responsible'=>'integer',
            'status'=>['string', Rule::in(['not_started', 'in_progress','complete'])],
        ];
    }
}
