<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        $project = new Project([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => $request->user_id,
        ]);
        $project->save();
        return response()->json([
            'message' => 'Successfully created project!',
        ], 201);
    }

    public function show($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        $project = Project::find($id);
        $project->update($request->all());
        return response()->json([
            'message' => 'Successfully updated project!',
        ], 201);
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return response()->json([
            'message' => 'Successfully deleted project!',
        ], 201);
    }
}
