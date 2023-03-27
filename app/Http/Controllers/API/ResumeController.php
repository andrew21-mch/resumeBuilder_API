<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::all();
        return response()->json($resumes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'summary' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        $resume = new Resume([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'summary' => $request->summary,
            'user_id' => $request->user_id,
        ]);
        $resume->save();
        return response()->json([
            'message' => 'Successfully created resume!',
        ], 201);
    }

    public function show($id)
    {
        $resume = Resume::find($id);
        return response()->json($resume);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'summary' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        $resume = Resume::find($id);
        $resume->update($request->all());
        return response()->json([
            'message' => 'Successfully updated resume!',
        ], 201);
    }

    public function destroy($id)
    {
        $resume = Resume::find($id);
        $resume->delete();
        return response()->json([
            'message' => 'Successfully deleted resume!',
        ], 201);
    }
}
