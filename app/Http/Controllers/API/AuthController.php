<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\APIHelpers;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            $response = APIHelpers::createApiResponse(true, 401, "Bad Credentials", null);
            return response()->json($response);
        }

        $token = $user->createToken('appToken')->plainTextToken;

        $response = APIHelpers::createApiResponse(false, 200, "Logged In", ['token' => $token]);

        return response()->json($response, 200);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        $response = APIHelpers::createApiResponse(false, 200, "Logged Out", null);

        return response()->json($response, 200);
    }
}
