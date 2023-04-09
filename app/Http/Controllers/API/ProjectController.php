<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function getUserProjects()
    {
        $projects = auth()->user()->projects;
        return response()->json([
            'success' => true,
            'data' => $projects,
        ]);
    }

    public function getResumeProjects($id)
    {
        if(!auth()->user()->resumes->contains($id)){
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to view this resume',
            ]);
        }

        $project = Project::where('resume_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $project,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
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
        try {
            $project = new Project([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'live_link' => $request->live_link,
                'github_link' => $request->github_link,
                'user_id' => Auth::id(),
                'resume_id' => $request->resume_id,
            ]);
            $project->save();
            return response()->json([
                'success' => true,
                'message' => 'Successfully created project!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all(),
            ]);
        }
        try {
            $project = Project::find($id);
            $project->name = $request->name;
            $project->description = $request->description;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->live_link = $request->live_link;
            $project->github_link = $request->github_link;
            $project->user_id = auth()->user()->id;
            $project->save();
            return response()->json([
                'success' => true,
                'message' => 'Successfully updated project!',
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
        $project = Project::find($id);
        if (!$project)
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Project not found!',
                ],
                404
            );
        try {
            $project->delete();
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted project!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
