{{--
    Animated hero backdrop: a wireframe globe with orbiting rings, regional
    nodes and data pulses travelling between them. Pure inline SVG + CSS, so
    there is no video to download and nothing to buffer. Every animation is
    switched off under prefers-reduced-motion (see app.css).
--}}
<div class="hero-globe" aria-hidden="true">
    <svg class="hero-globe__svg" viewBox="0 0 1200 700" preserveAspectRatio="xMidYMid slice" fill="none">
        <defs>
            <linearGradient id="hg-line" x1="360" y1="110" x2="840" y2="590" gradientUnits="userSpaceOnUse">
                <stop stop-color="#00D2FF"/>
                <stop offset="1" stop-color="#007BFF"/>
            </linearGradient>
            <linearGradient id="hg-line-soft" x1="360" y1="110" x2="840" y2="590" gradientUnits="userSpaceOnUse">
                <stop stop-color="#00D2FF" stop-opacity="0.85"/>
                <stop offset="1" stop-color="#007BFF" stop-opacity="0.4"/>
            </linearGradient>
            <radialGradient id="hg-core" cx="0.5" cy="0.5" r="0.5">
                <stop stop-color="#007BFF" stop-opacity="0.42"/>
                <stop offset="0.65" stop-color="#0B132B" stop-opacity="0.05"/>
                <stop offset="1" stop-color="#060A17" stop-opacity="0"/>
            </radialGradient>
            <linearGradient id="hg-arc" x1="0" y1="0" x2="1" y2="0">
                <stop stop-color="#00D2FF" stop-opacity="0"/>
                <stop offset="0.5" stop-color="#00D2FF" stop-opacity="0.9"/>
                <stop offset="1" stop-color="#00D2FF" stop-opacity="0"/>
            </linearGradient>
        </defs>

        {{-- Soft inner light so the sphere reads as a volume, not a flat ring --}}
        <circle cx="600" cy="350" r="252" fill="url(#hg-core)"/>

        {{-- Orbit rings; each spins at its own pace --}}
        <g class="hero-globe__orbits" stroke="url(#hg-line-soft)" fill="none">
            <ellipse class="hero-globe__orbit hero-globe__orbit--1" cx="600" cy="350" rx="330" ry="118" stroke-width="1.25"/>
            <ellipse class="hero-globe__orbit hero-globe__orbit--2" cx="600" cy="350" rx="300" ry="140" stroke-width="1" stroke-dasharray="5 9"/>
            <ellipse class="hero-globe__orbit hero-globe__orbit--3" cx="600" cy="350" rx="352" ry="96" stroke-width="1" stroke-dasharray="2 10"/>
        </g>

        {{-- Globe: outline, latitudes, then meridians whose width animates to
             give the illusion of the sphere turning --}}
        <g class="hero-globe__sphere" stroke="url(#hg-line)" fill="none">
            <circle cx="600" cy="350" r="240" stroke-width="1.6" opacity="1"/>

            <g class="hero-globe__lat" stroke-width="1.15" opacity="0.72">
                <ellipse cx="600" cy="350" rx="240" ry="72"/>
                <ellipse cx="600" cy="290" rx="232" ry="70"/>
                <ellipse cx="600" cy="410" rx="232" ry="70"/>
                <ellipse cx="600" cy="232" rx="208" ry="62"/>
                <ellipse cx="600" cy="468" rx="208" ry="62"/>
                <ellipse cx="600" cy="182" rx="159" ry="48"/>
                <ellipse cx="600" cy="518" rx="159" ry="48"/>
            </g>

            <g class="hero-globe__meridians" stroke-width="1.15" opacity="0.7">
                <ellipse class="hero-globe__meridian hero-globe__meridian--1" cx="600" cy="350" rx="240" ry="240"/>
                <ellipse class="hero-globe__meridian hero-globe__meridian--2" cx="600" cy="350" rx="186" ry="240"/>
                <ellipse class="hero-globe__meridian hero-globe__meridian--3" cx="600" cy="350" rx="118" ry="240"/>
                <ellipse class="hero-globe__meridian hero-globe__meridian--4" cx="600" cy="350" rx="44" ry="240"/>
            </g>
        </g>

        {{-- Great-circle routes with a light pulse running along each --}}
        <g class="hero-globe__routes" fill="none" stroke-linecap="round">
            <path id="hg-route-1" pathLength="100" d="M404 262 Q600 96 806 286" stroke="url(#hg-line-soft)" stroke-width="1.1"/>
            <path id="hg-route-2" pathLength="100" d="M438 452 Q612 604 792 430" stroke="url(#hg-line-soft)" stroke-width="1.1"/>
            <path id="hg-route-3" pathLength="100" d="M404 262 Q470 430 438 452" stroke="url(#hg-line-soft)" stroke-width="1"/>
            <path id="hg-route-4" pathLength="100" d="M806 286 Q788 388 792 430" stroke="url(#hg-line-soft)" stroke-width="1"/>
            <path id="hg-route-5" pathLength="100" d="M404 262 Q640 350 792 430" stroke="url(#hg-line-soft)" stroke-width="0.9" opacity="0.6"/>

            <use class="hero-globe__pulse hero-globe__pulse--1" href="#hg-route-1" stroke="#00D2FF" stroke-width="2.2"/>
            <use class="hero-globe__pulse hero-globe__pulse--2" href="#hg-route-2" stroke="#38BDF8" stroke-width="2.2"/>
            <use class="hero-globe__pulse hero-globe__pulse--3" href="#hg-route-3" stroke="#00D2FF" stroke-width="2"/>
            <use class="hero-globe__pulse hero-globe__pulse--4" href="#hg-route-4" stroke="#38BDF8" stroke-width="2"/>
            <use class="hero-globe__pulse hero-globe__pulse--5" href="#hg-route-5" stroke="#00D2FF" stroke-width="1.8"/>
        </g>

        {{-- Regional nodes --}}
        <g class="hero-globe__nodes">
            @foreach([
                ['x' => 404, 'y' => 262, 'delay' => '0s'],
                ['x' => 806, 'y' => 286, 'delay' => '0.9s'],
                ['x' => 438, 'y' => 452, 'delay' => '1.7s'],
                ['x' => 792, 'y' => 430, 'delay' => '2.4s'],
                ['x' => 612, 'y' => 200, 'delay' => '3.1s'],
                ['x' => 600, 'y' => 508, 'delay' => '1.3s'],
            ] as $node)
            <g style="--node-delay: {{ $node['delay'] }}">
                <circle class="hero-globe__halo" cx="{{ $node['x'] }}" cy="{{ $node['y'] }}" r="6" fill="#00D2FF" opacity="0.35"/>
                <circle cx="{{ $node['x'] }}" cy="{{ $node['y'] }}" r="3.2" fill="#00D2FF"/>
            </g>
            @endforeach
        </g>

        {{-- Sparse starfield for depth --}}
        <g class="hero-globe__stars" fill="#7DD3FC">
            @foreach([
                [128, 132, 1.5, '0s'], [232, 560, 1.2, '1.2s'], [1046, 178, 1.6, '0.6s'],
                [968, 592, 1.3, '2.1s'], [92, 380, 1.1, '1.8s'], [1130, 420, 1.4, '0.3s'],
                [316, 92, 1.2, '2.7s'], [880, 96, 1.1, '1.5s'], [180, 646, 1.3, '0.9s'],
                [1078, 296, 1.2, '2.4s'],
            ] as [$sx, $sy, $sr, $sd])
            <circle class="hero-globe__star" cx="{{ $sx }}" cy="{{ $sy }}" r="{{ $sr }}" style="--star-delay: {{ $sd }}"/>
            @endforeach
        </g>
    </svg>
</div>
