<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $comp= $this->whenLoaded('company');
        $departments= $this->whenLoaded('department');
        $addedBy= $this->whenLoaded('announcer');
        return [
            'id' => $this->id,
            'title'=> $this->title,
            'start_date'=> $this->start_date,
            'end_date'=> $this->end_date,
            'summary'=> $this->summary,
            'description'=> $this->description,
            'company'=> new CompanyResource($comp),
            'department'=>new DepartmentResource($departments),
            'added_by'=>new UserProfileResource($addedBy),
            'is_notify'=> $this->is_notify,
        ];
    }
}
