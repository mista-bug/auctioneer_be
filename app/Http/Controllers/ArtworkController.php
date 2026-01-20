<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Log;

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
            // 'provenance',
        ])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $artwork = Artwork::create($request->all());
            return response()->json([
                'message' => 'Successful.',
                'data' => $artwork, 
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
                ->with(['artist','owner','status','category','bids.bidder','provenance.owner'])
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
            $validated = $request->validate([
                'artwork_id' => 'required|exists:artworks,id',
                'artist_id' => 'required|exists:users,id',
                'title' => 'sometimes|string',
                'description' => 'sometimes|string',
                'reserve_price' => 'sometimes|string',
            ]);
    
            $artwork = Artwork::findOrFail($validated['artwork_id']);
    
            if ($artwork->artist_id != $validated['artist_id']) {
                return response()->json([
                    'message' => 'Unauthorized. Artwork does not belong to this artist.'
                ], 403);
            }
    
            $updateData = collect($validated)->except(['artwork_id', 'artist_id'])->toArray();
            $artwork->update($updateData);
    
            Log::info('updated:', $artwork->toArray());
    
            return response()->json([
                'message' => 'Successful.',
                'data' => $artwork
            ], 200);
    
        } catch (\Throwable $th) {
            Log::error('Update failed:', ['error' => $th->getMessage()]);
            
            return response()->json([
                'message' => 'Unsuccessful.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
        try {
            $artwork->destroy(request()->id);
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
