<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_id' => 'required',
            'plan_id' => 'required',
            'due_date' => 'required',
            'start_date' => 'required',
            'end_date' => 'sometimes|nullable',
        ];
    }
}
