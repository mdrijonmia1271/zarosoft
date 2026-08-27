@extends('admin.layouts.app')

@section('title', 'Manage Testimonials')
@section('header', 'Client Reviews & Testimonials')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Manage client reviews displayed on homepage and about page.</p>
        <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20 transition-all flex items-center gap-1.5">
            <span>+ Add Review</span>
        </a>
    </div>

    <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 uppercase tracking-wider text-[10px]">
                    <tr>
                        <th class="py-3.5 px-6">Client</th>
                        <th class="py-3.5 px-6">Company / Location</th>
                        <th class="py-3.5 px-6">Rating</th>
                        <th class="py-3.5 px-6">Quote Excerpt</th>
                        <th class="py-3.5 px-6">Featured</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($testimonials as $t)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">
                            {{ $t->client_name }}
                        </td>
                        <td class="py-4 px-6">
                            <p class="font-semibold text-slate-700 dark:text-slate-300">{{ $t->company }}</p>
                            <p class="text-[10px] text-slate-500">{{ $t->client_position }} {{ $t->location ? '• ' . $t->location : '' }}</p>
                        </td>
                        <td class="py-4 px-6 font-bold text-amber-400">
                            ★ {{ $t->rating }}/5
                        </td>
                        <td class="py-4 px-6 text-slate-600 dark:text-slate-300 max-w-xs truncate">
                            "{{ $t->quote }}"
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $t->is_featured ? 'bg-emerald-500/10 text-emerald-400' : 'bg-slate-500/10 text-slate-400' }}">
                                {{ $t->is_featured ? 'Featured' : 'Standard' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="px-3 py-1.5 rounded-lg bg-indigo-50 dark:bg-indigo-950/50 text-indigo-400 font-bold hover:bg-indigo-100">
                                Edit
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this testimonial?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 text-rose-400 font-bold hover:bg-rose-500/20">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-8 text-slate-400">No testimonials found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
