@php
    /** @var \App\Models\Industry|null $industry */
    $industry = $industry ?? null;
    $inputClass = 'w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500';
    $labelClass = 'block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-wider mb-1';
@endphp

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
    <div>
        <label class="{{ $labelClass }}">Industry Name *</label>
        <input type="text" name="name" value="{{ old('name', $industry?->name) }}" required class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Slug <span class="font-normal normal-case text-slate-400">(auto from name if blank)</span></label>
        <input type="text" name="slug" value="{{ old('slug', $industry?->slug) }}" class="{{ $inputClass }}">
    </div>
</div>

<div>
    <label class="{{ $labelClass }}">Headline *</label>
    <input type="text" name="headline" value="{{ old('headline', $industry?->headline) }}" required class="{{ $inputClass }}">
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    <div>
        <label class="{{ $labelClass }}">Icon</label>
        <select name="icon" class="{{ $inputClass }}">
            @foreach(['factory', 'shopping-bag', 'activity', 'book-open', 'credit-card', 'truck', 'layers', 'cpu', 'globe', 'server'] as $icon)
            <option value="{{ $icon }}" @selected(old('icon', $industry?->icon ?? 'layers') === $icon)>{{ $icon }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="{{ $labelClass }}">Accent Colour</label>
        <select name="accent" class="{{ $inputClass }}">
            @foreach($accents as $accent)
            <option value="{{ $accent }}" @selected(old('accent', $industry?->accent ?? 'blue') === $accent)>{{ ucfirst($accent) }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="{{ $labelClass }}">Display Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $industry?->order ?? 0) }}" class="{{ $inputClass }}">
    </div>
</div>

<div>
    <label class="{{ $labelClass }}">Summary</label>
    <textarea name="summary" rows="3" class="{{ $inputClass }}">{{ old('summary', $industry?->summary) }}</textarea>
</div>

<div>
    <label class="{{ $labelClass }}">Core Modules <span class="font-normal normal-case text-slate-400">(one per line)</span></label>
    <textarea name="features" rows="6" class="{{ $inputClass }}">{{ old('features', collect($industry?->features ?? [])->implode("\n")) }}</textarea>
</div>

<label class="flex items-center gap-2 text-xs font-semibold text-slate-600 dark:text-slate-300 cursor-pointer">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $industry?->is_active ?? true)) class="rounded border-slate-300 text-indigo-600 focus:ring-0">
    <span>Visible on the public site</span>
</label>
