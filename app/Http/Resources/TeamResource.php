<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $members=$this->whenLoaded('teamMembers');
        $depart=$this->whenLoaded('department');
        return [
            'id'=>(int)$this->id,
            'name'=>$this->name,
            'status'=>$this->status,
            'teamMembers'=>$members,
            'department'=>$depart,

        ];
    }
}
