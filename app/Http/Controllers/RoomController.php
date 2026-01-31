<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Room::with('apartment')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room=Room::create($request->all());
        return $room->load('apartment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Room::with('apartment')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room=Room::findOrFail($id);
        $room->update($request->all());
        return $room->load('apartment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room=Room::findOrFail($id);
        $room->delete();

    }
}
