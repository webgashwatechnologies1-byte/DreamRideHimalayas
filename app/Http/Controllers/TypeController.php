<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a paginated list of types with optional search.
     */
    public function index(Request $request)
    {
        $query = Type::query();

        // Optional search by name or color
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('color', 'LIKE', "%{$search}%");
            });
        }

        // Pagination — default 10 per page
        $types = $query->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'current_page' => $types->currentPage(),
            'last_page'    => $types->lastPage(),
            'per_page'     => $types->perPage(),
            'total'        => $types->total(),
            'data'         => $types->items(),
        ]);
    }
 public function getAll()
    {
         $types = Type::orderBy('id', 'desc')->get();

    return response()->json([
        'status' => true,
        'data' => $types
    ]);
    }
    /**
     * Store a new type.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'color' => 'nullable|string|max:20',
        ]);

        $type = Type::create($validated);

        return response()->json($type, 201);
    }

    /**
     * Display a single type.
     */
    public function show($id)
    {
        $type = Type::findOrFail($id);
        return response()->json($type);
    }

    /**
     * Update an existing type.
     */
    public function update(Request $request, $id)
    {
        $type = Type::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'sometimes|string|max:255',
            'color' => 'sometimes|string|max:20',
        ]);

        $type->update($validated);

        return response()->json($type);
    }

    /**
     * Remove a type.
     */
    public function destroy($id)
    {
        $type = Type::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $type->delete();

        return response()->json(['message' => 'Type deleted successfully']);
    }
}
