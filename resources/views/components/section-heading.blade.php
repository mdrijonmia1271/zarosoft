@props([
    'eyebrow' => null,
    'title' => null,
    'accent' => null,
    'lede' => null,
    'align' => 'left',
    'tone' => 'light',
    'size' => 'lg',
    'break' => true,
])

{{--
    The one section header used across the site: an eyebrow pill, a headline
    whose second line carries the brand gradient, and an optional lede. Every
    section used to hand-roll this, so the six copies had quietly drifted apart
    in padding, tracking and text size.

    tone="dark" is for headers sitting on the navy sections; `align` and `size`
    cover the layout variations the pages actually need.
--}}

@php
    $isDark = $tone === 'dark';
    $isCentered = $align === 'center';
@endphp

<div {{ $attributes->class([
    'space-y-4',
    'text-center mx-auto max-w-3xl' => $isCentered,
    'max-w-2xl' => !$isCentered,
]) }}>
    @if($eyebrow)
    <div @class([
        'reveal inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-[0.2em] font-heading backdrop-blur-md',
        'bg-[#007BFF]/10 border border-[#007BFF]/30 text-[#007BFF]' => !$isDark,
        'bg-white/5 border border-white/15 text-[#38BDF8]' => $isDark,
    ])>
        {{-- A quietly pulsing dot rather than a static bullet, so the eyebrow
             reads as a live signal on both light and dark grounds. --}}
        <span class="relative flex h-1.5 w-1.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-current opacity-75"></span>
            <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-current"></span>
        </span>
        {{ $eyebrow }}
    </div>
    @endif

    @if($title)
    <h2 data-delay="90" @class([
        'reveal font-black tracking-tight font-heading leading-[1.12]',
        'text-3xl sm:text-4xl lg:text-[44px]' => $size === 'lg',
        'text-2xl sm:text-3xl' => $size === 'sm',
        'text-[#0F172A]' => !$isDark,
        'text-white' => $isDark,
    ])>
        {{ $title }}
        @if($accent)
        {{-- Large headings read better broken over two lines; the small ones
             used in column headers do not have the width for it. --}}
        @if($break)<br class="hidden sm:block" />@endif
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4D8] to-[#00D2FF]">{{ $accent }}</span>
        @endif
    </h2>
    @endif

    @if($lede)
    <p data-delay="180" @class([
        'reveal text-sm sm:text-base leading-relaxed',
        'max-w-2xl mx-auto' => $isCentered,
        'max-w-xl' => !$isCentered,
        'text-slate-600' => !$isDark,
        'text-slate-300' => $isDark,
    ])>
        {{ $lede }}
    </p>
    @endif

    {{ $slot }}
</div>
