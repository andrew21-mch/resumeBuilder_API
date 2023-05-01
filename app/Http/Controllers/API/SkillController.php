<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    //

    public function getUserSkills()
    {
        $skills = auth()->user()->skills;
        return response()->json([
            'success' => true,
            'data' => $skills,
        ]);
    }

    public function getResumeSkills($id)
    {
        if(!auth()->user()->resumes->contains($id)){
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to view this resume',
            ]);
        }

        $skills = Skill::where('resume_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $skills,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'resume_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all(),
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
            $skills = explode(',', $request->name);
            foreach ($skills as $skill) {
                $skill = new Skill([
                    'name' => $skill,
                    'resume_id' => $request->resume_id,
                    'user_id' => auth()->user()->id,
                ]);
                $skill->save();
            }
            return response()->json([
                'success' => true,
                'message' => 'Successfully created skill!',
                'data' => Skill::where('resume_id', $request->resume_id)->pluck('name', 'id'),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return response()->json([
                'success' => false,
                'message' => 'Skill not found!',
            ], 400);
        }
        if ($skill->user_id != auth()->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to delete this skill!',
            ], 400);
        }
        $skill->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted skill!',
        ], 200);
    }
}
