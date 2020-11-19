<?php

namespace App\Http\Resources\Registration;

use App\Http\Resources\Plan\PlanResource;
use App\Http\Resources\Student\StudentResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegistrationResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $registrations = [];

        foreach ($this->resource as $registration) {
            $registration->plan['from_registrations'] = true;

            $registrations[] = [
                'id' => $registration->id,
                'due_date' => $registration->due_date,
                'start_date' => $registration->start_date,
                'end_date' => $registration->end_date,
                'student' => $registration->without_relations ? [] : StudentResource::make($registration->student),
                'plan' => $registration->without_relations ? [] : PlanResource::make($registration->plan),
                'created_at' => $registration->created_at,
                'updated_at' => $registration->updated_at,
            ];
        }

        return $registrations;
    }
}
