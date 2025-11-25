<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 📌 GET /api/contacts — List 10 per page, newest first
    public function index()
    {
        return Contact::orderBy('created_at', 'desc')->paginate(10);
    }

    // 📌 POST /api/contacts — Store a new contact
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        return response()->json([
            'message' => 'Contact submitted successfully!',
            'data' => $contact
        ], 201);
    }

    // ❌ No update needed

    // 📌 DELETE /api/contacts/{id}
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully']);
    }
    // Show single Message 
     public function show($id)
    {
        $contact = Contact::findOrFail($id);

        // Optional: mark message as read if is_new = 1
        if ($contact->is_new) {
            $contact->update(['is_new' => 0]);
        }

        return response()->json($contact);
    }
}
