<?php

namespace App\Http\Controllers;

use App\Models\VehiclesCategory;
use Illuminate\Http\Request;

class VehiclesCategoryController extends Controller
{
    // GET /api/V_cat
    public function index(Request $request)
    {
        $query = VehiclesCategory::query();

        // 🔍 Search support
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // 📄 Pagination (10 per page)
        $V_cats = $query->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'current_page' => $V_cats->currentPage(),
            'last_page'    => $V_cats->lastPage(),
            'per_page'     => $V_cats->perPage(),
            'total'        => $V_cats->total(),
            'data'         => $V_cats->items(),
        ]);
    }

    // POST /api/V_cat
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $V_cat = VehiclesCategory::create($validated);
        return response()->json($V_cat, 201);
    }

    // GET /api/V_cat/{id}
    public function show($id)
    {
        $V_cat = VehiclesCategory::findOrFail($id);
        return response()->json($V_cat);
    }

    // PUT /api/V_cat/{id}
    public function update(Request $request, $id)
    {
        $V_cat = VehiclesCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $V_cat->update($validated);
        return response()->json(['message' => 'V_cat updated successfully', 'data' => $V_cat]);
    }

    // DELETE /api/V_cat/{id}
    public function destroy($id)
    {
        $V_cat = VehiclesCategory::find($id);
        if (!$V_cat) {
            return response()->json(['message' => 'V_cat not found'], 404);
        }

        $V_cat->delete();
        return response()->json(['message' => 'V_cat deleted successfully']);
    }
}
