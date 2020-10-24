<?php

namespace App\Http\Resources\Address;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $addresses = [];

        foreach ($this->resource as $address) {
            $addresses[] = [
                'id' => $address->id,
                'description' => $address->description,
                'number' => $address->number,
                'complement' => $address->complement,
                'district' => $address->district,
                'city' => $address->city,
                'state' => $address->state,
                'cep' => $address->cep,
                'created_at' => $address->created_at,
                'updated_at' => $address->updated_at,
            ];
        }

        return $addresses;
    }
}
