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
}
