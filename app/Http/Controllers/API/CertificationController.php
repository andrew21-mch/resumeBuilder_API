<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificationController extends Controller
{
    public function getUserCertifications()
    {
        $certifications = auth()->user()->certifications;
        return response()->json([
            'success' => true,
            'data' => $certifications,
        ]);
    }

    public function getResumeCertifications($id)
    {
        if(!auth()->user()->resumes->contains($id)){
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to view this resume',
            ]);
        }

        $certifications = Certification::where('resume_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $certifications,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'certification_name' => 'required|string',
            'certification_body' => 'required|string',
            'certification_date' => 'required|date',
            'certification_url' => 'required|string',
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
            $certification = new Certification(
                [
                    'name' => $request->certification_name,
                    'organization' => $request->certification_body,
                    'issue_date' => $request->certification_date,
                    'expiration_date' => $request->certification_date,
                    'description' => $request->certification_url,
                    'resume_id' => $request->resume_id,
                    'user_id' => auth()->user()->id,
                ]
            );
            $certification->save();

            return response()->json([
                'success' => true,
                'message' => 'Certification created successfully!',
                'data' => $certification,
            ]);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => 'Certification creation failed!',
            ]);
        }
    }
}
