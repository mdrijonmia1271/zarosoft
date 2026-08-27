@extends('admin.layouts.app')

@section('title', 'Add New Case Study')
@section('header', 'Create New Case Study / Project')

@section('content')
<div class="max-w-4xl space-y-6">
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-white">
        ← Back to Projects
    </a>

    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Project Category *</label>
                    <select name="project_category_id" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Project Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="e.g. ZaroERP — Smart Manufacturing Suite">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Client Name</label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="e.g. Apex Industrial Mills Ltd.">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Industry</label>
                    <input type="text" name="industry" value="{{ old('industry') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="e.g. Manufacturing, FinTech, Healthcare">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Duration / Timeline</label>
                    <input type="text" name="duration" value="{{ old('duration') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="e.g. 4 Months">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Live Demo / URL</label>
                    <input type="url" name="live_url" value="{{ old('live_url') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="https://demo.zarosoft.com/erp">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Tagline (Punchy Headline)</label>
                <input type="text" name="tagline" value="{{ old('tagline') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="Automating shop-floor production lines and multi-warehouse inventory.">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Executive Overview *</label>
                <textarea name="overview" rows="3" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ old('overview') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">The Problem / Challenge</label>
                    <textarea name="problem" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ old('problem') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">The Solution Implemented</label>
                    <textarea name="solution" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ old('solution') }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Key Features (1 per line)</label>
                    <textarea name="key_features" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed" placeholder="Automated Bill of Materials (BOM)&#10;Barcode inventory scanning&#10;Double-entry accounting"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Measurable Results / ROI (1 per line)</label>
                    <textarea name="results" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed" placeholder="45% reduction in factory downtime&#10;$280,000 saved annually&#10;99.8% on-time delivery"></textarea>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Tech Stack (comma separated)</label>
                <input type="text" name="tech_stack" value="{{ old('tech_stack') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="Laravel 12, MySQL, Redis, Tailwind CSS, Docker">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Thumbnail Image URL</label>
                    <input type="text" name="thumbnail" value="{{ old('thumbnail') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="https://images.unsplash.com/photo-...">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Hero Image URL</label>
                    <input type="text" name="hero_image" value="{{ old('hero_image') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white" placeholder="https://images.unsplash.com/photo-...">
                </div>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_featured" value="1" class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Feature on Homepage Showcase</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_active" value="1" checked class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Active / Visible</span>
                </label>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20">
                Save & Publish Case Study →
            </button>
        </form>
    </div>
</div>
@endsection
