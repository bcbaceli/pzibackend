<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Guest::with('user','address','reservations')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guest=Guest::create($request->all());
        return $guest->load(['user','address','reservations']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Guest::with('user','address','reservations')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guest=Guest::findOrFail($id);
        $guest->update($request->all());
        return $guest->load(['user','address','reservations']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest=Guest::findOrFail($id);
        $guest->delete();
        return $guest;
    }
}
