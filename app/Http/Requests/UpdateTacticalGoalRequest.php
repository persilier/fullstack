<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTacticalGoalRequest extends FormRequest
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
            'strategical_goal_id'=>'integer',
            'department_id'=>'integer',
            'type'=>['string',Rule::in(['trimester','semester'])],
            'code'=>'string',
            'description'=>'required|string',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'weight'=>'integer',
            'responsible'=>'integer',
            'status'=>['string', Rule::in(['not_started', 'in_progress','complete'])],
        ];
    }
}
