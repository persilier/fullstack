<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileDocResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = $this->whenLoaded("user");
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            'filePath'=>$this->getFirstMedia('profileDoc') ? $this->getFirstMedia('profileDoc')->file_name : null,
            'fileType'=>$this->getFirstMedia('profileDoc') ? $this->getFirstMedia('profileDoc')->mime_type : null,
            'fileSize'=>$this->getFirstMedia('profileDoc') ? $this->getFirstMedia('profileDoc')->human_readable_size : null,
            "user" => new UserResource($user),
        ];
    }
}
