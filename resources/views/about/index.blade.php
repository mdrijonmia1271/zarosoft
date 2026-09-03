@extends('layouts.app')

@section('title', 'About ZaroSoft — Enterprise Software Engineering & Leadership')
@section('meta_description', 'Learn about ZaroSoft, our engineering mission to automate enterprise workflows, our leadership team, and the core ZARO philosophy.')

@section('content')
<!-- Header Hero -->
<section class="relative overflow-hidden py-16 sm:py-20 bg-[#F8FAFC] border-b border-slate-200/80 text-center">
    <!-- Ambient Tech Glows & Grid Pattern -->
    <div class="absolute inset-0 bg-tech-grid pointer-events-none opacity-70"></div>
    <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-[#007BFF]/10 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-glow"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-[#00D2FF]/15 rounded-full blur-[110px] pointer-events-none -z-10 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <!-- ==================== 10 DECORATIVE SOFTWARE TECH SHAPES (HERO AREA) ==================== -->
    
    <!-- Shape 1: Top-Left Outer 3D Isometric Wireframe Cube -->
    <div class="absolute top-4 sm:top-8 left-3 sm:left-8 lg:left-14 pointer-events-none -z-0 opacity-30 sm:opacity-40 animate-float hidden sm:block">
        <svg class="w-16 h-16 sm:w-22 sm:h-22" viewBox="0 0 100 100" fill="none">
            <path d="M50 12 L85 32 L85 68 L50 88 L15 68 L15 32 Z" stroke="url(#hero-cube-grad)" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M50 12 L50 50 L85 68" stroke="url(#hero-cube-grad)" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M50 50 L15 68" stroke="url(#hero-cube-grad)" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M50 12 L85 68 M50 12 L15 68" stroke="#007BFF" stroke-width="0.75" stroke-dasharray="3 3" opacity="0.35"/>
            <circle cx="50" cy="50" r="3" fill="#00D2FF"/>
            <circle cx="50" cy="12" r="2" fill="#007BFF"/>
            <circle cx="85" cy="32" r="2" fill="#00D2FF"/>
            <circle cx="15" cy="32" r="2" fill="#007BFF"/>
            <circle cx="50" cy="88" r="2" fill="#007BFF"/>
            <defs>
                <linearGradient id="hero-cube-grad" x1="15" y1="12" x2="85" y2="88" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 2: Top-Right Outer 4-Point Astroid Star with Glowing Core -->
    <div class="absolute top-5 sm:top-10 right-4 sm:right-10 lg:right-16 pointer-events-none -z-0 opacity-25 sm:opacity-35 animate-float-delayed">
        <svg class="w-14 h-14 sm:w-20 sm:h-20" viewBox="0 0 100 100" fill="none">
            <path d="M50 8 C50 32, 68 50, 92 50 C68 50, 50 68, 50 92 C50 68, 32 50, 8 50 C32 50, 50 32, 50 8 Z" fill="url(#hero-star-grad)" stroke="url(#hero-star-stroke)" stroke-width="1.5"/>
            <circle cx="50" cy="50" r="7" fill="#00D2FF" fill-opacity="0.6"/>
            <circle cx="50" cy="50" r="3" fill="white"/>
            <defs>
                <linearGradient id="hero-star-grad" x1="8" y1="8" x2="92" y2="92" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF" stop-opacity="0.25"/>
                    <stop offset="1" stop-color="#007BFF" stop-opacity="0.05"/>
                </linearGradient>
                <linearGradient id="hero-star-stroke" x1="8" y1="8" x2="92" y2="92" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 3: Top-Left Badge Flank (3D Hexagonal Matrix Lattice) -->
    <div class="absolute top-6 sm:top-10 left-1/4 -translate-x-12 sm:-translate-x-20 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float hidden lg:block">
        <svg class="w-14 h-14 sm:w-18 sm:h-18" viewBox="0 0 100 100" fill="none">
            <polygon points="50,15 80,32 80,68 50,85 20,68 20,32" stroke="url(#hero-hex-top-grad)" stroke-width="1.5" fill="none"/>
            <polygon points="50,28 70,40 70,60 50,72 30,60 30,40" stroke="url(#hero-hex-top-grad)" stroke-width="1" stroke-dasharray="2 3" opacity="0.6"/>
            <circle cx="50" cy="50" r="3.5" fill="#007BFF"/>
            <defs>
                <linearGradient id="hero-hex-top-grad" x1="20" y1="15" x2="80" y2="85" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 4: Top-Right Badge Flank (Concentric Radar Orbit Circles) -->
    <div class="absolute top-6 sm:top-10 right-1/4 translate-x-12 sm:translate-x-20 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float-delayed hidden lg:block">
        <svg class="w-14 h-14 sm:w-18 sm:h-18" viewBox="0 0 100 100" fill="none">
            <circle cx="50" cy="50" r="38" stroke="url(#hero-radar-top-grad)" stroke-width="1.25" stroke-dasharray="3 3"/>
            <circle cx="50" cy="50" r="22" stroke="url(#hero-radar-top-grad)" stroke-width="1.5"/>
            <circle cx="50" cy="50" r="10" stroke="url(#hero-radar-top-grad)" stroke-width="1" fill="#007BFF" fill-opacity="0.1"/>
            <circle cx="72" cy="50" r="3" fill="#00D2FF"/>
            <defs>
                <linearGradient id="hero-radar-top-grad" x1="12" y1="12" x2="88" y2="88" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 5: Mid-Left Headline Flank (3D Faceted Diamond / Octahedron Prism) -->
    <div class="absolute top-1/2 -translate-y-20 left-2 sm:left-6 lg:left-12 pointer-events-none -z-0 opacity-25 sm:opacity-35 animate-float hidden md:block">
        <svg class="w-16 h-16 sm:w-22 sm:h-22" viewBox="0 0 100 100" fill="none">
            <polygon points="50,10 85,45 50,90 15,45" stroke="url(#hero-octa-mid-grad)" stroke-width="1.5" fill="url(#hero-octa-mid-fill)"/>
            <line x1="15" y1="45" x2="85" y2="45" stroke="url(#hero-octa-mid-grad)" stroke-width="1.5"/>
            <polygon points="50,10 65,45 50,90 35,45" stroke="url(#hero-octa-mid-grad)" stroke-width="1" fill="none" opacity="0.6"/>
            <circle cx="50" cy="45" r="3" fill="#00D2FF"/>
            <defs>
                <linearGradient id="hero-octa-mid-grad" x1="15" y1="10" x2="85" y2="90" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
                <linearGradient id="hero-octa-mid-fill" x1="50" y1="10" x2="50" y2="90" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.12"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.02"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 6: Mid-Right Headline Flank (3D Geodesic Wireframe Sphere / Icosahedron) -->
    <div class="absolute top-1/2 -translate-y-20 right-2 sm:right-6 lg:right-12 pointer-events-none -z-0 opacity-25 sm:opacity-35 animate-float-delayed hidden md:block">
        <svg class="w-16 h-16 sm:w-22 sm:h-22" viewBox="0 0 100 100" fill="none">
            <circle cx="50" cy="50" r="38" stroke="url(#hero-sphere-mid-grad)" stroke-width="1.5"/>
            <ellipse cx="50" cy="50" rx="38" ry="15" stroke="url(#hero-sphere-mid-grad)" stroke-width="1" stroke-dasharray="3 3"/>
            <ellipse cx="50" cy="50" rx="15" ry="38" stroke="url(#hero-sphere-mid-grad)" stroke-width="1" stroke-dasharray="3 3"/>
            <polygon points="50,12 80,31 80,69 50,88 20,69 20,31" stroke="url(#hero-sphere-mid-grad)" stroke-width="1" opacity="0.6"/>
            <circle cx="50" cy="50" r="3.5" fill="#007BFF"/>
            <defs>
                <linearGradient id="hero-sphere-mid-grad" x1="12" y1="12" x2="88" y2="88" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 7: Lower-Left Subtitle Flank (3D Torus Orbital Ring with Orbiting Node) -->
    <div class="absolute bottom-16 sm:bottom-24 left-4 sm:left-14 lg:left-22 pointer-events-none -z-0 opacity-25 sm:opacity-35 animate-float hidden md:block">
        <svg class="w-18 h-18 sm:w-24 sm:h-24" viewBox="0 0 120 120" fill="none">
            <ellipse cx="60" cy="60" rx="46" ry="22" transform="rotate(-25 60 60)" stroke="url(#hero-torus-grad)" stroke-width="1.5"/>
            <ellipse cx="60" cy="60" rx="46" ry="22" transform="rotate(35 60 60)" stroke="url(#hero-torus-grad)" stroke-width="1.25" stroke-dasharray="4 4" opacity="0.6"/>
            <circle cx="60" cy="60" r="14" stroke="url(#hero-torus-grad)" stroke-width="1.5" fill="#007BFF" fill-opacity="0.08"/>
            <circle cx="95" cy="45" r="3.5" fill="#00D2FF" fill-opacity="0.9"/>
            <defs>
                <linearGradient id="hero-torus-grad" x1="14" y1="38" x2="106" y2="82" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 8: Lower-Right Subtitle Flank (3D Isometric Cylinder / Column) -->
    <div class="absolute bottom-16 sm:bottom-24 right-4 sm:right-14 lg:right-22 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float-delayed hidden md:block">
        <svg class="w-16 h-20 sm:w-22 sm:h-26" viewBox="0 0 100 120" fill="none">
            <ellipse cx="50" cy="25" rx="35" ry="15" stroke="url(#hero-cyl-mid-grad)" stroke-width="1.5" fill="url(#hero-cyl-mid-fill)"/>
            <ellipse cx="50" cy="95" rx="35" ry="15" stroke="url(#hero-cyl-mid-grad)" stroke-width="1.5"/>
            <line x1="15" y1="25" x2="15" y2="95" stroke="url(#hero-cyl-mid-grad)" stroke-width="1.5"/>
            <line x1="85" y1="25" x2="85" y2="95" stroke="url(#hero-cyl-mid-grad)" stroke-width="1.5"/>
            <ellipse cx="50" cy="60" rx="35" ry="15" stroke="url(#hero-cyl-mid-grad)" stroke-width="1" stroke-dasharray="3 3" opacity="0.45"/>
            <circle cx="50" cy="25" r="3" fill="#00D2FF"/>
            <defs>
                <linearGradient id="hero-cyl-mid-grad" x1="15" y1="10" x2="85" y2="110" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
                <linearGradient id="hero-cyl-mid-fill" x1="50" y1="10" x2="50" y2="40" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.12"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.03"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 9: Bottom-Left Corner Beside CTAs (8-Point Rounded Astroid Star) -->
    <div class="absolute bottom-4 sm:bottom-8 left-3 sm:left-8 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float hidden sm:block">
        <svg class="w-14 h-14 sm:w-18 sm:h-18" viewBox="0 0 80 80" fill="none">
            <path d="M40 6 Q40 40 74 40 Q40 40 40 74 Q40 40 6 40 Q40 40 40 6 Z" fill="url(#hero-astroid-bot-grad)" stroke="url(#hero-astroid-bot-stroke)" stroke-width="1.5"/>
            <circle cx="40" cy="40" r="5" fill="#007BFF" fill-opacity="0.6"/>
            <defs>
                <linearGradient id="hero-astroid-bot-grad" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.18"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.05"/>
                </linearGradient>
                <linearGradient id="hero-astroid-bot-stroke" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 10: Bottom-Right Corner Beside CTAs (3D Tetrahedron / Pyramid Wireframe) -->
    <div class="absolute bottom-4 sm:bottom-8 right-3 sm:right-8 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float-delayed hidden sm:block">
        <svg class="w-14 h-14 sm:w-18 sm:h-18" viewBox="0 0 100 100" fill="none">
            <polygon points="50,15 85,75 15,75" stroke="url(#hero-tetra-bot-grad)" stroke-width="1.5" fill="none"/>
            <line x1="50" y1="15" x2="50" y2="58" stroke="url(#hero-tetra-bot-grad)" stroke-width="1.5"/>
            <line x1="15" y1="75" x2="50" y2="58" stroke="url(#hero-tetra-bot-grad)" stroke-width="1.5"/>
            <line x1="85" y1="75" x2="50" y2="58" stroke="url(#hero-tetra-bot-grad)" stroke-width="1.5"/>
            <circle cx="50" cy="58" r="3" fill="#00D2FF"/>
            <defs>
                <linearGradient id="hero-tetra-bot-grad" x1="15" y1="15" x2="85" y2="75" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Center Coordinate Marker Glyphs (Left & Right Plus Grids) -->
    <div class="absolute top-1/2 -translate-y-1/2 left-2 sm:left-6 pointer-events-none -z-0 opacity-20 sm:opacity-30 text-slate-400 font-mono text-xs hidden xl:flex flex-col gap-3 select-none">
        <span class="text-[#007BFF]/70 font-bold">+</span>
        <span class="text-[#00D2FF]/70 font-bold">+</span>
        <span class="text-slate-400/50 font-bold">+</span>
    </div>
    <div class="absolute top-1/2 -translate-y-1/2 right-2 sm:right-6 pointer-events-none -z-0 opacity-20 sm:opacity-30 text-slate-400 font-mono text-xs hidden xl:flex flex-col gap-3 select-none">
        <span class="text-[#00D2FF]/70 font-bold">+</span>
        <span class="text-[#007BFF]/70 font-bold">+</span>
        <span class="text-slate-400/50 font-bold">+</span>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            ABOUT ZAROSOFT
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
            Engineering Technology That <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Eliminates Complexity.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            ZaroSoft was founded by software engineers and technical architects on a single principle: ambitious companies shouldn't be constrained by slow, fragmented legacy tools.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="#team" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0062cc] hover:from-[#0062cc] hover:to-[#004bb5] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                Meet Leadership Team ↓
            </a>
            <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-xl bg-white hover:bg-slate-50 text-[#0F172A] font-bold text-sm border border-slate-200 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                Start a Conversation →
            </a>
        </div>
    </div>
</section>

<!-- Mission & Vision Cards -->
<section class="py-24 bg-white border-b border-slate-200/80 relative overflow-hidden">
    <!-- ==================== DECORATIVE SHAPES ==================== -->
    <!-- Shape 1: Top-Left Outer Corner Faceted Octahedron / Diamond Prism -->
    <div class="absolute -top-6 -left-6 sm:top-6 sm:left-6 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float hidden sm:block">
        <svg class="w-20 h-20 sm:w-28 sm:h-28" viewBox="0 0 100 100" fill="none">
            <polygon points="50,10 85,45 50,90 15,45" stroke="url(#mv-octa-grad)" stroke-width="1.5" fill="url(#mv-octa-fill)"/>
            <line x1="15" y1="45" x2="85" y2="45" stroke="url(#mv-octa-grad)" stroke-width="1.5"/>
            <polygon points="50,10 65,45 50,90 35,45" stroke="url(#mv-octa-grad)" stroke-width="1" fill="none" opacity="0.5"/>
            <circle cx="50" cy="45" r="3" fill="#007BFF"/>
            <defs>
                <linearGradient id="mv-octa-grad" x1="15" y1="10" x2="85" y2="90" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
                <linearGradient id="mv-octa-fill" x1="50" y1="10" x2="50" y2="90" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.12"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.02"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 2: Top-Right Geodesic Sphere / Icosahedron Tech Wireframe -->
    <div class="absolute top-6 right-6 sm:right-12 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float-delayed hidden md:block">
        <svg class="w-20 h-20 sm:w-28 sm:h-28" viewBox="0 0 100 100" fill="none">
            <circle cx="50" cy="50" r="40" stroke="url(#mv-sphere-grad)" stroke-width="1.5"/>
            <ellipse cx="50" cy="50" rx="40" ry="16" stroke="url(#mv-sphere-grad)" stroke-width="1" stroke-dasharray="3 3"/>
            <ellipse cx="50" cy="50" rx="16" ry="40" stroke="url(#mv-sphere-grad)" stroke-width="1" stroke-dasharray="3 3"/>
            <polygon points="50,10 82,30 82,70 50,90 18,70 18,30" stroke="url(#mv-sphere-grad)" stroke-width="1" opacity="0.6"/>
            <circle cx="50" cy="50" r="4" fill="#00D2FF" fill-opacity="0.8"/>
            <defs>
                <linearGradient id="mv-sphere-grad" x1="10" y1="10" x2="90" y2="90" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 3: Bottom-Right Outer Corner Layered Torus Ring -->
    <div class="absolute -bottom-8 -right-8 sm:bottom-6 sm:right-10 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float-delayed hidden sm:block">
        <svg class="w-24 h-24 sm:w-32 sm:h-32" viewBox="0 0 120 120" fill="none">
            <ellipse cx="60" cy="60" rx="48" ry="24" transform="rotate(40 60 60)" stroke="url(#mv-torus-grad)" stroke-width="1.5"/>
            <ellipse cx="60" cy="60" rx="48" ry="24" transform="rotate(-20 60 60)" stroke="url(#mv-torus-grad)" stroke-width="1" stroke-dasharray="3 3" opacity="0.6"/>
            <circle cx="60" cy="60" r="16" stroke="url(#mv-torus-grad)" stroke-width="1.5" fill="#00D2FF" fill-opacity="0.08"/>
            <circle cx="35" cy="80" r="3" fill="#007BFF"/>
            <defs>
                <linearGradient id="mv-torus-grad" x1="12" y1="36" x2="108" y2="84" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 4: Bottom-Left 4-Point Astroid Star -->
    <div class="absolute bottom-4 left-6 sm:left-14 pointer-events-none -z-0 opacity-15 sm:opacity-25 animate-float hidden lg:block">
        <svg class="w-14 h-14 sm:w-18 sm:h-18" viewBox="0 0 80 80" fill="none">
            <path d="M40 6 Q40 40 74 40 Q40 40 40 74 Q40 40 6 40 Q40 40 40 6 Z" fill="url(#mv-star-grad)" stroke="url(#mv-star-stroke)" stroke-width="1.5"/>
            <defs>
                <linearGradient id="mv-star-grad" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.2"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.05"/>
                </linearGradient>
                <linearGradient id="mv-star-stroke" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Mission -->
            <div class="p-8 sm:p-10 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 space-y-4 group spotlight-card reveal-left">
                <div class="w-12 h-12 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center border border-[#007BFF]/20 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-[#0F172A] font-heading group-hover:text-[#007BFF] transition-colors">Our Mission</h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    To build intelligent, reliable, and high-concurrency technology solutions that automate operations, eliminate manual bottlenecks, and unlock scalable growth for ambitious businesses globally.
                </p>
            </div>

            <!-- Vision -->
            <div class="p-8 sm:p-10 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 space-y-4 group spotlight-card reveal-right">
                <div class="w-12 h-12 rounded-xl bg-[#00D2FF]/15 text-[#007BFF] flex items-center justify-center border border-[#00D2FF]/30 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-[#0F172A] font-heading group-hover:text-[#007BFF] transition-colors">Our Vision</h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    To be the premier trusted global software engineering and business automation partner recognized for pristine code quality, rock-solid 99.9% reliability, and measurable client ROI.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- The ZARO Philosophy -->
<section class="py-24 bg-[#F8FAFC] border-b border-slate-200/80 relative overflow-hidden">
    <!-- ==================== DECORATIVE SHAPES ==================== -->
    <!-- Shape 1: Left Background 3D Cylinder / Prism Wireframe -->
    <div class="absolute top-20 -left-6 sm:left-8 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float hidden lg:block">
        <svg class="w-20 h-24 sm:w-28 sm:h-32" viewBox="0 0 100 120" fill="none">
            <ellipse cx="50" cy="25" rx="35" ry="15" stroke="url(#zaro-cyl-grad)" stroke-width="1.5" fill="url(#zaro-cyl-fill)"/>
            <ellipse cx="50" cy="95" rx="35" ry="15" stroke="url(#zaro-cyl-grad)" stroke-width="1.5"/>
            <line x1="15" y1="25" x2="15" y2="95" stroke="url(#zaro-cyl-grad)" stroke-width="1.5"/>
            <line x1="85" y1="25" x2="85" y2="95" stroke="url(#zaro-cyl-grad)" stroke-width="1.5"/>
            <ellipse cx="50" cy="60" rx="35" ry="15" stroke="url(#zaro-cyl-grad)" stroke-width="1" stroke-dasharray="3 3" opacity="0.45"/>
            <circle cx="50" cy="25" r="3" fill="#007BFF"/>
            <defs>
                <linearGradient id="zaro-cyl-grad" x1="15" y1="10" x2="85" y2="110" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
                <linearGradient id="zaro-cyl-fill" x1="50" y1="10" x2="50" y2="40" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.12"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.03"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 2: Right Background 8-Point Rounded Astroid Star -->
    <div class="absolute top-16 -right-6 sm:right-10 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float-delayed hidden lg:block">
        <svg class="w-18 h-18 sm:w-24 sm:h-24" viewBox="0 0 80 80" fill="none">
            <path d="M40 6 Q40 40 74 40 Q40 40 40 74 Q40 40 6 40 Q40 40 40 6 Z" fill="url(#zaro-astroid-grad)" stroke="url(#zaro-astroid-stroke)" stroke-width="1.5"/>
            <circle cx="40" cy="40" r="6" fill="#007BFF" fill-opacity="0.6"/>
            <circle cx="40" cy="40" r="2.5" fill="white"/>
            <defs>
                <linearGradient id="zaro-astroid-grad" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.18"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.05"/>
                </linearGradient>
                <linearGradient id="zaro-astroid-stroke" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 3: Center Bottom 3D Pyramid / Tetrahedron Wireframe -->
    <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 pointer-events-none -z-0 opacity-15 sm:opacity-25 animate-float hidden md:block">
        <svg class="w-20 h-20 sm:w-28 sm:h-28" viewBox="0 0 100 100" fill="none">
            <polygon points="50,15 85,75 15,75" stroke="url(#zaro-tetra-grad)" stroke-width="1.5" fill="none"/>
            <line x1="50" y1="15" x2="50" y2="60" stroke="url(#zaro-tetra-grad)" stroke-width="1.5"/>
            <line x1="15" y1="75" x2="50" y2="60" stroke="url(#zaro-tetra-grad)" stroke-width="1.5"/>
            <line x1="85" y1="75" x2="50" y2="60" stroke="url(#zaro-tetra-grad)" stroke-width="1.5"/>
            <circle cx="50" cy="60" r="3" fill="#00D2FF"/>
            <defs>
                <linearGradient id="zaro-tetra-grad" x1="15" y1="15" x2="85" y2="75" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 4: Left Side Micro-plus Grid -->
    <div class="absolute bottom-16 left-6 pointer-events-none -z-0 opacity-20 text-[#007BFF] font-mono text-sm hidden xl:block select-none">
        <div>+ &nbsp; +</div>
        <div>+ &nbsp; +</div>
    </div>

    <!-- Shape 5: Right Side Micro-plus Grid -->
    <div class="absolute bottom-16 right-6 pointer-events-none -z-0 opacity-20 text-[#00D2FF] font-mono text-sm hidden xl:block select-none">
        <div>+ &nbsp; +</div>
        <div>+ &nbsp; +</div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                CORE BRAND PILLARS
            </div>
            <h2 class="text-3xl sm:text-4xl font-black text-[#0F172A] font-heading">
                The <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">ZARO</span> Engineering Principles
            </h2>
            <p class="text-slate-600 text-sm sm:text-base">
                Each letter in our brand represents an uncompromising standard in how we architect, test, and deliver code.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-7 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="0">
                <span class="text-3xl font-black text-[#007BFF] font-mono">01 / Z</span>
                <h3 class="text-lg font-bold text-[#0F172A]">Zenith Quality</h3>
                <p class="text-xs font-bold text-[#007BFF] font-mono">Pristine Architecture</p>
                <p class="text-xs text-slate-600 leading-relaxed">
                    We adhere to the highest international standards of code craftsmanship, continuous automated testing, and zero technical debt.
                </p>
            </div>

            <div class="p-7 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="100">
                <span class="text-3xl font-black text-[#00D2FF] font-mono">02 / A</span>
                <h3 class="text-lg font-bold text-[#0F172A]">Automation</h3>
                <p class="text-xs font-bold text-[#007BFF] font-mono">Streamlined Operations</p>
                <p class="text-xs text-slate-600 leading-relaxed">
                    We eliminate error-prone manual spreadsheets and disconnected silos by engineering unified, end-to-end automated pipelines.
                </p>
            </div>

            <div class="p-7 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="200">
                <span class="text-3xl font-black text-[#007BFF] font-mono">03 / R</span>
                <h3 class="text-lg font-bold text-[#0F172A]">Reliability</h3>
                <p class="text-xs font-bold text-[#007BFF] font-mono">99.9% Uptime Guarantee</p>
                <p class="text-xs text-slate-600 leading-relaxed">
                    No downtime surprises. We engineer resilient systems backed by containerized cloud environments and automated backup snapshots.
                </p>
            </div>

            <div class="p-7 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="300">
                <span class="text-3xl font-black text-[#00D2FF] font-mono">04 / O</span>
                <h3 class="text-lg font-bold text-[#0F172A]">Optimization</h3>
                <p class="text-xs font-bold text-[#007BFF] font-mono">Speed & Scalable ROI</p>
                <p class="text-xs text-slate-600 leading-relaxed">
                    We optimize for sub-second database query execution, efficient server scaling, and measurable financial return on investment.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 4 Team (founders first, then core team) -->
<section class="py-24 bg-[#0F172A] relative overflow-hidden" id="team">
    <!-- ==================== AMBIENT BACKDROP ==================== -->
    <div class="absolute inset-0 bg-grid-pattern opacity-40 pointer-events-none"></div>
    <div class="absolute -top-24 -left-24 w-[28rem] h-[28rem] rounded-full bg-[#007BFF]/10 blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-24 w-[26rem] h-[26rem] rounded-full bg-[#00D2FF]/10 blur-[120px] pointer-events-none"></div>

    <!-- ==================== DECORATIVE SHAPES ==================== -->
    <!-- Shape 1: Top-Right Outer Corner Faceted Diamond / Octahedron -->
    <div class="absolute top-10 right-8 sm:right-16 pointer-events-none z-0 opacity-30 sm:opacity-40 animate-float hidden sm:block">
        <svg class="w-18 h-18 sm:w-24 sm:h-24" viewBox="0 0 100 100" fill="none">
            <polygon points="50,12 85,45 50,88 15,45" stroke="url(#team-octa-grad)" stroke-width="1.5" fill="url(#team-octa-fill)"/>
            <line x1="15" y1="45" x2="85" y2="45" stroke="url(#team-octa-grad)" stroke-width="1.5"/>
            <line x1="50" y1="12" x2="50" y2="88" stroke="url(#team-octa-grad)" stroke-width="1" stroke-dasharray="2 3"/>
            <circle cx="50" cy="45" r="3" fill="#00D2FF"/>
            <defs>
                <linearGradient id="team-octa-grad" x1="15" y1="12" x2="85" y2="88" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF"/>
                    <stop offset="1" stop-color="#00D2FF"/>
                </linearGradient>
                <linearGradient id="team-octa-fill" x1="50" y1="12" x2="50" y2="88" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#007BFF" stop-opacity="0.18"/>
                    <stop offset="1" stop-color="#00D2FF" stop-opacity="0.03"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 2: Bottom-Left Outer Corner 4-Point Astroid Star -->
    <div class="absolute bottom-10 left-6 sm:left-14 pointer-events-none z-0 opacity-30 sm:opacity-40 animate-float-delayed hidden sm:block">
        <svg class="w-16 h-16 sm:w-20 sm:h-20" viewBox="0 0 100 100" fill="none">
            <path d="M50 10 C50 32, 68 50, 90 50 C68 50, 50 68, 50 90 C50 68, 32 50, 10 50 C32 50, 50 32, 50 10 Z" fill="url(#team-star-grad)" stroke="url(#team-star-stroke)" stroke-width="1.5"/>
            <circle cx="50" cy="50" r="6" fill="#00D2FF" fill-opacity="0.6"/>
            <circle cx="50" cy="50" r="2.5" fill="white"/>
            <defs>
                <linearGradient id="team-star-grad" x1="10" y1="10" x2="90" y2="90" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF" stop-opacity="0.25"/>
                    <stop offset="1" stop-color="#007BFF" stop-opacity="0.05"/>
                </linearGradient>
                <linearGradient id="team-star-stroke" x1="10" y1="10" x2="90" y2="90" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Split Header -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-14 sm:mb-16">
            <div class="space-y-4 max-w-2xl reveal">
                <div class="inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.28em] text-[#00D2FF] font-heading">
                    <span class="h-px w-8 bg-gradient-to-r from-[#007BFF] to-[#00D2FF]"></span>
                    Our Team
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white font-heading leading-[1.1]">
                    Meet the <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Team</span>
                </h2>
            </div>
            <p class="text-slate-400 text-sm sm:text-base max-w-md lg:text-right reveal" data-delay="120">
                The founders, engineers and designers who architect, build and support every system we ship.
            </p>
        </div>

        @php
            // Staggered "scattered" masonry rhythm. Heights cycle so no two
            // neighbours match; the vertical offset is applied to the first row
            // only, otherwise later rows inherit a gap that reads as a mistake.
            $teamLayouts = [
                ['offset' => 'lg:mt-0',  'height' => 'h-[340px] sm:h-[370px]'],
                ['offset' => 'lg:mt-16', 'height' => 'h-[310px] sm:h-[335px]'],
                ['offset' => 'lg:mt-6',  'height' => 'h-[360px] sm:h-[390px]'],
                ['offset' => 'lg:mt-24', 'height' => 'h-[320px] sm:h-[345px]'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 lg:gap-7 items-start">
            @foreach($team as $index => $founder)
            @php
                $layout = $teamLayouts[$index % count($teamLayouts)];
                $layout['offset'] = $index < 4 ? $layout['offset'] : 'lg:mt-0';
            @endphp

            <article class="group {{ $layout['offset'] }} reveal" data-delay="{{ $index * 110 }}">
                <div class="relative {{ $layout['height'] }} rounded-2xl overflow-hidden bg-[#0B132B] border border-white/10 transition-all duration-500 ease-out group-hover:-translate-y-2 group-hover:border-[#007BFF]/45 group-hover:shadow-[0_28px_60px_-24px_rgba(0,123,255,0.55)]">

                    <!-- Portrait (monochrome by default, full colour on hover) -->
                    @if($founder->avatar_url)
                    <x-picture :src="$founder->avatar" alt="Portrait of {{ $founder->name }}" width="760" height="950"
                         class="absolute inset-0 w-full h-full object-cover object-top grayscale transition-all duration-700 ease-out group-hover:grayscale-0 group-hover:scale-[1.06]" />
                    @else
                    <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-[#132139] to-[#0B132B]" aria-hidden="true">
                        <span class="text-5xl font-black text-white/15 font-heading tracking-tight">{{ $founder->initials }}</span>
                    </div>
                    @endif

                    <!-- Legibility scrim + brand wash on hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#050A16] via-[#050A16]/55 to-[#050A16]/10"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#007BFF]/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <!-- Index marker -->
                    <span class="absolute top-4 left-4 text-[10px] font-mono font-bold tracking-[0.2em] text-white/45 group-hover:text-[#00D2FF] transition-colors">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <!-- Role pill -->
                    <span class="absolute top-4 right-4 px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider font-mono bg-white/10 text-white/80 backdrop-blur-sm border border-white/15 transition-colors group-hover:bg-[#007BFF] group-hover:text-white group-hover:border-[#007BFF]">
                        {{ $founder->is_founder ? 'Co-Founder' : ($founder->role_title ?: 'Core Team') }}
                    </span>

                    <!-- Identity block -->
                    <div class="absolute inset-x-0 bottom-0 p-5">
                        <h3 class="text-base sm:text-lg font-bold text-white font-heading leading-tight">{{ $founder->name }}</h3>
                        <p class="mt-1 text-[11px] font-semibold text-[#00D2FF] font-mono leading-snug line-clamp-2">{{ $founder->designation }}</p>

                        <!-- Expanding detail drawer: always open on touch devices, hover/focus driven for mouse pointers -->
                        <div class="grid grid-rows-[1fr] pointer-fine:grid-rows-[0fr] pointer-fine:group-hover:grid-rows-[1fr] pointer-fine:group-focus-within:grid-rows-[1fr] transition-[grid-template-rows] duration-500 ease-out">
                            <div class="overflow-hidden">
                                <p class="mt-3 text-[11px] leading-relaxed text-slate-300 line-clamp-3">
                                    {{ $founder->bio }}
                                </p>

                                @if($founder->skills && is_array($founder->skills))
                                <div class="flex flex-wrap gap-1 mt-3">
                                    @foreach(array_slice($founder->skills, 0, 3) as $skill)
                                    <span class="text-[9px] px-2 py-0.5 rounded bg-white/10 text-slate-200 font-mono font-medium border border-white/10">
                                        {{ $skill }}
                                    </span>
                                    @endforeach
                                </div>
                                @endif

                                <div class="flex items-center gap-2 mt-4">
                                    @if($founder->linkedin_url)
                                    <a href="{{ $founder->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#007BFF] hover:border-[#007BFF] hover:text-white transition-colors" aria-label="LinkedIn profile of {{ $founder->name }}">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                    @endif
                                    @if($founder->github_url)
                                    <a href="{{ $founder->github_url }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#007BFF] hover:border-[#007BFF] hover:text-white transition-colors" aria-label="GitHub profile of {{ $founder->name }}">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                                    </a>
                                    @endif
                                    @if($founder->email)
                                    <a href="mailto:{{ $founder->email }}" class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#007BFF] hover:border-[#007BFF] hover:text-white transition-colors" aria-label="Email {{ $founder->name }}">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>


<!-- 5 Client Voices -->
@if($testimonials->isNotEmpty())
<section class="py-20 bg-[#F8FAFC] border-b border-slate-200/80 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-12 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                IN THEIR WORDS
            </div>
            <h2 class="text-2xl sm:text-3xl font-black text-[#0F172A] font-heading">
                What the people we build for say
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testimonials as $index => $testimonial)
            <figure class="p-7 rounded-2xl bg-white border border-slate-200/80 shadow-sm hover:shadow-lg hover:border-[#007BFF]/40 transition-all duration-300 flex flex-col justify-between gap-5 spotlight-card reveal" data-delay="{{ $index * 100 }}">
                <blockquote class="text-xs text-slate-700 leading-relaxed italic">
                    &ldquo;{{ Str::limit($testimonial->quote, 240) }}&rdquo;
                </blockquote>
                <figcaption class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#007BFF] to-[#00D2FF] p-0.5 shrink-0">
                        @if($testimonial->avatar_url)
                        <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->client_name }}" loading="lazy" class="w-full h-full rounded-full object-cover">
                        @else
                        <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-xs font-bold text-[#007BFF]">{{ $testimonial->initials }}</div>
                        @endif
                    </div>
                    <div>
                        <p class="text-xs font-bold text-[#0F172A]">{{ $testimonial->client_name }}</p>
                        <p class="text-[11px] text-slate-500">{{ collect([$testimonial->client_position, $testimonial->company])->filter()->implode(', ') }}</p>
                    </div>
                </figcaption>
            </figure>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA -->
<section class="py-20 bg-[#0B132B] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <!-- ==================== DECORATIVE DARK TECH SHAPES ==================== -->
    <!-- Shape 1: Top-Left Dark Holographic Torus Ring with Radial Glowing Core -->
    <div class="absolute -top-10 -left-10 sm:top-4 sm:left-12 pointer-events-none -z-0 opacity-25 sm:opacity-35 animate-float hidden sm:block">
        <svg class="w-28 h-28 sm:w-36 sm:h-36" viewBox="0 0 140 140" fill="none">
            <ellipse cx="70" cy="70" rx="55" ry="25" transform="rotate(-30 70 70)" stroke="url(#cta-torus-1)" stroke-width="1.75"/>
            <ellipse cx="70" cy="70" rx="55" ry="25" transform="rotate(45 70 70)" stroke="url(#cta-torus-2)" stroke-width="1.25" stroke-dasharray="4 4"/>
            <circle cx="70" cy="70" r="18" stroke="url(#cta-torus-1)" stroke-width="1.5" fill="url(#cta-torus-fill)"/>
            <circle cx="70" cy="70" r="4" fill="#00D2FF"/>
            <defs>
                <linearGradient id="cta-torus-1" x1="15" y1="45" x2="125" y2="95" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
                <linearGradient id="cta-torus-2" x1="15" y1="45" x2="125" y2="95" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#38BDF8"/>
                    <stop offset="1" stop-color="#818CF8"/>
                </linearGradient>
                <radialGradient id="cta-torus-fill" cx="70" cy="70" r="18" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF" stop-opacity="0.3"/>
                    <stop offset="1" stop-color="#007BFF" stop-opacity="0"/>
                </radialGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 2: Bottom-Right Dark Holographic Wireframe Cube with Vertex Nodes -->
    <div class="absolute -bottom-10 -right-10 sm:bottom-4 sm:right-14 pointer-events-none -z-0 opacity-25 sm:opacity-35 animate-float-delayed hidden sm:block">
        <svg class="w-24 h-24 sm:w-32 sm:h-32" viewBox="0 0 100 100" fill="none">
            <path d="M50 12 L85 32 L85 68 L50 88 L15 68 L15 32 Z" stroke="url(#cta-cube-grad)" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M50 12 L50 50 L85 68" stroke="url(#cta-cube-grad)" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M50 50 L15 68" stroke="url(#cta-cube-grad)" stroke-width="1.5" stroke-linejoin="round"/>
            <circle cx="50" cy="50" r="3" fill="#00D2FF"/>
            <circle cx="50" cy="12" r="2.5" fill="#38BDF8"/>
            <circle cx="85" cy="32" r="2.5" fill="#00D2FF"/>
            <circle cx="15" cy="32" r="2.5" fill="#007BFF"/>
            <circle cx="50" cy="88" r="2.5" fill="#007BFF"/>
            <defs>
                <linearGradient id="cta-cube-grad" x1="15" y1="12" x2="85" y2="88" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#007BFF"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 3: Center-Right Glowing Cyan 8-Point Astroid Star -->
    <div class="absolute top-1/2 -translate-y-1/2 right-4 sm:right-24 pointer-events-none -z-0 opacity-20 sm:opacity-30 animate-float hidden lg:block">
        <svg class="w-16 h-16 sm:w-20 sm:h-20" viewBox="0 0 80 80" fill="none">
            <path d="M40 6 Q40 40 74 40 Q40 40 40 74 Q40 40 6 40 Q40 40 40 6 Z" fill="url(#cta-star-grad)" stroke="url(#cta-star-stroke)" stroke-width="1.5"/>
            <circle cx="40" cy="40" r="4" fill="#38BDF8"/>
            <defs>
                <linearGradient id="cta-star-grad" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF" stop-opacity="0.3"/>
                    <stop offset="1" stop-color="#007BFF" stop-opacity="0.05"/>
                </linearGradient>
                <linearGradient id="cta-star-stroke" x1="6" y1="6" x2="74" y2="74" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D2FF"/>
                    <stop offset="1" stop-color="#38BDF8"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <!-- Shape 4: Left Side Code Matrix Bracket Glyphs -->
    <div class="absolute top-1/2 -translate-y-1/2 left-6 pointer-events-none -z-0 opacity-20 text-cyan-400 font-mono text-lg hidden xl:block select-none">
        &lt; / &gt;
    </div>

    <div class="absolute inset-0 bg-tech-grid opacity-20 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Ready to Collaborate with Our Engineering Team?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">Tell us about your project challenges. We will schedule a direct consultation call with our founders.</p>
        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Start a Conversation</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection


