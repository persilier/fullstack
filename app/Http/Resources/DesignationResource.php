<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DesignationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $department= $this->whenLoaded('department');
        return [
            'id' => $this->id,
            'designation' => $this->designation,
            'description' => $this->description,
            'department' => new DepartmentResource($department),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
