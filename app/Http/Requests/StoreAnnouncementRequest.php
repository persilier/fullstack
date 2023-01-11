<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementRequest extends FormRequest
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
            'title'=>'required|string|min:3|max:80',
            'start_date'=>'date|after_or_equal:today',
            'end_date'=>'date|after:start_date',
            'summary'=>'string|min:3|max:120',
            'description'=>'string|min:3|max:255',
            'company_id'=>'integer',
            'department_id'=> 'integer',
            'added_by'=>'integer',
            //'is_notify'=> 'boolean',
        ];
    }
}
