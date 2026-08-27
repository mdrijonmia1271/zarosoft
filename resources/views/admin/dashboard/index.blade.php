@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('header', 'System Overview & Lead Command')

@section('content')
<div class="space-y-8">
    
    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="p-6 rounded-2xl bg-white dark:bg-[#0d111a] border border-slate-200 dark:border-white/10 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Leads Received</p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-white mt-1">{{ $totalLeads }}</h3>
                <p class="text-[11px] text-emerald-500 font-semibold mt-1">
                    {{ $newLeadsCount }} unreviewed leads
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-xl font-bold">
                💼
            </div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-[#0d111a] border border-slate-200 dark:border-white/10 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Active Services</p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-white mt-1">{{ $totalServices }}</h3>
                <p class="text-[11px] text-slate-400 font-semibold mt-1">10 Dev + 7 Design</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#00D2FF]/10 text-[#00D2FF] flex items-center justify-center text-xl font-bold">
                🛠️
            </div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-[#0d111a] border border-slate-200 dark:border-white/10 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Case Studies</p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-white mt-1">{{ $totalProjects }}</h3>
                <p class="text-[11px] text-[#00D2FF] font-semibold mt-1">Live in Portfolio</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-xl font-bold">
                🚀
            </div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-[#0d111a] border border-slate-200 dark:border-white/10 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Published Blogs</p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-white mt-1">{{ $totalBlogs }}</h3>
                <p class="text-[11px] text-slate-400 font-semibold mt-1">{{ $totalTestimonials }} Testimonials</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center text-xl font-bold">
                📝
            </div>
        </div>
    </div>

    <!-- Mini-CRM Pipeline Funnel Summary -->
    <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-[#0d111a] border border-slate-200 dark:border-white/10 shadow-sm space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Lead Management Pipeline (Mini CRM)</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Current distribution of project inquiries across pipeline stages.</p>
            </div>
            <a href="{{ route('admin.leads.index') }}" class="text-xs font-bold text-[#007BFF] hover:underline">
                Manage All Leads →
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 text-center">
            <a href="{{ route('admin.leads.index', ['status' => 'new']) }}" class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 hover:border-emerald-500 transition-colors">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-500">New</span>
                <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $leadsByStatus['new'] }}</p>
            </a>

            <a href="{{ route('admin.leads.index', ['status' => 'contacted']) }}" class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 hover:border-[#007BFF] transition-colors">
                <span class="text-xs font-bold uppercase tracking-wider text-[#007BFF]">Contacted</span>
                <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $leadsByStatus['contacted'] }}</p>
            </a>

            <a href="{{ route('admin.leads.index', ['status' => 'discussion']) }}" class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 hover:border-amber-500 transition-colors">
                <span class="text-xs font-bold uppercase tracking-wider text-amber-500">Discussion</span>
                <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $leadsByStatus['discussion'] }}</p>
            </a>

            <a href="{{ route('admin.leads.index', ['status' => 'proposal']) }}" class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 hover:border-[#00D2FF] transition-colors">
                <span class="text-xs font-bold uppercase tracking-wider text-[#00D2FF]">Proposal</span>
                <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $leadsByStatus['proposal'] }}</p>
            </a>

            <a href="{{ route('admin.leads.index', ['status' => 'won']) }}" class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 hover:border-green-500 transition-colors">
                <span class="text-xs font-bold uppercase tracking-wider text-green-500">Won 🎉</span>
                <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $leadsByStatus['won'] }}</p>
            </a>

            <a href="{{ route('admin.leads.index', ['status' => 'lost']) }}" class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 hover:border-rose-500 transition-colors">
                <span class="text-xs font-bold uppercase tracking-wider text-rose-500">Lost</span>
                <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $leadsByStatus['lost'] }}</p>
            </a>
        </div>
    </div>

    <!-- Recent Leads & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Recent Leads Table -->
        <div class="lg:col-span-8 p-6 sm:p-8 rounded-3xl bg-white dark:bg-[#0d111a] border border-slate-200 dark:border-white/10 shadow-sm space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Recent Inquiries</h2>
                <a href="{{ route('admin.leads.index') }}" class="text-xs font-bold text-[#007BFF] hover:underline">View All Leads →</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="text-[10px] font-bold uppercase text-slate-400 border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th class="pb-3">Client</th>
                            <th class="pb-3">Service</th>
                            <th class="pb-3">Budget</th>
                            <th class="pb-3">Status</th>
                            <th class="pb-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800/50">
                        @forelse($recentLeads as $lead)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="py-3.5 pr-4">
                                <p class="font-bold text-slate-900 dark:text-white">{{ $lead->name }}</p>
                                <p class="text-[11px] text-slate-400">{{ $lead->company ?? $lead->email }}</p>
                            </td>
                            <td class="py-3.5 pr-4 font-medium text-slate-600 dark:text-slate-300">
                                {{ $lead->service_interest }}
                            </td>
                            <td class="py-3.5 pr-4 font-mono text-slate-500">
                                {{ $lead->budget_range ?? 'N/A' }}
                            </td>
                            <td class="py-3.5 pr-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if($lead->status === 'new') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                                    @elseif($lead->status === 'contacted') bg-[#007BFF]/10 text-[#007BFF] border border-[#007BFF]/20
                                    @elseif($lead->status === 'discussion') bg-amber-500/10 text-amber-400 border border-amber-500/20
                                    @elseif($lead->status === 'proposal') bg-[#00D2FF]/10 text-[#00D2FF] border border-[#00D2FF]/20
                                    @elseif($lead->status === 'won') bg-green-500/10 text-green-400 border border-green-500/20
                                    @else bg-slate-500/10 text-slate-400 border border-slate-500/20 @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>
                            <td class="py-3.5 text-right">
                                <a href="{{ route('admin.leads.show', $lead->id) }}" class="px-3 py-1.5 rounded-lg bg-slate-100 dark:bg-slate-800 text-[#007BFF] hover:bg-[#007BFF] hover:text-white font-bold transition-colors">
                                    Details →
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400">No recent leads found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Content Actions -->
        <div class="lg:col-span-4 space-y-6">
            <div class="p-6 rounded-3xl bg-white dark:bg-[#0d111a] border border-slate-200 dark:border-white/10 shadow-sm space-y-4">
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Quick CMS Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.blogs.create') }}" class="flex items-center justify-between p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/60 hover:bg-[#007BFF]/10 hover:text-[#007BFF] text-xs font-bold transition-colors">
                        <span>✍️ Write New Blog Post</span>
                        <span>+</span>
                    </a>
                    <a href="{{ route('admin.projects.create') }}" class="flex items-center justify-between p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/60 hover:bg-[#007BFF]/10 hover:text-[#007BFF] text-xs font-bold transition-colors">
                        <span>🚀 Add Portfolio Project</span>
                        <span>+</span>
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="flex items-center justify-between p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/60 hover:bg-[#007BFF]/10 hover:text-[#007BFF] text-xs font-bold transition-colors">
                        <span>⭐ Add Client Review</span>
                        <span>+</span>
                    </a>
                    <a href="{{ route('admin.services.create') }}" class="flex items-center justify-between p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/60 hover:bg-[#007BFF]/10 hover:text-[#007BFF] text-xs font-bold transition-colors">
                        <span>🛠️ Add New Service</span>
                        <span>+</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
