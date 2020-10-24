<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Address\AddressResourceCollection;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        return new AddressResourceCollection(Address::all());
    }

    public function show($id)
    {
        $address = Address::query()->find($id);

        if ($address) {
            return new AddressResource($address);
        }

        return response([], 404);
    }

    public function store(AddressRequest $request)
    {
        $address = Address::query()->create($request->all());

        return new AddressResource($address);
    }

    public function update(AddressRequest $request, $id)
    {
        $address = Address::query()->find($id);

        if ($address) {
            $address->update($request->all());

            return new AddressResource($address);
        }

        return response([], 404);
    }

    public function destroy(Request $request, $id)
    {
        $address = Address::query()->find($id);

        if ($address) {
            $address->delete();
            return response([], 200);
        }

        return response([], 404);
    }
}
