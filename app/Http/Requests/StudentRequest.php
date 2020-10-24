<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_data' => 'required|array',
            'student_data.name' => 'required',
            'student_data.birth_date' => 'required',
            'student_data.gender' => 'required',
            'student_data.email' => 'sometimes|nullable',
            'student_data.observation' => 'sometimes|nullable',
            'student_data.phone' => 'sometimes|nullable',
            'student_data.address_id' => 'sometimes|nullable',

            'address_data' => 'sometimes|nullable|array',
            'address_data.description' => 'sometimes|nullable',
            'address_data.cep' => 'sometimes|nullable',
            'address_data.city' => 'sometimes|nullable',
            'address_data.complement' => 'sometimes|nullable',
            'address_data.district' => 'sometimes|nullable',
            'address_data.number' => 'sometimes|nullable',
            'address_data.state' => 'sometimes|nullable',
        ];
    }
}
