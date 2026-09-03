@extends('admin.layouts.app')

@section('title', 'Manage Clients')
@section('header', 'Client Logos')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Logos shown in the "trusted by" strip on the homepage.</p>
        <a href="{{ route('admin.clients.create') }}" class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20 transition-all flex items-center gap-1.5">
            <span>+ Add Client</span>
        </a>
    </div>

    <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 uppercase tracking-wider text-[10px]">
                    <tr>
                        <th class="py-3.5 px-6">Logo</th>
                        <th class="py-3.5 px-6">Client</th>
                        <th class="py-3.5 px-6">Order</th>
                        <th class="py-3.5 px-6">Visible</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($clients as $client)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-4 px-6">
                            <div class="w-28 h-12 rounded-lg bg-white border border-slate-200 flex items-center justify-center p-2">
                                @if($client->logo_url)
                                <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" class="max-h-full max-w-full object-contain">
                                @else
                                <span class="text-[10px] text-slate-400">no logo</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <p class="font-bold text-slate-900 dark:text-white">{{ $client->name }}</p>
                            @if($client->website_url)
                            <a href="{{ $client->website_url }}" target="_blank" rel="noopener noreferrer" class="text-[11px] text-indigo-400 hover:underline">{{ $client->website_url }}</a>
                            @endif
                        </td>
                        <td class="py-4 px-6 font-mono text-slate-500">{{ $client->order }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $client->is_active ? 'bg-emerald-500/10 text-emerald-500' : 'bg-slate-500/10 text-slate-400' }}">
                                {{ $client->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.clients.edit', $client->id) }}" class="px-3 py-1.5 rounded-lg bg-indigo-50 dark:bg-indigo-950/50 text-indigo-400 font-bold hover:bg-indigo-100">
                                Edit
                            </a>
                            <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Remove this client logo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 text-rose-400 font-bold hover:bg-rose-500/20">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-8 text-slate-400">No client logos yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $clients->links() }}
</div>
@endsection
