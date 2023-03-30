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
        return response()->json($template);
    }

    public function getTemplates()
    {
        $templates = Template::all();
        return response()->json($templates);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);

        if($validators->fails()){
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }

        // store the image to the server
        $image = $request->image;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.png';
        \File::put(public_path() . '/images/' . $imageName, base64_decode($image));

        try {
            $template = new Template();
            $template->name = $request->name;
            $template->description = $request->description;
            $template->preview_image = $imageName;
            $template->json_data = $request->json_data;

            $template->save();
            return response()->json([
                'success' => true,
                'message' => 'Successfully created template!',
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
            'image' => 'required|string',
        ]);

        if($validators->fails()){
            return response()->json([
                'success' => false,
                'message' => $validators->errors()->all(),
            ]);
        }

        // store the image to the server
        $image = $request->image;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.png';
        \File::put(public_path() . '/images/' . $imageName, base64_decode($image));

        try {
            $template = Template::find($id);
            $template->name = $request->name;
            $template->description = $request->description;
            $template->preview_image = $imageName;
            $template->json_data = $request->json_data;

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
            $template = Template::find($id);
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
