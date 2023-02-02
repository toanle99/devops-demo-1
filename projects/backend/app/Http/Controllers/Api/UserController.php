<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return new UserResource($user);
        
    }

    public function show($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        return $user->update($request->all());
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
