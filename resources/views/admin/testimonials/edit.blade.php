@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')
@section('header', 'Edit Client Review: ' . $testimonial->client_name)

@section('content')
<div class="max-w-3xl space-y-6">
    <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-white">
        ← Back to Testimonials
    </a>

    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Client Name *</label>
                    <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Position / Title *</label>
                    <input type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Company Name *</label>
                    <input type="text" name="company" value="{{ old('company', $testimonial->company) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Rating (1 to 5) *</label>
                    <select name="rating" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                        <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Stars)</option>
                        <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Stars)</option>
                        <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Stars)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Client Avatar URL</label>
                <input type="text" name="avatar" value="{{ old('avatar', $testimonial->avatar) }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                <input type="file" name="avatar_file" accept="image/*" class="w-full mt-2 text-[11px] text-slate-600 dark:text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-indigo-50 dark:file:bg-indigo-950/50 file:text-indigo-500 hover:file:bg-indigo-100 cursor-pointer">
                <p class="mt-1 text-[10px] text-slate-400">Upload a file, or paste a path / URL above. Uploading replaces the current image.</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Client Review / Testimonial Quote *</label>
                <textarea name="quote" rows="4" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed">{{ old('quote', $testimonial->quote) }}</textarea>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_featured" value="1" {{ $testimonial->is_featured ? 'checked' : '' }} class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Feature on Homepage Slider</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }} class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Active</span>
                </label>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20">
                Update Review →
            </button>
        </form>
    </div>
</div>
@endsection
