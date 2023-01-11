<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{

    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        $users = $this->whenLoaded('users');
        $teams = $this->whenLoaded('teams');
        return [
            'id' => $this->id,
            'department' => $this->department,
            'description' => $this->description,
            'users'=> UserResource::collection($users),
            'teams'=>TeamResource::collection($teams),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
