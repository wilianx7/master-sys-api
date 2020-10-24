<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModalityRequest;
use App\Http\Resources\Modality\ModalityResource;
use App\Http\Resources\Modality\ModalityResourceCollection;
use App\Models\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    public function index(Request $request)
    {
        return new ModalityResourceCollection(Modality::with(['graduations', 'plans'])->get());
    }

    public function show($id)
    {
        $modality = Modality::query()->with(['graduations', 'plans'])->find($id);

        if ($modality) {
            return new ModalityResource($modality);
        }

        return response([], 404);
    }

    public function store(ModalityRequest $request)
    {
        $modality = Modality::query()->create($request->all());

        return new ModalityResource($modality);
    }

    public function update(ModalityRequest $request, $id)
    {
        $modality = Modality::query()->find($id);

        if ($modality) {
            $modality->update($request->all());

            return new ModalityResource($modality);
        }

        return response([], 404);
    }

    public function destroy(Request $request, $id)
    {
        $modality = Modality::query()->find($id);

        if ($modality) {
            $modality->delete();
            return response([], 200);
        }

        return response([], 404);
    }
}
