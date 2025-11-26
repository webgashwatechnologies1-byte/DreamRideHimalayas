<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    // GET /api/place
    public function index(Request $request)
    {
        $query = Places::query();

        // 🔍 Search support
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // 📄 Pagination (10 per page)
        $places = $query->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'current_page' => $places->currentPage(),
            'last_page'    => $places->lastPage(),
            'per_page'     => $places->perPage(),
            'total'        => $places->total(),
            'data'         => $places->items(),
        ]);
    }
    // get all
public function getAll()
    {
         $places = Places::orderBy('id', 'desc')->get();

    return response()->json([
        'status' => true,
        'data' => $places
    ]);
    }

 

    // POST /api/place
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $place = Places::create($validated);
        return response()->json($place, 201);
    }

    // GET /api/place/{id}
   public function show($id)
        {
            $place = Places::with([
                'tours' => function ($q) {
                    $q->withCount('packages');   // Add package count for each tour
                }
            ])->findOrFail($id);

            return response()->json($place);
        }


    // PUT /api/place/{id}
    public function update(Request $request, $id)
    {
        $place = Places::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $place->update($validated);
        return response()->json(['message' => 'Place updated successfully', 'data' => $place]);
    }

    // DELETE /api/place/{id}
    public function destroy($id)
    {
        $place = Places::find($id);
        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }

        $place->delete();
        return response()->json(['message' => 'Place deleted successfully']);
    }
}
