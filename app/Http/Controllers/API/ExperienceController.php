<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $experiences = auth()->user()->experiences()->get();
        return response()->json([
            'success' => true,
            'data' => $experiences,
        ]);

    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string',
            'company' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'resume_id' => 'required|integer',
        ]);

        if($validators->fails()){
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }

        try
        {
            $experience = new Experience([
                'title' => $request->title,
                'company' => $request->company,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'resume_id' => $request->resume_id,
                'user_id' => Auth::id(),
            ]);

            $experience->save();

            return response()->json([
                'success' => true,
                'message' => 'Experience created successfully',
                'data' => $experience,
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

    public function show($id)
    {
        $experience = Experience::find($id);
        if(!$experience){
            return response()->json([
                'success' => false,
                'message' => 'Experience not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $experience,
        ]);

    }

    public function update(Request $request, $id)
    {
        $experience = Experience::find($id);
        if(!$experience){
            return response()->json([
                'success' => false,
                'message' => 'Experience not found',
            ]);
        }

        $validators = Validator::make($request->all(), [
            'title' => 'required|string',
            'company' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'resume_id' => 'required|integer',
        ]);

        if($validators->fails()){
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }

        $resume = Resume::where('id', $request->resume_id)->first();
        if(!$resume){
            return response()->json([
                'success' => false,
                'message' => 'Resume not found!',
            ]);
        }


        try
        {
           $experience->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Experience updated successfully',
                'data' => $experience,
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

    public function destroy($id)
    {
        $experience = Experience::find($id);
        if(!$experience){
            return response()->json([
                'success' => false,
                'message' => 'Experience not found',
            ]);
        }

        try
        {
            $experience->delete();
            return response()->json([
                'success' => true,
                'message' => 'Experience deleted successfully',
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

    public function getResumeExperiences($id)
    {
        $experiences = Experience::where('resume_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $experiences,
        ]);
    }

}
