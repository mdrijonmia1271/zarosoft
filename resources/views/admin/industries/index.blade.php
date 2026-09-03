@extends('admin.layouts.app')

@section('title', 'Manage Industry Solutions')
@section('header', 'Industry Solutions')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Industries shown on the public Solutions page.</p>
        <a href="{{ route('admin.industries.create') }}" class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20 transition-all flex items-center gap-1.5">
            <span>+ Add Industry</span>
        </a>
    </div>

    <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 uppercase tracking-wider text-[10px]">
                    <tr>
                        <th class="py-3.5 px-6">Industry</th>
                        <th class="py-3.5 px-6">Modules</th>
                        <th class="py-3.5 px-6">Order</th>
                        <th class="py-3.5 px-6">Visible</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($industries as $industry)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-lg bg-gradient-to-br {{ $industry->gradient }} text-white flex items-center justify-center shrink-0">
                                    <x-icon :name="$industry->icon" class="w-4 h-4" />
                                </span>
                                <div>
                                    <p class="font-bold text-slate-900 dark:text-white">{{ $industry->name }}</p>
                                    <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">{{ $industry->headline }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 font-mono text-slate-500">{{ count($industry->features ?? []) }}</td>
                        <td class="py-4 px-6 font-mono text-slate-500">{{ $industry->order }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $industry->is_active ? 'bg-emerald-500/10 text-emerald-500' : 'bg-slate-500/10 text-slate-400' }}">
                                {{ $industry->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.industries.edit', $industry->id) }}" class="px-3 py-1.5 rounded-lg bg-indigo-50 dark:bg-indigo-950/50 text-indigo-400 font-bold hover:bg-indigo-100">
                                Edit
                            </a>
                            <form action="{{ route('admin.industries.destroy', $industry->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this industry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 text-rose-400 font-bold hover:bg-rose-500/20">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-8 text-slate-400">No industries yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $industries->links() }}
</div>
@endsection
