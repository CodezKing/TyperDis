<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Resources\AccountResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account = Account::with('user_id','credit_id','document_id')->paginate(10);
        return AccountResource::collection($account);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ]);

        $account = Account::findorFail($id);
        $account->update($validated);

        return new AccountResource($account);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = Account::with(['user_id','credit_id','document_id'])->findOrFail($id);
        return new AccountResource($account);
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
        $Account = Account::findOrFail($id);
        $Account->delete();

        return response()->json(['message','Login details deleted successfully'], 200);
    }
}
