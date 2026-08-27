@extends('admin.layouts.app')

@section('title', 'Add Team Member')
@section('header', 'Add Team / Founder Profile')

@section('content')
<div class="max-w-4xl space-y-6">
    <a href="{{ route('admin.team.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-white">
        ← Back to Team
    </a>

    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        <form action="{{ route('admin.team.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Designation *</label>
                    <input type="text" name="designation" value="{{ old('designation') }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="Founder & Chief Executive Officer (CEO)">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Role Title / Badge</label>
                    <input type="text" name="role_title" value="{{ old('role_title') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="Strategy & Vision">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Avatar Image URL</label>
                    <input type="text" name="avatar" value="{{ old('avatar') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="https://images.unsplash.com/photo-...">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">LinkedIn Profile URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">GitHub Profile URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Skills (comma separated)</label>
                    <input type="text" name="skills" value="{{ old('skills') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="Laravel, ERP, Cloud, AI">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Short Biography *</label>
                <textarea name="bio" rows="3" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ old('bio') }}</textarea>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_founder" value="1" checked class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Mark as Co-Founder</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_active" value="1" checked class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Active / Visible</span>
                </label>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20">
                Save Member →
            </button>
        </form>
    </div>
</div>
@endsection
