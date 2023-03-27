<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //

    public function index()
    {
        $skills = Skill::all();
        return response()->json($skills);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'resume_id' => 'required|integer',
        ]);
        $skill = new Skill([
            'name' => $request->name,
            'resume_id' => $request->resume_id,
        ]);
        $skill->save();
        return response()->json([
            'message' => 'Successfully created skill!',
        ], 201);
    }
}
