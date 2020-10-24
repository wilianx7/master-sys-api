<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\Plan\PlanResource;
use App\Http\Resources\Plan\PlanResourceCollection;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        return new PlanResourceCollection(Plan::with(['modality'])->get());
    }

    public function show($id)
    {
        $plan = Plan::query()->with(['modality'])->find($id);

        if ($plan) {
            return new PlanResource($plan);
        }

        return response([], 404);
    }

    public function store(PlanRequest $request)
    {
        $plan = Plan::query()->create($request->all());

        return new PlanResource($plan);
    }

    public function update(PlanRequest $request, $id)
    {
        $plan = Plan::query()->find($id);

        if ($plan) {
            $plan->update($request->all());

            return new PlanResource($plan);
        }

        return response([], 404);
    }

    public function destroy(Request $request, $id)
    {
        $plan = Plan::query()->find($id);

        if ($plan) {
            $plan->delete();
            return response([], 200);
        }

        return response([], 404);
    }
}
