<?php

namespace App\Http\Resources\Modality;

use App\Http\Resources\Graduation\GraduationResourceCollection;
use App\Http\Resources\Plan\PlanResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ModalityResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $modalities = [];

        foreach ($this->resource as $modality) {
            $modality->plans->each(function ($plan) {
                $plan['without_relations'] = true;
            });

            $modality->graduations->each(function ($graduation) {
                $graduation['without_relations'] = true;
            });

            $modalities[] = [
                'id' => $modality->id,
                'name' => $modality->name,
                'plans' => PlanResourceCollection::make($modality->plans),
                'graduations' => GraduationResourceCollection::make($modality->graduations),
                'created_at' => $modality->created_at,
                'updated_at' => $modality->updated_at,
            ];
        }

        return $modalities;
    }
}
