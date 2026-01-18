<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Str;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Collection::with('organizer')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Collection $collection, Request $request)
    {
        try {
            $collection->create([
                'event_id' => Str::uuid(),
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location' => $request->location,
                'address' => $request->address,
                'description' => $request->description,
                'organizer_id' => $request->organizer_id,
            ]);
            return response()->json([
                'message' => 'Successful.'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unsuccessful.'
            ],500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,Collection $collection)
    {
        try {
            $foundItem = $collection
                ->with(['organizer','artworks'])
                ->findOrFail($request->id);
            return response()->json($foundItem,200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unsuccessful.'
            ],500);
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Collection $collection)
    {
        try {
            $collection->update(request()->all());
            return response()->json([
                'message' => 'Successful.'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unsuccessful.'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        try {
            $collection->delete(request()->id);
            return response()->json([
                'message' => 'Successful.'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unsuccessful.'
            ],500);
        }
    }
}
