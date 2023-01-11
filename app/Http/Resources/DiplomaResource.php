<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiplomaResource extends JsonResource
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
            'id' =>$this->id,
            'name' => $this->name,
            'institution' => $this->institution,
            'years' => $this->years,
            'diplomas'=>$this->getFirstMedia('diplomas') ? $this->getFirstMedia('diplomas')->file_name : null,
            'diploma_size'=>$this->getFirstMedia('diplomas') ? $this->getFirstMedia('diplomas')->human_readable_size : null,
            'user' => new UserResource($user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
