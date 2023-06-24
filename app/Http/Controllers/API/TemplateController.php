<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    public function getTemplate($id)
    {
        $template = Template::find($id);
        return response()->json([
            'success' => true,
            'data' => $template
        ]);
    }

    public function getTemplates()
    {
        $templates = Template::all();
        return response()->json([
            'success' => true,
            'data' => $templates
        ]);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }
        try {
            $template = new Template();
            $template->name = $request->name;
            $template->description = $request->description;
            $template->content = $request->content;
            $template->save();
            return response()->json([
                'success' => true,
                'message' => 'Successfully created template!',
                'template' => $template
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }

        // store the image to the serve

        try {
            $template = Template::find($id);
            $template->name = $request->name;
            $template->description = $request->description;
            $template->content = $request->content;
            $template->image_url = $request->image ?? '';

            $template->save();
            return response()->json([
                'success' => true,
                'message' => 'Successfully updated template!',
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
        try {
            $template = Template::with('resumes')->find($id);
            try {
                $template->resumes()->delete();
                $template->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Successfully deleted template!',
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    }
}
