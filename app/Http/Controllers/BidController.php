<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Bid;
use App\Models\BidMethod;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Bid::with([
            'artwork.artist',
            'collection:id,name',
            'method:id,name',
            'bidder',
        ])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        try {
            Bid::create([
                'artwork_id' => $request->artwork_id,
                'collection_id' => $request->collection_id,
                'bid_method_id' => 3,
                'bidder_id' => $request->user_id,
                'bid_amount' => $request->bid_amount,
            ]);

            return response()->json([
                'message' => 'Successful.'
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bid $bid)
    {
        try {
            $bid->update($request->all());
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
    public function destroy(Bid $bid)
    {
        try {
            $bid->destroy(request()->id);
            
            return response()->json([
                'message' => 'Successful.'
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ],500);
        }
    }
}
