<?php

namespace App\Http\Resources\Plan;

use App\Http\Resources\Modality\ModalityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    public function toArray($request)
    {
        $canLoadRelations = !$this->resource->without_relations || $this->resource->from_registrations;

        if ($this->resource->from_registrations) {
            $this->resource->modality['without_relations'] = true;
        }

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'modality' => $canLoadRelations ? [] : ModalityResource::make($this->resource->modality),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
