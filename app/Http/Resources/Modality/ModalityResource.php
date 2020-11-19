<?php

namespace App\Http\Resources\Modality;

use App\Http\Resources\Graduation\GraduationResourceCollection;
use App\Http\Resources\Plan\PlanResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ModalityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'graduations' => $this->resource->without_relations && !$this->resource->from_plans ? [] : GraduationResourceCollection::make($this->resource->graduations),
            'plans' => $this->resource->without_relations ? [] : PlanResourceCollection::make($this->resource->plans),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
