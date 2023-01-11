<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        $division =$this->whenLoaded('divisions');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'trading_name' => $this->trading_name,
            'registration_no' => $this->registration_no,
            'ifu' => $this->ifu,
            'contact_no' => $this->contact_no,
            'email' => $this->email,
            'website' => $this->website,
            'divisions'=>new DivisionResource($division),
            'tax_no' => $this->tax_no,
            'company_logo' => $this->getFirstMediaUrl('logo'),
            'is_active' => $this->is_active,
        ];
    }
}
