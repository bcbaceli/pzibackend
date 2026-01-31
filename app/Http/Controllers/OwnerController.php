<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Owner::with('user','apartments')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner=Owner::create($request->all());
        return $owner->load('user','apartments');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Owner::with('user','apartments')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $owner=Owner::findOrFail($id);
        $owner->update($request->all());
        return $owner->load('user','apartments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $owner=Owner::findOrFail($id);
        $owner->delete();
    }
}
