<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $query = ContactRequest::orderBy('created_at', 'desc');

        if ($status) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('ticket_number', 'like', "%{$search}%");
            });
        }

        $leads = $query->paginate(15)->withQueryString();
        $counts = [
            'all' => ContactRequest::count(),
            'new' => ContactRequest::where('status', 'new')->count(),
            'contacted' => ContactRequest::where('status', 'contacted')->count(),
            'discussion' => ContactRequest::where('status', 'discussion')->count(),
            'proposal' => ContactRequest::where('status', 'proposal')->count(),
            'won' => ContactRequest::where('status', 'won')->count(),
            'lost' => ContactRequest::where('status', 'lost')->count(),
        ];

        return view('admin.leads.index', compact('leads', 'status', 'search', 'counts'));
    }

    public function show(ContactRequest $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    public function updateStatus(Request $request, ContactRequest $lead)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,discussion,proposal,won,lost',
            'admin_notes' => 'nullable|string',
        ]);

        $lead->status = $validated['status'];
        if ($validated['status'] === 'contacted' && !$lead->contacted_at) {
            $lead->contacted_at = now();
        }
        if (isset($validated['admin_notes'])) {
            $lead->admin_notes = $validated['admin_notes'];
        }
        $lead->save();

        return redirect()->back()->with('success', "Lead #{$lead->ticket_number} status updated to " . ucfirst($lead->status));
    }

    public function destroy(ContactRequest $lead)
    {
        if ($lead->attachment_path && Storage::disk('public')->exists($lead->attachment_path)) {
            Storage::disk('public')->delete($lead->attachment_path);
        }

        $ticket = $lead->ticket_number;
        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success', "Lead #{$ticket} deleted successfully.");
    }
}
