<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;


class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['Account'])->paginate(10);
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // no need
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::with(['Account'])->findOrFail($id);
        return new UserResource($users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
