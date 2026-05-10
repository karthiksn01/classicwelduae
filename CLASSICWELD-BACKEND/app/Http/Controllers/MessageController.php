<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    // Public: Store message
    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Message store requested', $request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'type' => 'nullable|string|in:contact,feedback',
            'rating' => 'nullable|integer|min:1|max:5'
        ]);

        $message = Message::create($request->all());
        \Illuminate\Support\Facades\Log::info('Message saved with ID: ' . $message->id);

        return response()->json([
            'message' => 'Message sent successfully!',
            'data' => $message
        ], 201);
    }

    // Admin: List messages
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return response()->json($messages);
    }

    // Admin: Mark as read
    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_read' => true]);
        return response()->json(['message' => 'Message marked as read']);
    }

    // Admin: Delete message
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return response()->json(['message' => 'Message deleted']);
    }
}
