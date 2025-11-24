<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    // GET /api/place
    public function index(Request $request)
    {
        $query = Amenities::query();

        // 🔍 Search support
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // 📄 Pagination (10 per page)
        $amenities = $query->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'current_page' => $amenities->currentPage(),
            'last_page'    => $amenities->lastPage(),
            'per_page'     => $amenities->perPage(),
            'total'        => $amenities->total(),
            'data'         => $amenities->items(),
        ]);
    }

    // POST /Amenities/place
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $amenities = Amenities::create($validated);
        return response()->json($amenities, 201);
    }

    // GET /api/Amenities/{id}
    public function show($id)
    {
        $amenities = Amenities::findOrFail($id);
        return response()->json($amenities);
    }

    // PUT /api/Amenities/{id}
    public function update(Request $request, $id)
    {
        $amenities = Amenities::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $amenities->update($validated);
        return response()->json(['message' => 'Amenities updated successfully', 'data' => $amenities]);
    }

    // DELETE /api/Amenities/{id}
    public function destroy($id)
    {
        $amenities = Amenities::find($id);
        if (!$amenities) {
            return response()->json(['message' => 'Amenities not found'], 404);
        }

        $amenities->delete();
        return response()->json(['message' => 'Amenities deleted successfully']);
    }
}
