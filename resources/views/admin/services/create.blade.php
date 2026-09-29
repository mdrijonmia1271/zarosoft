@extends('admin.layouts.app')

@section('title', 'Add New Service')
@section('header', 'Create New Service')

@section('content')
<div class="max-w-4xl space-y-6">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-white">
        ← Back to Services
    </a>

    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Service Category *</label>
                    <select name="service_category_id" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Service Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white" placeholder="e.g. Website Development">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Slug (URL identifier)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white" placeholder="e.g. website-development">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Icon Key / Emoji</label>
                    <input type="text" name="icon" value="{{ old('icon', 'globe') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white" placeholder="globe, smartphone, layers, cpu">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Short Description (Summary) *</label>
                <textarea name="short_description" rows="2" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed">{{ old('short_description') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Detailed Description (Landing Page Body)</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Key Features (1 per line)</label>
                    <textarea name="features" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed" placeholder="Feature 1&#10;Feature 2&#10;Feature 3"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Tech Stack (comma separated)</label>
                    <textarea name="tech_stack" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed" placeholder="Laravel, MySQL, Redis, Tailwind CSS"></textarea>
                </div>
            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Main Photo (shown in the homepage hero)</label>
                    <input type="text" name="image" value="{{ old('image') }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white" placeholder="images/services/my-service.jpg or https://...">
                    <input type="file" name="image_file" accept="image/*" class="w-full mt-2 text-[11px] text-slate-600 dark:text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-indigo-50 dark:file:bg-indigo-950/50 file:text-indigo-500 hover:file:bg-indigo-100 cursor-pointer">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">More Photos (1 path per line)</label>
                    <textarea name="gallery" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed" placeholder="images/services/shot-1.jpg&#10;images/services/shot-2.jpg">{{ old('gallery') }}</textarea>
                    <input type="file" name="gallery_files[]" accept="image/*" multiple class="w-full mt-2 text-[11px] text-slate-600 dark:text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-indigo-50 dark:file:bg-indigo-950/50 file:text-indigo-500 hover:file:bg-indigo-100 cursor-pointer">
                    <p class="mt-1 text-[10px] text-slate-500">Uploads are appended to the list above. Every photo here also becomes its own hero slide.</p>
                </div>
            </div>
            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_featured" value="1" class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Show on Homepage Featured Grid</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_active" value="1" checked class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Active / Visible</span>
                </label>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20">
                Save & Publish Service →
            </button>
        </form>
    </div>
</div>
@endsection
