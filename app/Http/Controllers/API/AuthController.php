<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        if($validators->fails()){
            return response()->json([
                'message' => $validators->errors()->all(),
            ], 401);
        }

        try{
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->save();

            $profile = new Profile([
                'email' => $user->email,
                'first_name' => explode(' ', $user->name)[0],
                'last_name' => explode(' ', $user->name)[1],
                'user_id' => $user->id,
            ]);
            $profile->save();

        return response()->json([
            'message' => 'Successfully created user!',
            'user' => $user,
        ], 201);
    }catch(\Exception $e){
        return response()->json([
            'success' => false,
            'message' => 'an error occured '. $e->getMessage(),
        ]);
    }
    }

    public function login(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validators->fails()){
            return response()->json([
                'message' => $validators->errors()->all(),
            ], 401);
        }

        $user = User::with('profile')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $tokenResult = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function refresh()
    {
        return $this->createNewToken(Auth::refresh());
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ]);
    }

    public function payload()
    {
        return response()->json(auth()->payload());
    }
}
