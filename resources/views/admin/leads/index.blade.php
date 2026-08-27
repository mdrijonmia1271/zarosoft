@extends('admin.layouts.app')

@section('title', 'Lead Management (Mini CRM)')
@section('header', 'Inbound Project Inquiries & Leads')

@section('content')
<div class="space-y-6">
    
    <!-- Status Filter Tabs & Search -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <!-- Status Tabs -->
        <div class="flex flex-wrap items-center gap-1.5 bg-white dark:bg-slate-900 p-1.5 rounded-2xl border border-slate-200 dark:border-slate-800">
            <a href="{{ route('admin.leads.index') }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ empty($status) ? 'bg-indigo-600 text-white' : 'text-slate-600 dark:text-slate-400 hover:text-white' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'new']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $status === 'new' ? 'bg-emerald-600 text-white' : 'text-slate-600 dark:text-slate-400 hover:text-white' }}">
                New ({{ $counts['new'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'contacted']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $status === 'contacted' ? 'bg-blue-600 text-white' : 'text-slate-600 dark:text-slate-400 hover:text-white' }}">
                Contacted ({{ $counts['contacted'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'discussion']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $status === 'discussion' ? 'bg-amber-600 text-white' : 'text-slate-600 dark:text-slate-400 hover:text-white' }}">
                Discussion ({{ $counts['discussion'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'proposal']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $status === 'proposal' ? 'bg-purple-600 text-white' : 'text-slate-600 dark:text-slate-400 hover:text-white' }}">
                Proposal ({{ $counts['proposal'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'won']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $status === 'won' ? 'bg-green-600 text-white' : 'text-slate-600 dark:text-slate-400 hover:text-white' }}">
                Won ({{ $counts['won'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'lost']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $status === 'lost' ? 'bg-rose-600 text-white' : 'text-slate-600 dark:text-slate-400 hover:text-white' }}">
                Lost ({{ $counts['lost'] }})
            </a>
        </div>

        <!-- Search Input -->
        <form action="{{ route('admin.leads.index') }}" method="GET" class="relative max-w-xs w-full">
            @if($status)
            <input type="hidden" name="status" value="{{ $status }}">
            @endif
            <input type="text" name="search" value="{{ $search }}" placeholder="Search name, company, email..." class="w-full pl-9 pr-4 py-2 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
        </form>
    </div>

    <!-- Leads Table -->
    <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 uppercase tracking-wider text-[10px]">
                    <tr>
                        <th class="py-3.5 px-6">Ticket #</th>
                        <th class="py-3.5 px-6">Client / Company</th>
                        <th class="py-3.5 px-6">Service Interest</th>
                        <th class="py-3.5 px-6">Budget</th>
                        <th class="py-3.5 px-6">Pipeline Status</th>
                        <th class="py-3.5 px-6">Received</th>
                        <th class="py-3.5 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($leads as $lead)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-4 px-6 font-mono font-bold text-indigo-400">
                            {{ $lead->ticket_number }}
                        </td>
                        <td class="py-4 px-6">
                            <p class="font-bold text-slate-900 dark:text-white">{{ $lead->name }}</p>
                            <p class="text-[11px] text-slate-500">{{ $lead->email }} {{ $lead->phone ? '• ' . $lead->phone : '' }}</p>
                            @if($lead->company)
                            <span class="inline-block mt-0.5 text-[10px] px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-400">
                                🏢 {{ $lead->company }}
                            </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 font-medium text-slate-700 dark:text-slate-300">
                            {{ $lead->service_interest }}
                        </td>
                        <td class="py-4 px-6 font-semibold text-slate-600 dark:text-slate-400">
                            {{ $lead->budget_range ?? 'Unspecified' }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $lead->status_badge }}">
                                {{ $lead->status }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-400">
                            {{ $lead->created_at->diffForHumans() }}
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="px-3.5 py-1.5 rounded-xl bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 font-bold hover:bg-indigo-100 transition-colors">
                                Review & Edit →
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-12 text-slate-400">
                            No project leads found matching current criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 dark:border-slate-800">
            {{ $leads->links() }}
        </div>
    </div>

</div>
@endsection
