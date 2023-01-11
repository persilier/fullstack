<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id'=>$this->id,
            'first_name'=> $this->first_name,
            'last_name'=> $this->last_name,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'roles'=> $this->roles,
            'avatar' => $this->getFirstMediaUrl('avatar'),
            'has2FA' => $this->two_factor_secret ? true : false,
            'gender' => $this->userProfile ? $this->userProfile->gender : null ,
            'address' =>$this->userProfile ? $this->userProfile->address   : null,
            'employeeID' =>$this->userProfile ? $this->userProfile->employeeID  : null,
            'father_name'=>$this->userProfile ?$this->userProfile->father_name  : null,
            'mother_name'=>$this->userProfile ?$this->userProfile->mother_name  : null,
            'spouse_name'=>$this->userProfile ? $this->userProfile->spouse_name  : null,
            'nationality'=>$this->userProfile ?$this->userProfile->nationality   : null,
            'num_cnss' =>$this->userProfile ? $this->userProfile->num_cnss  : null,
            'blood_type' =>$this->userProfile ? $this->userProfile->blood_type   : null,
            'id_name' =>$this->userProfile ?$this->userProfile->id_name  : null,
            'id_number' =>$this->userProfile ?$this->userProfile->id_number  : null,
            'phone_two'=>$this->userProfile ? $this->userProfile->phone_two  : null,
            'emergency_contact'=>$this->userProfile ? $this->userProfile->emergency_contact  : null,
            'marital_status'=>$this->userProfile ? $this->userProfile->marital_status  : null,
            'date_of_birth'=>$this->userProfile ? $this->userProfile->date_of_birth  : null,
            'ifu' =>$this->userProfile ? $this->userProfile->ifu  : null,
            'date_hired' =>$this->userProfile ?$this->userProfile->date_hired  : null,
            'exit_date'=>$this->userProfile ? $this->userProfile->exit_date  : null,
            'total_leave'=>$this->userProfile ? $this->userProfile->total_leave  : null,
            'remaining_leave'=>$this->userProfile ? $this->userProfile->remaining_leave  : null,
            'active' =>$this->userProfile ? $this->userProfile->active   : null,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,

        ];
    }
}
