<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validated = $request->validate([
            'email'  =>  'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken('appToken')->plainTextToken;

        $message = [
            'message' => 'Logged In',
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($message, 200);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out'
        ]);
    }
}
