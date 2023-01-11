<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user=$this->whenLoaded('user');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'institution' => $this->institution,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => new UserResource($user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
