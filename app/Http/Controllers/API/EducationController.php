<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return response()->json($educations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'school' => 'required|string',
            'degree' => 'required|string',
            'field_of_study' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'resume_id' => 'required|integer',
        ]);
        $education = new Education([
            'school' => $request->school,
            'degree' => $request->degree,
            'field_of_study' => $request->field_of_study,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'resume_id' => $request->resume_id,
        ]);
        $education->save();
        return response()->json([
            'message' => 'Successfully created education!',
        ], 201);
    }

    public function show($id)
    {
        $education = Education::find($id);
        return response()->json($education);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'school' => 'required|string',
            'degree' => 'required|string',
            'field_of_study' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'resume_id' => 'required|integer',
        ]);
        $education = Education::find($id);
        $education->update($request->all());
        return response()->json([
            'message' => 'Successfully updated education!',
        ], 201);
    }

    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        return response()->json([
            'message' => 'Successfully deleted education!',
        ], 201);
    }
}
