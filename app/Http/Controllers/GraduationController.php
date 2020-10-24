<?php

namespace App\Http\Controllers;

use App\Http\Requests\GraduationRequest;
use App\Http\Resources\Graduation\GraduationResource;
use App\Http\Resources\Graduation\GraduationResourceCollection;
use App\Models\Graduation;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    public function index(Request $request)
    {
        return new GraduationResourceCollection(Graduation::with(['modality'])->get());
    }

    public function show($id)
    {
        $graduation = Graduation::query()->with(['modality'])->find($id);

        if ($graduation) {
            return new GraduationResource($graduation);
        }

        return response([], 404);
    }

    public function store(GraduationRequest $request)
    {
        $graduation = Graduation::query()->create($request->all());

        return new GraduationResource($graduation);
    }

    public function update(GraduationRequest $request, $id)
    {
        $graduation = Graduation::query()->find($id);

        if ($graduation) {
            $graduation->update($request->all());

            return new GraduationResource($graduation);
        }

        return response([], 404);
    }

    public function destroy(Request $request, $id)
    {
        $graduation = Graduation::query()->find($id);

        if ($graduation) {
            $graduation->delete();
            return response([], 200);
        }

        return response([], 404);
    }
}
