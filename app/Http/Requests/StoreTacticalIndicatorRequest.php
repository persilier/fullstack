<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTacticalIndicatorRequest extends FormRequest
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
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'tactical_goal_id'=>'integer',
            'weight'=>'integer|min:0|max:100',
            'responsible'=>'integer',
            'status'=>['string', Rule::in(['not_started', 'in_progress','complete'])],
            'trust'=>['string',Rule::in(['low','high','medium'])],
            'init_value'=>'integer|min:0|max:100',
            'target'=>'integer|min:0|max:100',
            'current_value'=>'integer|min:0|max:100',
            'progress'=>'integer|min:0|max:100',
            'comments'=>'string',
            'next_step'=>'string'
        ];
    }
}
