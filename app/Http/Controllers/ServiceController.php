<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * 🔹 Get paginated list of services
     */
    public function index(Request $request)
    {
        $query = Services::query();

        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('price', 'LIKE', "%{$search}%");
        }

        $services = $query->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'current_page' => $services->currentPage(),
            'last_page'    => $services->lastPage(),
            'per_page'     => $services->perPage(),
            'total'        => $services->total(),
            'data'         => $services->items(),
        ]);
    }

    /**
     * 🔹 Create a new service with single image upload
     */
     public function getAll()
    {
         $services = Services::orderBy('id', 'desc')->get();

    return response()->json([
        'status' => true,
        'data' => $services
    ]);
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
                'price'       => 'required|numeric',
                'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // 🖼️ Store the image in storage/app/public/services
            $path = $request->file('image')->store('services', 'public');

            // Save the service with image path
            $service = Services::create([
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? '',
                'price'       => $validated['price'],
                'image'       => 'storage/' . $path,
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Service added successfully!',
                'data'    => $service
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed.',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Server error. ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * 🔹 Show single service details
     */
    public function show($id)
    {
        $service = Services::findOrFail($id);
        return response()->json($service);
    }

    /**
     * 🔹 Update service (replace image if new one uploaded)
     */
    public function update(Request $request, $id)
    {
        try {
            $service = Services::findOrFail($id);

            $validated = $request->validate([
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
                'price'       => 'required|numeric',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Delete old image if new one uploaded
            if ($request->hasFile('image')) {
                if ($service->image && file_exists(public_path($service->image))) {
                    @unlink(public_path($service->image));
                }

                $path = $request->file('image')->store('services', 'public');
                $validated['image'] = 'storage/' . $path;
            } else {
                // Keep old image
                $validated['image'] = $service->image;
            }

            $service->update($validated);

            return response()->json([
                'status'  => true,
                'message' => 'Service updated successfully!',
                'data'    => $service
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed.',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Server error. ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * 🔹 Delete service and its image
     */
    public function destroy($id)
    {
        try {
            $service = Services::find($id);
            if (!$service)
                return response()->json(['message' => 'Service not found'], 404);

            // 🗑️ Delete image file
            if ($service->image && file_exists(public_path($service->image))) {
                @unlink(public_path($service->image));
            }

            $service->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Service deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Server error. ' . $e->getMessage()
            ], 500);
        }
    }
}
