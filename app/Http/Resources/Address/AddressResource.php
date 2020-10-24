<?php

namespace App\Http\Resources\Address;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'description' => $this->resource->description,
            'number' => $this->resource->number,
            'complement' => $this->resource->complement,
            'district' => $this->resource->district,
            'city' => $this->resource->city,
            'state' => $this->resource->state,
            'cep' => $this->resource->cep,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
