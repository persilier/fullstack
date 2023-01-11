<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user=$this->whenLoaded('employee');
        $team=$this->whenLoaded('team');
        return [
            'id'=>$this->id,
            'user_id'=>$user,
            'team_id'=>$team
        ];
    }
}
