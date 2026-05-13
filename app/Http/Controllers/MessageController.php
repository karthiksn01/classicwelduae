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
            'type' => 'nullable|string|in:contact,feedback,quote',
            'rating' => 'nullable|integer|min:1|max:5'
        ]);

        $message = Message::create($request->all());
        \Illuminate\Support\Facades\Log::info('Message saved with ID: ' . $message->id);

        return response()->json([
            'message' => 'Message sent successfully!',
            'data' => $message
        ], 201);
    }

    // Public: Store Quote Request (RFQ)
    public function storeQuote(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Quote request received', $request->all());
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'customer_name' => 'nullable|string',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'nullable|string'
        ]);

        $user = $request->user();
        $items = $request->items;

        // Save to messages table so admin can see it in dashboard
        $summary = "Quote Request for:\n";
        foreach($items as $item) {
            $summary .= "- {$item['name']} (Qty: {$item['quantity']})\n";
        }

        Message::create([
            'name' => $user ? $user->name : ($request->customer_name ?? 'Guest'),
            'email' => $user ? $user->email : ($request->customer_email ?? 'guest@example.com'),
            'phone' => $user ? $user->phone : ($request->customer_phone ?? ''),
            'subject' => 'Product Quote Request',
            'message' => $summary,
            'type' => 'quote'
        ]);

        $customerInfo = [
            'name' => $user ? $user->name : ($request->customer_name ?? 'Guest'),
            'email' => $user ? $user->email : ($request->customer_email ?? 'guest@example.com'),
            'phone' => $user ? $user->phone : ($request->customer_phone ?? 'N/A'),
        ];

        // Send Email
        try {
            \Illuminate\Support\Facades\Mail::to(['classicwelduae@gmail.com', 'santhoshmangadan@gmail.com'])->send(new \App\Mail\QuoteRequestMail($items, $customerInfo));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Mail sending failed: ' . $e->getMessage());
            // We still return success because it's saved in DB
        }

        return response()->json([
            'message' => 'Your request has been sent! Our team will contact you soon.'
        ]);
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
