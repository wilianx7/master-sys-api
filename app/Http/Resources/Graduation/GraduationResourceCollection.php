<?php

namespace App\Http\Resources\Graduation;

use App\Http\Resources\Modality\ModalityResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GraduationResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $graduations = [];

        foreach ($this->resource as $graduation) {
            $graduation->modality['without_relations'] = true;

            $graduations[] = [
                'id' => $graduation->id,
                'name' => $graduation->name,
                'modality' => $graduation->without_relations ? [] : ModalityResource::make($graduation->modality),
                'created_at' => $graduation->created_at,
                'updated_at' => $graduation->updated_at,
            ];
        }

        return $graduations;
    }
}
