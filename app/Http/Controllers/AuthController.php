<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'type_id' => $request->account_type,
                'password' => $request->password,
            ]);
    
            return response()->json([
                'message' => 'Successful.'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unsuccessful.'
            ], 500);
        }
    }

    public function login(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'email' => 'required|email|',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'Unsuccessful'
            ], 500);
        }

        $user = User::with('type')->where('email', $request->email)->first();

        if (!$user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout() {
        try {
            request()->user()->tokens()->delete();
            return response()->json([
                'message' => 'Logged out successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function user()
    {
        return request()->user()->load(['type','bids.artwork.artist','listings.category']);
    }
}
