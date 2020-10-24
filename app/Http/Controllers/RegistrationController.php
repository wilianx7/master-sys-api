<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\Registration\RegistrationResource;
use App\Http\Resources\Registration\RegistrationResourceCollection;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        return new RegistrationResourceCollection(Registration::all());
    }

    public function show($id)
    {
        $registration = Registration::query()->with(['plan'])->find($id);

        if ($registration) {
            return new RegistrationResource($registration);
        }

        return response([], 404);
    }

    public function store(RegistrationRequest $request)
    {
        $registration = Registration::query()->create($request->all());

        return new RegistrationResource($registration);
    }

    public function update(RegistrationRequest $request, $id)
    {
        $registration = Registration::query()->find($id);

        if ($registration) {
            $registration->update($request->all());

            return new RegistrationResource($registration);
        }

        return response([], 404);
    }

    public function destroy(Request $request, $id)
    {
        $registration = Registration::query()->find($id);

        if ($registration) {
            $registration->delete();
            return response([], 200);
        }

        return response([], 404);
    }
}
