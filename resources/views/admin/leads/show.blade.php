@extends('admin.layouts.app')

@section('title', 'Lead Details — #' . $lead->ticket_number)
@section('header', 'Lead Details & Pipeline Status')

@section('content')
<div class="max-w-5xl space-y-6">
    
    <!-- Top Action Bar -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.leads.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-white">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to All Leads</span>
        </a>

        <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lead record?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1.5 rounded-xl bg-rose-500/10 text-rose-400 border border-rose-500/20 text-xs font-bold hover:bg-rose-500/20 transition-colors">
                Delete Lead
            </button>
        </form>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Inquiry Content -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Lead Profile Card -->
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
                <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-4">
                    <div>
                        <span class="text-[10px] font-mono uppercase tracking-wider text-indigo-400 font-bold">Ticket {{ $lead->ticket_number }}</span>
                        <h2 class="text-xl font-extrabold text-slate-900 dark:text-white mt-0.5">{{ $lead->name }}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $lead->status_badge }}">
                        {{ $lead->status }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <p class="text-slate-400 font-semibold">Email:</p>
                        <a href="mailto:{{ $lead->email }}" class="font-bold text-indigo-500 hover:underline">{{ $lead->email }}</a>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold">Phone:</p>
                        <p class="font-bold text-slate-900 dark:text-white">{{ $lead->phone ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold">Company:</p>
                        <p class="font-bold text-slate-900 dark:text-white">{{ $lead->company ?? 'Individual' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold">Service Requested:</p>
                        <p class="font-bold text-indigo-400">{{ $lead->service_interest }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold">Budget Range:</p>
                        <p class="font-bold text-emerald-400">{{ $lead->budget_range ?? 'Not specified' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold">Submitted At:</p>
                        <p class="font-bold text-slate-900 dark:text-white">{{ $lead->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>

                <!-- Message Box -->
                <div class="space-y-2 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Client Requirements / Message:</p>
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 text-xs text-slate-700 dark:text-slate-200 leading-relaxed whitespace-pre-line border border-slate-200 dark:border-slate-700/60">
                        {{ $lead->message }}
                    </div>
                </div>

                <!-- Attachment -->
                @if($lead->attachment_path)
                <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-lg">📎</span>
                        <div>
                            <p class="font-bold text-slate-900 dark:text-white">Uploaded RFP / Spec Document</p>
                            <p class="text-[10px] text-slate-400">{{ $lead->attachment_original_name ?? 'Specification File' }}</p>
                        </div>
                    </div>
                    <a href="{{ Storage::url($lead->attachment_path) }}" target="_blank" download class="px-3 py-1.5 rounded-xl bg-indigo-600 text-white font-bold text-xs hover:bg-indigo-500">
                        Download File ↓
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Right: Status Update & Admin Notes -->
        <div class="lg:col-span-5 space-y-6">
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
                <h3 class="text-base font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">
                    Update Pipeline Status
                </h3>

                <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Stage</label>
                        <select name="status" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs font-bold text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500">
                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>🟢 New (Unreviewed)</option>
                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>🔵 Contacted (Initial Outreach)</option>
                            <option value="discussion" {{ $lead->status === 'discussion' ? 'selected' : '' }}>🟡 Discussion / Discovery Call</option>
                            <option value="proposal" {{ $lead->status === 'proposal' ? 'selected' : '' }}>🟣 Proposal Sent</option>
                            <option value="won" {{ $lead->status === 'won' ? 'selected' : '' }}>🎉 Won / Deal Closed</option>
                            <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>🔴 Lost / Disqualified</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Internal Admin Notes (Private)</label>
                        <textarea name="admin_notes" rows="6" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500 leading-relaxed" placeholder="Add private notes about Zoom call discussions, agreed scope, quotation pricing, or next follow-up dates...">{{ $lead->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-3 px-4 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20 transition-all">
                        Save Status & Notes →
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
