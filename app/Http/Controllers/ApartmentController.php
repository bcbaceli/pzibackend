<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Apartment::with(['rooms', 'address', 'owner', 'reservations'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $apartment = Apartment::create($request->all());
        return $apartment->load(['rooms', 'address', 'owner', 'reservations']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Apartment::with(['rooms', 'address', 'owner', 'reservations'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->update($request->all());

        return $apartment->load(['rooms', 'address', 'owner', 'reservations']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        return $apartment;
    }
}
