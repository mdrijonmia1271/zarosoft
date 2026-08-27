<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        $preselectedService = $request->query('service');

        return view('contact.index', compact('services', 'preselectedService'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'company' => 'nullable|string|max:150',
            'service_interest' => 'required|string|max:100',
            'budget_range' => 'nullable|string|max:50',
            'message' => 'required|string|min:10|max:5000',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg,zip|max:10240', // 10MB
        ]);

        $attachmentPath = null;
        $attachmentOriginalName = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $attachmentOriginalName = $file->getClientOriginalName();
            $attachmentPath = $file->store('attachments', 'public');
        }

        $lead = ContactRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service_interest' => $validated['service_interest'],
            'budget_range' => $validated['budget_range'] ?? null,
            'message' => $validated['message'],
            'attachment_path' => $attachmentPath,
            'attachment_original_name' => $attachmentOriginalName,
            'ip_address' => $request->ip(),
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', "Thank you! Your project inquiry has been received (Reference: {$lead->ticket_number}). Our team will review and contact you within 24 hours.");
    }
}
