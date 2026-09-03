@props([
    'src' => null,
    'alt' => '',
    'width' => null,
    'height' => null,
    'lazy' => true,
    'imgClass' => '',
])

@php
    /**
     * Serves a WebP sibling when one has been generated next to the JPEG,
     * falling back to the original for browsers (and remote URLs) without it.
     */
    $webp = null;

    if ($src && !Illuminate\Support\Str::startsWith($src, ['http://', 'https://', '//', 'data:'])) {
        $candidate = preg_replace('/\.(jpe?g|png)$/i', '.webp', $src);
        if ($candidate !== $src && is_file(public_path($candidate))) {
            $webp = asset($candidate);
        }
        $src = asset($src);
    } elseif ($src && Illuminate\Support\Str::startsWith($src, url('/'))) {
        // Absolute URL on this host — map it back to a public path to look for WebP.
        $relative = ltrim(Illuminate\Support\Str::after($src, url('/')), '/');
        $candidate = preg_replace('/\.(jpe?g|png)$/i', '.webp', $relative);
        if ($candidate !== $relative && is_file(public_path($candidate))) {
            $webp = asset($candidate);
        }
    }
@endphp

@if($src)
<picture>
    @if($webp)
    <source srcset="{{ $webp }}" type="image/webp">
    @endif
    <img src="{{ $src }}"
         alt="{{ $alt }}"
         @if($width) width="{{ $width }}" @endif
         @if($height) height="{{ $height }}" @endif
         @if($lazy) loading="lazy" @endif
         decoding="async"
         {{ $attributes->merge(['class' => $imgClass]) }}>
</picture>
@endif
