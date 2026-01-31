<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Address::with(['apartments', 'guests'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = Address::create($request->all());
        return $address->load(['apartments', 'guests']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Address::with(['apartments', 'guests'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->all());

        return $address->load(['apartments', 'guests']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
    }
}
