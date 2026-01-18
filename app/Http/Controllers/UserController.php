<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request);
        try {
            $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'type_id' => $request->account_type,
                'password' => $request->password,
            ]);

            return response()->json([
                'message' => 'Successful.',
                // 'token' => $user->createToken('SomeTokenName')->plainTextToken, 
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unsuccessful.'
            ],500);
        }
    }

    public function login(Request $request) {
        
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|',
        //     'password' => 'required',
        // ]);

        // $validation = Validator::make($request->all(),[
        //     'name' => 'required',
        //     'email' => 'required|email|',
        //     'password' => 'required',
        // ]);

        // if ($validation->fails()) {
        //     return response()->json([
        //         'message' => 'Unsuccessful'
        //     ],500);
        // }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
