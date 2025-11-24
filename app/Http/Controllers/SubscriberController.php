<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // 📌 INDEX — Paginate 10 per page
    public function index(Request $request)
    {
        $query = Subscriber::query();

        // Optional search by name or email
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }

    // 📌 STORE
   public function store(Request $request)
        {
            // Validate
            $validated = $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email',
                'is_new' => 'nullable|boolean'
            ]);

        // Check duplicate email
        $existing = Subscriber::where('email', $request->email)->first();

        if ($existing) {
            return response()->json([
                    'message' => 'You are already our subscriber'
                ], 409); // 409 → Conflict
            }

            // Create subscriber
            $subscriber = Subscriber::create([
                'name' => $request->name,
                'email' => $request->email,
                'is_new' => true
            ]);

            return response()->json([
                'message' => 'Subscribed successfully',
                'data' => $subscriber
            ], 201);
        }


    // 📌 UPDATE
    public function update(Request $request,  Subscriber $subscriber)
    {
        $validated = $request->validate([
            'name'  => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:subscribers,email,' . $subscriber->id,
            'isnew' => 'nullable|boolean',
        ]);

        $subscriber->update($validated);

        return response()->json($subscriber, 200);
    }

    // 📌 DELETE
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return response()->json(['message' => 'Subscriber deleted successfully']);
    }

}
