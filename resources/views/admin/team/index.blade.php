@extends('admin.layouts.app')

@section('title', 'Manage Team Members')
@section('header', 'Leadership & Team Management')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Manage the 4 founders and team members displayed on the About page.</p>
        <a href="{{ route('admin.team.create') }}" class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20 transition-all flex items-center gap-1.5">
            <span>+ Add Team Member</span>
        </a>
    </div>

    <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 uppercase tracking-wider text-[10px]">
                    <tr>
                        <th class="py-3.5 px-6">Member</th>
                        <th class="py-3.5 px-6">Designation</th>
                        <th class="py-3.5 px-6">Role Tag</th>
                        <th class="py-3.5 px-6">Founder Status</th>
                        <th class="py-3.5 px-6">Order</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($members as $m)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-4 px-6 flex items-center gap-3">
                            @if($m->avatar_url)
                            <img src="{{ $m->avatar_url }}" alt="{{ $m->name }}" class="w-10 h-10 rounded-full object-cover border border-slate-700">
                            @else
                            <span class="w-10 h-10 rounded-full border border-slate-700 bg-slate-200 dark:bg-slate-800 flex items-center justify-center text-[11px] font-bold text-slate-500 dark:text-slate-400">{{ $m->initials }}</span>
                            @endif
                            <div>
                                <p class="font-bold text-slate-900 dark:text-white">{{ $m->name }}</p>
                                <p class="text-[11px] text-slate-400">{{ $m->email }}</p>
                            </div>
                        </td>
                        <td class="py-4 px-6 font-semibold text-slate-700 dark:text-slate-300">
                            {{ $m->designation }}
                        </td>
                        <td class="py-4 px-6 font-mono text-indigo-400">
                            {{ $m->role_title }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $m->is_founder ? 'bg-purple-500/10 text-purple-400' : 'bg-slate-500/10 text-slate-400' }}">
                                {{ $m->is_founder ? 'Co-Founder' : 'Staff' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-500">
                            {{ $m->order }}
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.team.edit', $m->id) }}" class="px-3 py-1.5 rounded-lg bg-indigo-50 dark:bg-indigo-950/50 text-indigo-400 font-bold hover:bg-indigo-100">
                                Edit
                            </a>
                            <form action="{{ route('admin.team.destroy', $m->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this team member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 text-rose-400 font-bold hover:bg-rose-500/20">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-8 text-slate-400">No team members added.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
