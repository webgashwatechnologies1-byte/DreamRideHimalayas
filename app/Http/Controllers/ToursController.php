<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToursController extends Controller
{
    // GET /api/place
    public function index(Request $request)
    {
        $query = Tours::query();

        // 🔍 Search support
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // 📄 Pagination (10 per page)
        $tours = $query->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'current_page' => $tours->currentPage(),
            'last_page'    => $tours->lastPage(),
            'per_page'     => $tours->perPage(),
            'total'        => $tours->total(),
            'data'         => $tours->items(),
        ]);
    }
     /**
     * 🗺️ Fetch all tours belonging to a specific place
     * Route: GET /api/tours/by-place/{place_id}
     */
    // gett all tours
    public function getAll()
    {
         $tours = Tours::orderBy('id', 'desc')->get();

    return response()->json([
        'status' => true,
        'data' => $tours
    ]);
    }
 public function getByPlace($place_id)
    {
        $tours = Tours::where('place_id', $place_id)
            ->orderBy('id', 'desc')
            ->get(['id', 'name', 'place_id']); // limit columns if you want

        return response()->json([
            'status' => true,
            'data' => $tours
        ]);
    }
    // POST /api/place
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'place_id' => 'required|exists:places,id',
           
        ]);

        // 🖼️ Store image if provided
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tours', 'public');
        }

        $tour = Tours::create([
            'name'  => $validated['name'],
            'image' => $path ? 'storage/' . $path : null,
            'place_id' => $validated['place_id'],
           
        ]);

        return response()->json([
            'message' => 'Tour created successfully',
            'data' => $tour
        ], 201);
    }

    // GET /api/tour/{id}
    public function show($id)
    {
        $tour = Tours::findOrFail($id);
        return response()->json($tour);
    }

    // PUT /api/place/{id}
    public function update(Request $request, $id)
    {
        $tour = Tours::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'place_id' => 'required|exists:places,id',

        ]);

        // 🖼️ Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($tour->image && Storage::disk('public')->exists(str_replace('storage/', '', $tour->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $tour->image));
            }

            $path = $request->file('image')->store('tours', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $tour->update($validated);

        return response()->json([
            'message' => 'Tour updated successfully',
            'data' => $tour
        ]);
    }

    // DELETE /api/place/{id}
    public function destroy($id)
    {
        $tour = Tours::find($id);
        if (!$tour) {
            return response()->json(['message' => 'Tour not found'], 404);
        }

        // 🗑️ Delete image if exists
        if ($tour->image && Storage::disk('public')->exists(str_replace('storage/', '', $tour->image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $tour->image));
        }

        $tour->delete();

        return response()->json(['message' => 'Tour deleted successfully']);
    }
}
