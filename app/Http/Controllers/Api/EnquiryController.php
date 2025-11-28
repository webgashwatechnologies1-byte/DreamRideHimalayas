<?php

namespace App\Http\Controllers\Api;






use App\Http\Controllers\Controller;
use App\Models\PackageEnquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    // LIST WITH PAGINATION (LATEST FIRST)
 public function index(Request $request)
{
    $query = PackageEnquiry::query();

    // 🔍 SEARCH (name, phone, email, message)
    if ($request->has('search') && trim($request->search) !== '') {
        $search = trim($request->search);

        $query->where(function ($q) use ($search) {
            $q->where('user_name', 'LIKE', "%{$search}%")
              ->orWhere('user_phone', 'LIKE', "%{$search}%")
              ->orWhere('user_email', 'LIKE', "%{$search}%")
              ->orWhere('message', 'LIKE', "%{$search}%")
              ->orWhere('package_id', $search); // allow searching by package id
        });
    }

    $enquiries = $query->orderBy('created_at', 'DESC')->paginate(10);

    return response()->json([
        'current_page' => $enquiries->currentPage(),
        'last_page'    => $enquiries->lastPage(),
        'per_page'     => $enquiries->perPage(),
        'total'        => $enquiries->total(),
        'data'         => $enquiries->items(),
    ]);
}

    // CREATE
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'date' => 'nullable|string',
            'user_name' => 'required|string|max:255',
            'user_phone' => 'required|string|max:20',
            'user_email' => 'nullable|email',
            'no_of_riders' => 'required|integer|min:1',
            'services' => 'nullable|array',
            'message' => 'nullable|string'
        ]);

        $enquiry = PackageEnquiry::create($data);

        return response()->json([
            'message' => 'Enquiry created successfully',
            'data' => $enquiry
        ]);
    }

    // SHOW SINGLE
    public function show(PackageEnquiry $enquiry)
    {
        return $enquiry;
    }

    // UPDATE
  public function update(Request $request, PackageEnquiry $enquiry)
        {
            $data = $request->validate([
                'date'         => 'nullable|string',  // FIXED
                'user_name'    => 'sometimes|string|max:255',
                'user_phone'   => 'sometimes|string|max:20',
                'user_email'   => 'nullable|email',
                'no_of_riders' => 'sometimes|integer|min:1',
                'services'     => 'nullable|array',
                'message'      => 'nullable|string'
            ]);

            $enquiry->update($data);

            return response()->json([
                'message' => 'Enquiry updated',
                'data' => $enquiry
            ]);
        }

    // DELETE
    public function destroy(PackageEnquiry $enquiry)
    {
        $enquiry->delete();

        return response()->json([
            'message' => 'Enquiry deleted'
        ]);
    }
}

