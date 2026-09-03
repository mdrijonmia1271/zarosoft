@php
    /** @var \App\Models\Product|null $product */
    $product = $product ?? null;
    $inputClass = 'w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500';
    $labelClass = 'block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-wider mb-1';
@endphp

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
    <div>
        <label class="{{ $labelClass }}">Product Name *</label>
        <input type="text" name="name" value="{{ old('name', $product?->name) }}" required class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Slug <span class="font-normal normal-case text-slate-400">(auto from name if blank)</span></label>
        <input type="text" name="slug" value="{{ old('slug', $product?->slug) }}" class="{{ $inputClass }}">
    </div>
</div>

<div>
    <label class="{{ $labelClass }}">Tagline *</label>
    <input type="text" name="tagline" value="{{ old('tagline', $product?->tagline) }}" required class="{{ $inputClass }}">
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    <div>
        <label class="{{ $labelClass }}">Status *</label>
        <select name="status" required class="{{ $inputClass }}">
            @foreach(['Enterprise Ready', 'Beta', 'Coming Soon'] as $status)
            <option value="{{ $status }}" @selected(old('status', $product?->status) === $status)>{{ $status }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="{{ $labelClass }}">Icon</label>
        <select name="icon" class="{{ $inputClass }}">
            @foreach(['package', 'layers', 'users', 'shopping-cart', 'briefcase', 'cpu', 'cloud', 'server', 'globe', 'smartphone'] as $icon)
            <option value="{{ $icon }}" @selected(old('icon', $product?->icon ?? 'package') === $icon)>{{ $icon }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="{{ $labelClass }}">Display Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $product?->order ?? 0) }}" class="{{ $inputClass }}">
    </div>
</div>

<div>
    <label class="{{ $labelClass }}">Description</label>
    <textarea name="description" rows="3" class="{{ $inputClass }}">{{ old('description', $product?->description) }}</textarea>
</div>

<div>
    <label class="{{ $labelClass }}">Highlights <span class="font-normal normal-case text-slate-400">(one per line)</span></label>
    <textarea name="highlights" rows="5" class="{{ $inputClass }}">{{ old('highlights', collect($product?->highlights ?? [])->implode("\n")) }}</textarea>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 items-end">
    <div>
        <label class="{{ $labelClass }}">Demo URL</label>
        <input type="url" name="demo_url" value="{{ old('demo_url', $product?->demo_url) }}" placeholder="https://..." class="{{ $inputClass }}">
    </div>

    <label class="flex items-center gap-2 text-xs font-semibold text-slate-600 dark:text-slate-300 pb-2.5 cursor-pointer">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product?->is_active ?? true)) class="rounded border-slate-300 text-indigo-600 focus:ring-0">
        <span>Visible on the public site</span>
    </label>
</div>
