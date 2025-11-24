<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * 🔹 Get all gallery items
     */
   public function index(Request $request)
        {
            $gallery = Gallery::orderBy('index', 'asc')
                ->orderBy('id', 'desc')
                ->paginate(12); // 12 per page

            return response()->json([
                'status' => true,
                'data'   => $gallery->items(),
                'page'   => $gallery->currentPage(),
                'totalPages' => $gallery->lastPage(),
                'total'  => $gallery->total(),
            ]);
        }


    /**
     * 🔹 Store a new gallery item
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'    => 'required|image|mimes:jpg,jpeg,png|max:4096',
            'index'    => 'nullable|integer',
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        // Store image → storage/app/public/gallery
        $path = $request->file('image')->store('gallery', 'public');

        // Create gallery record
        $gallery = Gallery::create([
            'url'      => 'storage/' . $path,
            'index'    => $request->input('index', Gallery::max('index') + 1),
            'title'    => $request->title,
            'subtitle' => $request->subtitle,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Image uploaded successfully!',
            'data'    => $gallery
        ], 201);
    }

    /**
     * 🔹 Update gallery item
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'status'  => false,
                'message' => 'Image not found'
            ], 404);
        }

        $request->validate([
            'index'    => 'nullable|integer',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        // Replace image
        if ($request->hasFile('image')) {
            if ($gallery->url && file_exists(public_path($gallery->url))) {
                @unlink(public_path($gallery->url));
            }

            $path = $request->file('image')->store('gallery', 'public');
            $gallery->url = 'storage/' . $path;
        }

        if ($request->filled('index')) {
            $gallery->index = $request->index;
        }

        if ($request->filled('title')) {
            $gallery->title = $request->title;
        }

        if ($request->filled('subtitle')) {
            $gallery->subtitle = $request->subtitle;
        }

        $gallery->save();

        return response()->json([
            'status'  => true,
            'message' => 'Gallery updated successfully!',
            'data'    => $gallery
        ]);
    }

    /**
     * 🔹 Delete gallery item
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'status'  => false,
                'message' => 'Image not found'
            ], 404);
        }

        if ($gallery->url && file_exists(public_path($gallery->url))) {
            @unlink(public_path($gallery->url));
        }

        $gallery->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Image deleted successfully!'
        ]);
    }
}
