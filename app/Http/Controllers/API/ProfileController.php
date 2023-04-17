<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public static function getProfile(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;

        return response()->json([
            'profile' => $profile,
        ], 200);
    }

    public static function storeProfile(Request $request)
    {
        $profile = $request->user()->profile;
        if($profile) {
            return response()->json([
                'message' => 'profile already exists, use update instead',
            ], 403);
        }

        $user = $request->user();
        $profile = $user->profile()->create($request->all());

        return response()->json([
            'profile' => $profile,
        ], 201);
    }

    public static function updateProfile(Request $request, $id)
    {
        $user = $request->user();
        if(!$user) {
            return response()->json([
                'message' => 'user not found, make sure you are logged in',
            ], 403);
        }

        if(!$user->profile) {
            return response()->json([
                'message' => 'profile not found, make sure you have a profile',
            ], 403);
        }

        if($user->profile->id != $id) {
            return response()->json([
                'message' => 'unauthorized, you can only update your own profile'
            ], 403);
        }

        $profile = $user->profile()->find($id);

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $profile->update($request->all());
        if($request->email){
            $user->email = $request->email;
            $user->save();
        }

        return response()->json([
            'profile' => $profile,
        ], 200);
    }

    public function destroy($id){
        $profile = Profile::find($id);
        if(!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }
        $profile->delete();

        return response()->json([
            'message' => 'Profile deleted successfully',
        ], 200);
    }
}
