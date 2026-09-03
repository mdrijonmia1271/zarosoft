@props(['name' => 'code', 'class' => 'w-5 h-5'])

{{--
    Maps the `icon` slug stored on Service records to a line icon, so service
    listings can be rendered straight from the database. Unknown names fall
    back to the generic code glyph.
--}}
<svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @switch($name)
        @case('globe')
            <circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.7 2.5 15.3 0 18M12 3c-2.5 2.7-2.5 15.3 0 18"/>
            @break
        @case('smartphone')
            <rect x="7" y="2" width="10" height="20" rx="2"/><path d="M12 18h.01"/>
            @break
        @case('shopping-cart')
            <circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path d="M2 3h2.5l2.2 11.2a2 2 0 0 0 2 1.6h7.9a2 2 0 0 0 2-1.55L20.5 7H6"/>
            @break
        @case('layers')
            <path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 13 9 5 9-5"/><path d="m3 17 9 5 9-5"/>
            @break
        @case('users')
            <path d="M16 20v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 20v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
            @break
        @case('cloud')
            <path d="M17.5 19a4.5 4.5 0 0 0 .5-8.97A6 6 0 0 0 6.1 11.1 3.5 3.5 0 0 0 6.5 19h11Z"/>
            @break
        @case('cpu')
            <rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M4 9h3M4 15h3M17 9h3M17 15h3M9 4v3M15 4v3M9 17v3M15 17v3"/>
            @break
        @case('server')
            <rect x="3" y="4" width="18" height="7" rx="2"/><rect x="3" y="13" width="18" height="7" rx="2"/><path d="M7 7.5h.01M7 16.5h.01"/>
            @break
        @case('shield-check')
            <path d="M12 3 5 6v6c0 4.4 3 8.2 7 9 4-.8 7-4.6 7-9V6l-7-3Z"/><path d="m9 12 2 2 4-4"/>
            @break
        @case('layout')
            <rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 10h18M10 10v10"/>
            @break
        @case('image')
            <rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="m21 16-5-5L5 20"/>
            @break
        @case('target')
            <circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.5"/>
            @break
        @case('award')
            <circle cx="12" cy="9" r="6"/><path d="m8.5 14-1.5 7 5-3 5 3-1.5-7"/>
            @break
        @case('video')
            <rect x="2" y="6" width="14" height="12" rx="2"/><path d="m22 8-6 4 6 4V8Z"/>
            @break
        @case('zap')
            <path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"/>
            @break
        @case('sparkles')
            <path d="m12 3 1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3Z"/><path d="M19 15.5 19.8 18l2.5.8-2.5.8L19 22l-.8-2.4-2.5-.8 2.5-.8.8-2.5Z"/>
            @break
        @case('package')
            <path d="m12 2 9 5v10l-9 5-9-5V7l9-5Z"/><path d="m3 7 9 5 9-5M12 12v10"/>
            @break
        @case('briefcase')
            <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
            @break
        @case('activity')
            <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
            @break
        @case('book-open')
            <path d="M12 7c-1.5-1.3-3.6-2-6-2H3v13h3c2.4 0 4.5.7 6 2 1.5-1.3 3.6-2 6-2h3V5h-3c-2.4 0-4.5.7-6 2Z"/><path d="M12 7v13"/>
            @break
        @case('credit-card')
            <rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20M6 15h4"/>
            @break
        @case('truck')
            <path d="M3 6h11v10H3zM14 9h4l3 3v4h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="17.5" cy="18" r="2"/>
            @break
        @case('factory')
            <path d="M3 21V10l5 3V10l5 3V10l5 3v8H3Z"/><path d="M6 21v-3M11 21v-3M16 21v-3M18 10V3h3v7"/>
            @break
        @case('shopping-bag')
            <path d="M4 7h16l-1.2 13.1a2 2 0 0 1-2 1.9H7.2a2 2 0 0 1-2-1.9L4 7Z"/><path d="M9 10V6a3 3 0 0 1 6 0v4"/>
            @break
        @default
            <path d="m10 20 4-16M6 8l-4 4 4 4M18 8l4 4-4 4"/>
    @endswitch
</svg>
