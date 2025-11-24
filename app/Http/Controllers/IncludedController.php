<?php

namespace App\Http\Controllers;

use App\Models\Included;
use Illuminate\Http\Request;

class IncludedController extends Controller
{
    // GET /api/included
    public function index(Request $request)
    {
        $query = Included::query();

        // 🔍 Search support
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // 📄 Pagination (10 per page)
        $included = $query->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'current_page' => $included->currentPage(),
            'last_page'    => $included->lastPage(),
            'per_page'     => $included->perPage(),
            'total'        => $included->total(),
            'data'         => $included->items(),
        ]);
    }

    // POST /api/included
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $included = Included::create($validated);
        return response()->json($included, 201);
    }

    // GET /api/included/{id}
    public function show($id)
    {
        $included = Included::findOrFail($id);
        return response()->json($included);
    }

    // PUT /api/included/{id}
    public function update(Request $request, $id)
    {
        $included = Included::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $included->update($validated);
        return response()->json(['message' => 'included updated successfully', 'data' => $included]);
    }

    // DELETE /api/included/{id}
    public function destroy($id)
    {
        $included = Included::find($id);
        if (!$included) {
            return response()->json(['message' => 'included not found'], 404);
        }

        $included->delete();
        return response()->json(['message' => 'included deleted successfully']);
    }
}
