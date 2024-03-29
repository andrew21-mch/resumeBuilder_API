<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function getUserEductions()
    {

        $educations = auth()->user()->educations;
        return response()->json([
            'success' => true,
            'data' => $educations,
        ]);
    }

    public function getResumeEducations($resumeId)
    {
        $educations = Education::where('resume_id', $resumeId)->get();
        return response()->json([
            'success' => true,
            'data' => $educations,
        ]);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'school' => 'required|string',
            'degree' => 'required|string',
            'field_of_study' => 'required|string',
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
        $education = new Education([
            'school' => $request->school,
            'degree' => $request->degree,
            'field_of_study' => $request->field_of_study,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'resume_id' => $request->resume_id,
            'user_id' => Auth::id(),
        ]);
        $education->save();
        return response()->json([
            'success' => true,
            'message' => 'Successfully created education!',
        ], 201);
    }

    public function show($id)
    {
        $education = Education::find($id);
        if (!$education) {
            return response()->json([
                'success' => false,
                'message' => 'no education found with id ' . $id,
            ]);
        }
        return response()->json($education);
    }

    public function update(Request $request, $id)
    {
        $validators = Validator::make($request->all(), [
            'school' => 'required|string',
            'degree' => 'required|string',
            'field_of_study' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'resume_id' => 'required|integer',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }
        $education = Education::find($id);

        if (!$education) {
            return response()->json([
                'success' => false,
                'message' => 'no education found with id ' . $id,
            ]);
        }
        try {
            $education->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Successfully updated education!',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);

        }

    }

    public function destroy($id)
    {
        $education = Education::find($id);
        if (!$education) {
            return response()->json([
                'success' => false,
                'message' => 'no educiton found with id ' . $id
            ]);
        }
        $education->delete();
        return response()->json([
            'message' => 'Successfully deleted education!',
        ], 201);
    }
}
