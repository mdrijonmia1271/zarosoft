@extends('admin.layouts.app')

@section('title', 'Edit Article — ' . $blog->title)
@section('header', 'Edit Article: ' . $blog->title)

@section('content')
<div class="max-w-4xl space-y-6">
    <a href="{{ route('admin.blogs.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-white">
        ← Back to Blog List
    </a>

    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Blog Category *</label>
                    <select name="blog_category_id" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $blog->blog_category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Article Title *</label>
                    <input type="text" name="title" value="{{ old('title', $blog->title) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Author Name *</label>
                    <input type="text" name="author_name" value="{{ old('author_name', $blog->author_name) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Estimated Read Time *</label>
                    <input type="text" name="read_time" value="{{ old('read_time', $blog->read_time) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Cover Image URL</label>
                <input type="text" name="cover_image" value="{{ old('cover_image', $blog->cover_image) }}" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white">
                <input type="file" name="cover_image_file" accept="image/*" class="w-full mt-2 text-[11px] text-slate-600 dark:text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-indigo-50 dark:file:bg-indigo-950/50 file:text-indigo-500 hover:file:bg-indigo-100 cursor-pointer">
                <p class="mt-1 text-[10px] text-slate-400">Upload a file, or paste a path / URL above. Uploading replaces the current image.</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Excerpt (Summary) *</label>
                <textarea name="excerpt" rows="2" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white leading-relaxed">{{ old('excerpt', $blog->excerpt) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Full Article Content (Markdown or HTML) *</label>
                <textarea name="content" rows="12" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white font-mono leading-relaxed">{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_featured" value="1" {{ $blog->is_featured ? 'checked' : '' }} class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Feature at Top of Blog</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-300">
                    <input type="checkbox" name="is_published" value="1" {{ $blog->is_published ? 'checked' : '' }} class="rounded bg-slate-800 border-slate-700 text-indigo-600">
                    <span>Published</span>
                </label>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20">
                Update Article →
            </button>
        </form>
    </div>
</div>
@endsection
