<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogEditorUploadController extends Controller
{
    /* -----------------------------------------
     * UPLOAD IMAGE (TinyMCE)
     * -----------------------------------------*/
    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['message' => 'No file uploaded'], 422);
        }

        // Save file to: storage/app/public/blogEditor/image
        $path = $request->file('file')->store('blogEditor/image', 'public');

        return response()->json([
            'location' => 'storage/' . $path
        ]);
    }

    /* -----------------------------------------
     * UPLOAD VIDEO (TinyMCE)
     * -----------------------------------------*/
    public function uploadVideo(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['message' => 'No file uploaded'], 422);
        }

        $path = $request->file('file')->store('blogEditor/video', 'public');

        return response()->json([
            'location' => 'storage/' . $path
        ]);
    }

    /* -----------------------------------------
     * DELETE FILE (When removed from TinyMCE)
     * -----------------------------------------*/
    public function delete(Request $request)
    {
        $request->validate([
            'path' => 'required|string'
        ]);

        /*
           Received example:
           storage/blogEditor/image/filename.png

           Convert to real physical path:
           public_path('storage/blogEditor/image/filename.png')
        */

        $fullPath = public_path($request->path);

        if (file_exists($fullPath)) {
            unlink($fullPath);

            return response()->json(['status' => true]);
        }

        return response()->json([
            'status' => false,
            'message' => 'File not found on server'
        ], 404);
    }
}
