<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function setPassword(Request $request, $id)
    {
        $validators = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validators->errors()
            ], 400);
        }

        $user = User::find($id);


        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User account not found wit id: ' . $id
            ], 400);
        }

        if(Auth::id() != $user->id){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized access'
            ], 400);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect'
            ], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully',
            'user' => $user
        ], 200);

    }

    public function setUserLanguage(Request $request, $id)
    {
        $validators = Validator::make($request->all(), [
            'language' => 'required',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validators->errors()
            ], 400);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'user with account id: ' . $id . ' not foud',
            ]);
        }

        $user->language = $request->language;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'user lanaguare successfully set to ' . $request->language ,
        ]);

    }
}
