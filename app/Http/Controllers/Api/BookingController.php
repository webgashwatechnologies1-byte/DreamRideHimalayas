<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\PackageBooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // LIST WITH PAGINATION
public function index(Request $request)
{
    $query = PackageBooking::query();

    // 🔍 SEARCH for name, phone, email, message, package_id
    if ($request->has('search') && trim($request->search) !== '') {
        $search = trim($request->search);

        $query->where(function ($q) use ($search) {
            $q->where('user_name', 'LIKE', "%{$search}%")
              ->orWhere('user_phone', 'LIKE', "%{$search}%")
              ->orWhere('user_email', 'LIKE', "%{$search}%")
              ->orWhere('message', 'LIKE', "%{$search}%")
              ->orWhere('package_id', $search) // search by package id
              ->orWhere('amount', $search); // search by package id
        });
    }

    $packages = $query->orderBy('created_at', 'DESC')->paginate(10);

    return response()->json([
        'current_page' => $packages->currentPage(),
        'last_page'    => $packages->lastPage(),
        'per_page'     => $packages->perPage(),
        'total'        => $packages->total(),
        'data'         => $packages->items(),
    ]);
}

    // CREATE
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'date' => 'nullable|date',

            'user_name' => 'required|string|max:255',
            'user_phone' => 'required|string|max:20',
            'user_email' => 'nullable|email',

            'no_of_riders' => 'required|integer|min:1',
            'services' => 'nullable|array',

            'amount' => 'required|integer|min:0',
            'payment_status' => 'required|string',
            'message' => 'nullable|string'
        ]);

        $booking = PackageBooking::create($data);

        return response()->json([
            'message' => 'Booking created successfully',
            'data' => $booking
        ]);
    }

    // SHOW
    public function show(PackageBooking $booking)
    {
        return $booking;
    }

    // UPDATE
    public function update(Request $request, PackageBooking $booking)
    {
        $data = $request->validate([
            'date' => 'nullable|date',

            'user_name' => 'sometimes|string|max:255',
            'user_phone' => 'sometimes|string|max:20',
            'user_email' => 'nullable|email',

            'no_of_riders' => 'sometimes|integer|min:1',
            'services' => 'nullable|array',

            'amount' => 'integer|min:0',
            'payment_status' => 'string',
            'message' => 'nullable|string'
        ]);

        $booking->update($data);

        return response()->json([
            'message' => 'Booking updated',
            'data' => $booking
        ]);
    }

    // DELETE
    public function destroy(PackageBooking $booking)
    {
        $booking->delete();

        return response()->json([
            'message' => 'Booking deleted'
        ]);
    }
}
