<?php

namespace App\Http\Resources\Registration;

use App\Http\Resources\Plan\PlanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'due_date' => $this->resource->due_date,
            'start_date' => $this->resource->start_date,
            'end_date' => $this->resource->end_date,
            'plan' => $this->resource->without_relations ? [] : PlanResource::make($this->resource->plan),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
