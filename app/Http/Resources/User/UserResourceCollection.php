<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $users = [];

        foreach ($this->resource as $user) {
            $users[] = [
                'id' => $user->id,
                'name' => $user->name,
                'password' => $user->password,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        }

        return $users;
    }
}
