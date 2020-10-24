<?php

namespace App\Http\Resources\Graduation;

use App\Http\Resources\Modality\ModalityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GraduationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'modality' => $this->resource->without_relations ? [] : ModalityResource::make($this->resource->modality),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
