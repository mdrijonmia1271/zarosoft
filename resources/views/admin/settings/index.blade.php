@extends('admin.layouts.app')

@section('title', 'Site Settings & SEO')
@section('header', 'Site Settings & SEO Configuration')

@section('content')
<div class="max-w-4xl space-y-8">
    <p class="text-xs text-slate-500">Update global website configuration, company contact information, and meta SEO parameters.</p>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf

        @foreach($settings as $group => $items)
        <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
            <div class="border-b border-slate-100 dark:border-slate-800 pb-3 flex items-center justify-between">
                <h3 class="text-sm font-bold uppercase tracking-wider text-indigo-400">
                    {{ ucfirst($group) }} Configuration
                </h3>
                <span class="text-[10px] text-slate-500 font-mono">{{ count($items) }} parameters</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($items as $setting)
                <div class="{{ strlen($setting->value) > 80 ? 'sm:col-span-2' : '' }}">
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                        {{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}
                        <span class="text-[10px] font-mono text-slate-400 font-normal">({{ $setting->key }})</span>
                    </label>

                    @if(strlen($setting->value) > 80 || str_contains($setting->key, 'description') || str_contains($setting->key, 'address'))
                    <textarea name="{{ $setting->key }}" rows="2" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed focus:outline-none focus:border-indigo-500">{{ old($setting->key, $setting->value) }}</textarea>
                    @else
                    <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="pt-2">
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-xl shadow-indigo-500/25 transition-all">
                Save All Site Settings →
            </button>
        </div>
    </form>
</div>
@endsection
