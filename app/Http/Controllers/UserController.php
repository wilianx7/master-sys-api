<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserResourceCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return new UserResourceCollection(User::all());
    }

    public function show($id)
    {
        $user = User::query()->find($id);

        if ($user) {
            return new UserResource($user);
        }

        return response([], 404);
    }

    public function store(UserRequest $request)
    {
        $user = User::query()->create($request->all());

        return new UserResource($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::query()->find($id);

        if ($user) {
            $user->update($request->all());

            return new UserResource($user);
        }

        return response([], 404);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::query()->find($id);

        if ($user) {
            $user->delete();
            return response([], 200);
        }

        return response([], 404);
    }
}
