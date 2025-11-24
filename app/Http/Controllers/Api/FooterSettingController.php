<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FooterSettingController extends Controller
{
    // GET /api/footer
    public function show()
    {
        $footer = FooterSetting::single();
        if (!$footer) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return response()->json($footer);
    }

    // PUT /api/footer (update partial)
    public function update(Request $request)
    {
        $footer = FooterSetting::single();
        if (!$footer) return response()->json(['message'=>'Not found'], 404);

        $data = $request->only(['about','services','gallery','newsletter','bottom']);
        // Validate structure lightly:
        $rules = [
            'about' => 'nullable|array',
            'about.logo' => 'nullable|string',
            'about.description' => 'nullable|string',
            'about.contacts' => 'nullable|array',
            'services' => 'nullable|array',
            'gallery' => 'nullable|array|max:6',
            'newsletter' => 'nullable|array',
            'bottom' => 'nullable|array',
        ];

        $v = Validator::make($data, $rules);
        if ($v->fails()) return response()->json(['errors'=>$v->errors()], 422);

        // enforce gallery max 6
        if (isset($data['gallery']) && count($data['gallery']) > 6) {
            return response()->json(['message' => 'Gallery can contain a maximum of 6 images'], 422);
        }

        // Merge update keys only
        foreach ($data as $key => $val) {
            if (is_null($val)) continue;
            $footer->$key = $val;
        }
        $footer->save();

        return response()->json($footer);
    }

    // POST /api/footer/upload-image (for gallery or logo) -> returns path
   public function uploadImage(Request $request)
    {
        $type = $request->input('type', 'gallery'); // 'gallery' or 'logo'
        $file = $request->file('file');

        if (!$file) {
            return response()->json(['message' => 'No file uploaded'], 422);
        }

        // Validate
        $v = Validator::make($request->all(), [
            'file' => 'required|image|max:5120'
        ]);
        if ($v->fails()) return response()->json(['errors' => $v->errors()], 422);

        // Location: public/footer/
        $destPath = public_path('footer');
        if (!file_exists($destPath)) {
            mkdir($destPath, 0777, true);
        }

        // Create unique filename
        $filename = time() . "_" . $file->getClientOriginalName();

        // Move file (PHP native)
        $file->move($destPath, $filename);

        // URL to return
        $url = "/footer/" . $filename;

        // Save to DB
        $footer = FooterSetting::single();

        if ($type === 'gallery') {
            $gallery = $footer->gallery ?? [];

            if (count($gallery) >= 6) {
                // delete the moved file
                unlink($destPath . "/" . $filename);
                return response()->json(['message' => 'Maximum 6 images allowed in gallery'], 422);
            }

            $gallery[] = "footer/" . $filename; // stored path
            $footer->gallery = $gallery;
            $footer->save();
        }

        if ($type === 'logo') {
            $footer->about = array_merge($footer->about ?? [], [
                'logo' => "footer/" . $filename
            ]);
            $footer->save();
        }

        return response()->json([
            'url' => $url,
            'path' => "footer/" . $filename
        ]);
    }


    // DELETE /api/footer/gallery/{index}  -> remove gallery image by index
   public function deleteGalleryImage($index)
    {
        $footer = FooterSetting::single();
        if (!$footer) return response()->json(['message' => 'Not found'], 404);

        $gallery = $footer->gallery ?? [];

        if (!isset($gallery[$index])) {
            return response()->json(['message' => 'Not found'], 404);
        }

        // File path
        $filePath = public_path($gallery[$index]);

        // Delete file (PHP native)
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Remove from array
        array_splice($gallery, $index, 1);
        $footer->gallery = $gallery;
        $footer->save();

        return response()->json(['message' => 'deleted']);
    }

}
