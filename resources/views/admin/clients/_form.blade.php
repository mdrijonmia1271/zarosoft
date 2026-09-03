@php
    /** @var \App\Models\Client|null $client */
    $client = $client ?? null;
    $inputClass = 'w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500';
    $labelClass = 'block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-wider mb-1';
    $fileClass = 'w-full mt-2 text-[11px] text-slate-600 dark:text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-indigo-50 dark:file:bg-indigo-950/50 file:text-indigo-500 hover:file:bg-indigo-100 cursor-pointer';
@endphp

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
    <div>
        <label class="{{ $labelClass }}">Client Name *</label>
        <input type="text" name="name" value="{{ old('name', $client?->name) }}" required class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Slug <span class="font-normal normal-case text-slate-400">(auto from name if blank)</span></label>
        <input type="text" name="slug" value="{{ old('slug', $client?->slug) }}" class="{{ $inputClass }}">
    </div>
</div>

<div>
    <label class="{{ $labelClass }}">Logo (public path or URL)</label>
    <input type="text" name="logo" value="{{ old('logo', $client?->logo) }}" placeholder="images/clients/acme.png" class="{{ $inputClass }}">
    <input type="file" name="logo_file" accept="image/*" class="{{ $fileClass }}">
    <p class="mt-1 text-[10px] text-slate-400">Upload a file, or paste a path / URL above. A transparent PNG or SVG-exported PNG works best.</p>

    @if($client?->logo_url)
    <div class="mt-3 inline-flex items-center gap-3 px-4 py-3 rounded-xl bg-white border border-slate-200">
        <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" class="h-10 w-auto object-contain">
        <span class="text-[11px] text-slate-500">Current logo</span>
    </div>
    @endif
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 items-end">
    <div>
        <label class="{{ $labelClass }}">Website URL</label>
        <input type="url" name="website_url" value="{{ old('website_url', $client?->website_url) }}" placeholder="https://..." class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Display Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $client?->order ?? 0) }}" class="{{ $inputClass }}">
    </div>
</div>

<label class="flex items-center gap-2 text-xs font-semibold text-slate-600 dark:text-slate-300 cursor-pointer">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $client?->is_active ?? true)) class="rounded border-slate-300 text-indigo-600 focus:ring-0">
    <span>Show in the client strip</span>
</label>
