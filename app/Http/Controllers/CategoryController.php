<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(Request $request)
{
    $query = Category::with('tours');

    // 🔍 Optional Search
    if ($search = $request->query('search')) {
        $query->where('name', 'LIKE', "%{$search}%");
    }

    // 📄 Pagination (10 per page)
    $categories = $query->orderBy('id', 'desc')->paginate(10);

    // Return paginated response
    return response()->json([
        'current_page' => $categories->currentPage(),
        'last_page'    => $categories->lastPage(),
        'per_page'     => $categories->perPage(),
        'total'        => $categories->total(),
        'data'         => $categories->items(),
    ]);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
        }

        return Category::create([
            'name'  => $validated['name'],
            'image' => "storage/" . $path,
        ]);
    }

    public function show(Category $category)
    {
        return $category->load('tours');
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $category->image = "storage/" . $path;
        }
        // else{
        //     $category->image = $validated['image'];
        // }

        $category->name = $validated['name'];
        $category->save();

        return $category;
    }
    // get all
        public function getAll()
    {
         $category = Category::orderBy('id', 'desc')->get();

    return response()->json([
        'status' => true,
        'data' => $category
    ]);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
