<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reservation::with('guest','apartment')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation=Reservation::create($request->all());
        return $reservation->load('guest','apartment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Reservation::with('guest','apartment')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation=Reservation::findOrFail($id);
        $reservation->update($request->all());
        return $reservation->load('guest','apartment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation= Reservation::findOrFail($id);
        $reservation->delete();
    }
}
