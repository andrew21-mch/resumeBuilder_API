<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Validator;

class ResumeController extends Controller
{
    public function getUserResume()
    {
        $resume = Resume::with('user', 'experiences', 'skills', 'projects', 'educations')->where('user_id', auth()->user()->id)->get();
        return response()->json($resume);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'title' => 'required',
            'summary' => 'required',
            'template_id' => 'required',
        ]);

        if($validators->fails()){
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }

        try {
            $resume = new Resume();
            $resume->title = $request->title;
            $resume->summary = $request->summary;
            $resume->template_id = $request->template_id;
            $resume->user_id = auth()->user()->id;

            $resume->save();
            return response()->json([
                'success' => true,
                'message' => 'Successfully created resume!',
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
        $resume = Resume::with('user', 'experiences', 'educations', 'skills', 'projects')->find($id);
        return response()->json($resume);
    }

    public function update(Request $request, $id)
    {
        $validators = Validator::make($request->all(),[
            'title' => 'required',
            'summery' => 'required',
            'template_id' => 'required',
        ]);

        if($validators->fails()){
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }
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
