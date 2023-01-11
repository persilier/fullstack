<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomLeavePolicyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $assignTo= $this->whenLoaded('user');
        $leaveType= $this->whenLoaded('LeaveType');
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'num_days'=>$this->num_days,
            'users'=> new UserResource($assignTo),
            'leave_type'=> new LeaveTypeResource($leaveType),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at

        ];
    }
}
