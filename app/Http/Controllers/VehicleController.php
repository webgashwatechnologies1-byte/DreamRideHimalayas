<?php

namespace App\Http\Controllers;
use App\Models\Vehicles;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // GET /vehicles
   // GET /api/vehicles
public function index(Request $request)
{
    $query = Vehicles::query();

    // 🔍 Optional search filter
    if ($search = $request->input('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('rc', 'like', "%{$search}%")
              ->orWhere('model', 'like', "%{$search}%")
              ->orWhere('number', 'like', "%{$search}%");
        });
    }

    // 🔢 Pagination (default 10 per page)
    $vehicles = $query->orderBy('id', 'desc')->paginate(10);

    // ✅ Return paginated JSON
    return response()->json($vehicles);
}


    // POST /vehicles
    public function store(Request $request)
        {
            try {
                $validated = $request->validate([
                    'name' => 'required|string|max:255',
                    'images' => 'required|array|min:1',
                    'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
                    'rc' => 'nullable|string|unique:vehicles,rc',
                    'model' => 'required|string|max:255',
                    'number' => 'required|string|unique:vehicles,number',
                    'v_cat_id' => 'required|exists:v_cat,id',
                    'status' => 'required|string'
                ]);
        
                $imagePaths = [];
        
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        // Store the image in the public disk
                        $path = $image->store('vehicles', 'public');
        
                        // Store only relative storage path
                        $imagePaths[] = 'storage/' . $path;
                    }
                }
        
                $validated['images'] = $imagePaths;
        
                $vehicle = Vehicles::create($validated);
        
                return response()->json([
                    'status' => true,
                    'message' => 'Vehicle added successfully!',
                    'data' => $vehicle
                ], 201);
        
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed.',
                    'errors' => $e->errors()
                ], 422);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Server error. ' . $e->getMessage()
                ], 500);
            }
        }
    
    

    // GET /vehicles/{id}
    public function show($id)
    {
        $vehicle = Vehicles::findOrFail($id);
        return response()->json($vehicle);
    }

    // PUT/PATCH /vehicles/{id}
    public function update(Request $request, $id)
{
    $vehicle = Vehicles::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'number' => 'required|string',
        'rc' => 'nullable|string',
        'status' => 'required|string',
        'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        'existing_images.*' => 'string|nullable',
        'deleted_images.*' => 'string|nullable',
    ]);

    $existingImages = $request->existing_images ?? [];
    $deletedImages = $request->deleted_images ?? [];
    $uploadedImages = [];

    // delete old files removed by user
    foreach ($deletedImages as $img) {
        $path = public_path($img);
        if (file_exists($path)) @unlink($path);
    }

    // upload new ones
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('vehicles', 'public');
            $uploadedImages[] = 'storage/' . $path;
        }
    }

    $finalImages = array_merge($existingImages, $uploadedImages);

    // move main image to index 0
    $mainIndex = (int) $request->main_image_index ?? 0;
    if (isset($finalImages[$mainIndex])) {
        $mainImage = $finalImages[$mainIndex];
        unset($finalImages[$mainIndex]);
        array_unshift($finalImages, $mainImage);
    }

    $vehicle->update([
        'name' => $validated['name'],
        'model' => $validated['model'],
        'number' => $validated['number'],
        'rc' => $validated['rc'] ?? $vehicle->rc,
        'status' => $validated['status'],
        'images' => $finalImages,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Vehicle updated successfully!',
        'data' => $vehicle
    ]);
}

    
    

    // DELETE /vehicles/{id}
public function destroy($id)
{
    try {
        $vehicle = Vehicles::findOrFail($id);

        // ✅ Delete associated images from /public/storage
        if (is_array($vehicle->images) && !empty($vehicle->images)) {
            foreach ($vehicle->images as $imagePath) {
                $absolutePath = public_path($imagePath);

                if (file_exists($absolutePath)) {
                    @unlink($absolutePath); // delete file safely
                }
            }
        }

        // ✅ Delete record from DB
        $vehicle->delete();

        return response()->json([
            'status' => true,
            'message' => 'Vehicle and associated images deleted successfully!',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to delete vehicle: ' . $e->getMessage(),
        ], 500);
    }
}


    public function verify(Request $request)
    {
        $vehicleNumber = strtoupper(trim($request->json('number')));
    
        // 1️⃣ Validate vehicle number
        if (!preg_match('/^[A-Z]{2}\d{1,2}[A-Z]{1,2}\d{3,4}$/', $vehicleNumber)) {
            return response()->json(['error' => 'Invalid vehicle number format'], 400);
        }
    
        $prefix = substr($vehicleNumber, 0, -4);
        $suffix = substr($vehicleNumber, -4);
    
        $homeUrl = 'https://parivahan.gov.in/rcdlstatus/';
        $postUrl = 'https://parivahan.gov.in/rcdlstatus/vahan/rcDlHome.xhtml';
    
        // Temporary file for storing cookies
        $cookieFile = storage_path('app/cookies.txt');
    
        // Step 1: Fetch homepage to get cookies + ViewState
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $homeUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_COOKIEJAR => $cookieFile,
            CURLOPT_COOKIEFILE => $cookieFile,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => [
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language: en-US,en;q=0.9',
            ],
        ]);
        $homeResponse = curl_exec($ch);
    
        if (!$homeResponse) {
            curl_close($ch);
            return response()->json(['error' => 'Failed to load homepage'], 500);
        }
    
        // Extract javax.faces.ViewState value
        preg_match('/<input[^>]*name="javax\.faces\.ViewState"[^>]*value="([^"]+)"/i', $homeResponse, $matches);
        $viewState = $matches[1] ?? null;
    
        if (!$viewState) {
            curl_close($ch);
            return response()->json([
                'error' => 'Unable to fetch ViewState from Parivahan',
                'debug_html_snippet' => substr($homeResponse, 0, 500) // For debugging
            ], 500);
        }
    
        // Step 2: Prepare POST payload
        $fields = [
            'javax.faces.partial.ajax' => 'true',
            'javax.faces.source' => 'form_rcdl:j_idt32',
            'javax.faces.partial.execute' => '@all',
            'javax.faces.partial.render' => 'form_rcdl:pnl_show form_rcdl:pg_show form_rcdl:rcdl_pnl',
            'form_rcdl:j_idt32' => 'form_rcdl:j_idt32',
            'form_rcdl' => 'form_rcdl',
            'form_rcdl:tf_reg_no1' => $prefix,
            'form_rcdl:tf_reg_no2' => $suffix,
            'javax.faces.ViewState' => $viewState,
        ];
    
        // Step 3: Submit POST request
        curl_setopt_array($ch, [
            CURLOPT_URL => $postUrl,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($fields),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_COOKIEJAR => $cookieFile,
            CURLOPT_COOKIEFILE => $cookieFile,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded',
                'Faces-Request: partial/ajax',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ],
        ]);
    
        $response = curl_exec($ch);
        curl_close($ch);
    
        if (!$response) {
            return response()->json(['error' => 'Failed to fetch vehicle data from Parivahan'], 500);
        }
    
        // Step 4: Clean response
        $cleanText = strip_tags($response);
        $cleanText = preg_replace('/\s+/', ' ', $cleanText);
    
        return response()->json([
            'vehicle_number' => $vehicleNumber,
            'data' => $cleanText
        ]);
    }
    
    


}
