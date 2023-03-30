<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function getUserExperiences()
    {
        if(!auth()->user()){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }



    }

    public function store(Request $request)
    {


    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }


}
