<?php

namespace App\Http\Resources\Student;

use App\Http\Resources\Address\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'birth_date' => $this->resource->birth_date,
            'gender' => $this->resource->gender,
            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
            'observation' => $this->resource->observation,
            'address' => $this->resource->without_relations ? [] : AddressResource::make($this->resource->address),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
