<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'sometimes|nullable',
            'cep' => 'sometimes|nullable',
            'city' => 'sometimes|nullable',
            'complement' => 'sometimes|nullable',
            'district' => 'sometimes|nullable',
            'number' => 'sometimes|nullable',
            'state' => 'sometimes|nullable',
        ];
    }
}
