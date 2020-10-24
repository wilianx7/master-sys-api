<?php

namespace App\Http\Resources\Student;

use App\Http\Resources\Address\AddressResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $students = [];

        foreach ($this->resource as $student) {
            $student->address['without_relations'] = true;

            $students[] = [
                'id' => $student->id,
                'name' => $student->name,
                'birth_date' => $student->birth_date,
                'gender' => $student->gender,
                'email' => $student->email,
                'phone' => $student->phone,
                'observation' => $student->observation,
                'address' => $student->without_relations ? [] : AddressResource::make($student->address),
                'created_at' => $student->created_at,
                'updated_at' => $student->updated_at,
            ];
        }

        return $students;
    }
}
