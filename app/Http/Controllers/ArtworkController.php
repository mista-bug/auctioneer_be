<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Artwork::with([
            'artist',
            'owner',
            'status',
            'category',
        ])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Artwork::create($request->all());
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
    public function show(Request $request, Artwork $artwork)
    {
        try {
            $foundArtwork = $artwork
                ->with(['artist','owner','status','category','bids.bidder'])
                ->findOrFail($request->id);
            return response()->json($foundArtwork,200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unsuccessful.'
            ],500);
        }        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        try {
            $artwork->update($request->all());
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
    public function destroy(Artwork $artwork)
    {
        try {
            $artwork->delete(request()->all());
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
