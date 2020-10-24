<?php

namespace App\Http\Resources\Plan;

use App\Http\Resources\Modality\ModalityResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlanResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $plans = [];

        foreach ($this->resource as $plan) {
            $plan->modality['without_relations'] = true;

            $plans[] = [
                'id' => $plan->id,
                'name' => $plan->name,
                'price' => $plan->price,
                'modality' => $plan->without_relations ? [] : ModalityResource::make($plan->modality),
                'created_at' => $plan->created_at,
                'updated_at' => $plan->updated_at,
            ];
        }

        return $plans;
    }
}
