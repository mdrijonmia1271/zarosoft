@extends('admin.layouts.app')

@section('title', 'Edit Service — ' . $service->title)
@section('header', 'Edit Service: ' . $service->title)

@section('content')
<div class="max-w-4xl space-y-6">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-white">
        ← Back to Services
    </a>

    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Service Category *</label>
                    <select name="service_category_id" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $service->service_category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Service Title *</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Slug (URL identifier)</label>
                    <input type="text" name="slug" value="{{ old('slug', $service->slug) }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Icon Key / Emoji</label>
                    <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Short Description *</label>
                <textarea name="short_description" rows="2" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ old('short_description', $service->short_description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Detailed Description</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Key Features (1 per line)</label>
                    <textarea name="features" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ is_array($service->features) ? implode("\n", $service->features) : '' }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Tech Stack (comma separated)</label>
                    <textarea name="tech_stack" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-white leading-relaxed">{{ is_array($service->tech_stack) ? implode(", ", $service->tech_stack) : '' }}</textarea>
                </div>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_featured" value="1" {{ $service->is_featured ? 'checked' : '' }} class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Show on Homepage Featured Grid</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Active / Visible</span>
                </label>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20">
                Update Service Details →
            </button>
        </form>
    </div>
</div>
@endsection
