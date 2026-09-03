@extends('layouts.app')

@section('title', 'ZaroSoft — Enterprise Software Engineering & Digital Solutions')
@section('meta_description', 'ZaroSoft engineers custom ERPs, scalable SaaS platforms, high-concurrency web & mobile apps, and automated AI pipelines for scaling businesses and global enterprises.')

@section('content')

<!-- ========================================================================= -->
<!-- 01. HERO SECTION (Cinematic Full-Width Video Background with Globe Mesh) -->
<!-- ========================================================================= -->
<section id="hero-section" class="relative overflow-hidden py-20 sm:py-24 lg:py-32 bg-[#060A17] text-white">
    
    <!-- 01. ANIMATED GLOBE BACKDROP (vector — nothing to download) -->
    <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none -z-0">
        <x-hero-backdrop />

        {{-- Scrims are deliberately light: they only need to keep the headline
             legible, not hide the artwork behind it. --}}
        <div class="absolute inset-0 bg-gradient-to-b from-[#060A17]/55 via-transparent to-[#060A17] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_55%_42%_at_50%_45%,_var(--tw-gradient-stops))] from-[#060A17]/90 via-[#060A17]/55 to-transparent pointer-events-none"></div>
        <div class="absolute inset-0 bg-tech-grid opacity-15 pointer-events-none"></div>
        
        <!-- Ambient Glowing Aurora Highlights -->
        <div class="absolute top-1/4 left-1/4 w-[550px] h-[550px] bg-[#007BFF]/25 rounded-full blur-[150px] pointer-events-none animate-aurora-1"></div>
        <div class="absolute bottom-10 right-1/4 w-[500px] h-[500px] bg-[#00D2FF]/20 rounded-full blur-[130px] pointer-events-none animate-aurora-2"></div>
    </div>

    <!-- 02. HERO FOREGROUND CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <div class="max-w-4xl mx-auto space-y-8 reveal">
            
            <!-- Live Tech Pill Badge -->
            <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-xl shadow-lg shadow-blue-500/10">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs font-extrabold uppercase tracking-[0.2em] text-[#38BDF8] font-heading">Enterprise Software Engineering & AI Solutions</span>
            </div>

            <!-- Main Headline with Dynamic Typewriter Effect -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight text-white leading-[1.08] font-heading drop-shadow-2xl">
                Engineering Digital <br class="hidden sm:inline" />
                Products That <br />
                <span x-data="{
                    phrases: ['Scale Without Limits', 'Automate Operations', 'Drive Real Growth', 'Power Enterprises'],
                    phraseIdx: 0,
                    charIdx: 0,
                    displayText: '',
                    isDeleting: false,
                    init() { this.typeLoop(); },
                    typeLoop() {
                        const currentPhrase = this.phrases[this.phraseIdx];
                        if (this.isDeleting) {
                            this.displayText = currentPhrase.substring(0, this.charIdx - 1);
                            this.charIdx--;
                        } else {
                            this.displayText = currentPhrase.substring(0, this.charIdx + 1);
                            this.charIdx++;
                        }
                        let speed = this.isDeleting ? 35 : 75;
                        if (!this.isDeleting && this.charIdx === currentPhrase.length) {
                            speed = 2000;
                            this.isDeleting = true;
                        } else if (this.isDeleting && this.charIdx === 0) {
                            this.isDeleting = false;
                            this.phraseIdx = (this.phraseIdx + 1) % this.phrases.length;
                            speed = 400;
                        }
                        setTimeout(() => this.typeLoop(), speed);
                    }
                }" class="inline-flex items-center justify-center flex-wrap">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00D2FF] via-[#38BDF8] to-[#007BFF] drop-shadow-[0_0_35px_rgba(0,210,255,0.6)]" 
                          x-text="displayText || '\u00A0'">
                        Scale Without Limits
                    </span>
                    <span class="inline-block w-[3px] sm:w-[5px] h-[0.9em] bg-[#00D2FF] ml-1.5 animate-cursor rounded-full shadow-[0_0_12px_rgba(0,210,255,0.9)]"></span>
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-base sm:text-xl text-slate-200 max-w-3xl mx-auto leading-relaxed font-normal drop-shadow">
                ZaroSoft engineers custom ERPs, high-concurrency cloud applications, modern mobile apps, and automated AI pipelines for ambitious businesses and global enterprises.
            </p>

            <!-- Dual Action CTAs -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-3">
                <!-- Primary CTA -->
                <a href="{{ route('contact.index') }}" 
                   class="w-full sm:w-auto px-9 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0052cc] hover:from-[#0062cc] hover:to-[#003d99] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/40 hover:shadow-[#007BFF]/60 hover:scale-[1.02] transition-all btn-premium flex items-center justify-center gap-2 group border border-blue-400/30">
                    <span>Schedule a Consultation</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <!-- Secondary CTA -->
                <a href="{{ route('portfolio.index') }}" 
                   class="w-full sm:w-auto px-8 py-4 rounded-xl bg-white/10 hover:bg-white/15 text-white font-bold text-sm border border-white/20 hover:border-cyan-400/50 shadow-lg backdrop-blur-md hover:scale-[1.02] transition-all flex items-center justify-center gap-2.5">
                    <svg class="w-4 h-4 text-[#00D2FF]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Explore Case Studies</span>
                </a>
            </div>

        </div>

        <!-- 03. TRUST KPI STRIP (figures come from Admin → Settings) -->
        @php
            $heroKpis = [
                [
                    'label' => 'DELIVERY COMMITMENT',
                    'value' => '2-Week Sprints',
                    'note' => 'Working software you can review every fortnight',
                    'accent' => 'text-[#00D2FF]',
                    'dot' => 'bg-[#00D2FF]',
                    'border' => 'hover:border-[#00D2FF]/60',
                ],
                [
                    'label' => 'RELIABILITY TARGET',
                    'value' => setting('stat_uptime', '99.9%') . ' Uptime',
                    'note' => 'High-availability architecture and monitoring',
                    'accent' => 'text-emerald-400',
                    'dot' => 'bg-emerald-400',
                    'border' => 'hover:border-emerald-400/60',
                ],
                [
                    'label' => 'PROJECTS DELIVERED',
                    'value' => setting('stat_projects_completed', '45+'),
                    'note' => 'Across ERP, web, mobile and AI engagements',
                    'accent' => 'text-[#38BDF8]',
                    'dot' => 'bg-[#38BDF8]',
                    'border' => 'hover:border-[#007BFF]/60',
                ],
                [
                    'label' => 'SUPPORT WINDOW',
                    'value' => setting('stat_support', '24/7'),
                    'note' => setting('working_hours', 'Escalation cover for live systems'),
                    'accent' => 'text-purple-400',
                    'dot' => 'bg-purple-400',
                    'border' => 'hover:border-purple-400/60',
                ],
            ];
        @endphp
        <div class="pt-14 grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 max-w-5xl mx-auto text-left reveal">
            @foreach($heroKpis as $kpi)
            <div class="p-4 sm:p-5 rounded-2xl bg-[#090E20]/80 border border-slate-700/60 backdrop-blur-xl shadow-xl {{ $kpi['border'] }} transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center gap-2 {{ $kpi['accent'] }} text-[11px] font-mono font-bold mb-1.5">
                    <span class="w-2 h-2 rounded-full {{ $kpi['dot'] }}"></span>
                    <span>{{ $kpi['label'] }}</span>
                </div>
                <div class="text-xl sm:text-2xl font-black text-white font-heading">{{ $kpi['value'] }}</div>
                <div class="text-xs text-slate-400 mt-1">{{ $kpi['note'] }}</div>
            </div>
            @endforeach
        </div>

        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- 02. CLIENT LOGO STRIP (Infinite Scrolling Ticker) -->
<!-- ========================================================================= -->
@if($clientLogos->isNotEmpty())
<section class="py-16 sm:py-20 border-y border-slate-200/80 bg-white relative overflow-hidden">

    {{-- Faint brand wash so the band reads as a section, not a spacer. --}}
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-[#007BFF]/30 to-transparent" aria-hidden="true"></div>
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[38rem] h-[20rem] bg-[#007BFF]/5 blur-[100px] rounded-full pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 relative z-10">
        <div class="flex justify-center reveal">
            <h2 class="inline-flex items-center gap-3 text-[11px] sm:text-xs font-bold uppercase tracking-[0.28em] text-[#007BFF] font-heading">
                <span class="h-px w-10 sm:w-16 bg-gradient-to-r from-transparent to-[#007BFF]"></span>
                Our Clients
                <span class="h-px w-10 sm:w-16 bg-gradient-to-l from-transparent to-[#007BFF]"></span>
            </h2>
        </div>
    </div>

    {{-- Logos are duplicated once so the marquee loops without a visible seam.
         Each logo keeps its own brand colours. --}}
    <div class="relative w-full overflow-hidden [mask-image:linear-gradient(to_right,transparent,white_12%,white_88%,transparent)]">
        <div class="animate-marquee flex items-center gap-12 sm:gap-16 py-2">
            @foreach($clientLogos->concat($clientLogos) as $i => $client)
            <div @class(['shrink-0 flex items-center justify-center h-16 sm:h-20', 'marquee-clone' => $i >= $clientLogos->count()])
                 @if($i >= $clientLogos->count()) aria-hidden="true" @endif>
                <img src="{{ $client->logo_url }}"
                     alt="{{ $i < $clientLogos->count() ? $client->name : '' }}"
                     loading="lazy" decoding="async"
                     class="max-h-full w-auto max-w-[200px] object-contain hover:scale-105 transition-transform duration-300">
            </div>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 flex justify-center relative z-10">
        <a href="{{ route('portfolio.index') }}"
           class="group inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white hover:bg-[#007BFF] text-[#0F172A] hover:text-white text-xs font-bold border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-lg hover:shadow-[#007BFF]/20 hover:-translate-y-0.5 transition-all">
            <span>See what we built for them</span>
            <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">→</span>
        </a>
    </div>
</section>
@endif

<!-- ========================================================================= -->
<!-- 03. SERVICES ECOSYSTEM (Bento Grid & Differentiated Capabilities) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-[#F8FAFC] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16 reveal">
            <div class="space-y-3 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                    WHAT WE ENGINEER
                </div>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-[#0F172A] font-heading">
                    End-to-End Capabilities <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Built For Performance</span>
                </h2>
            </div>

            <div class="space-y-4 max-w-lg lg:text-right flex flex-col lg:items-end">
                <p class="text-sm text-slate-600 leading-relaxed">
                    We combine clean software architecture with modern UX to help startups, SMEs & enterprises build scalable digital solutions.
                </p>
                <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold text-[#0F172A] bg-white hover:bg-[#007BFF] hover:text-white border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                    <span>Explore All {{ $activeServiceCount }} Services</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Featured Capabilities (driven by Admin → Services) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($featuredServices as $index => $service)
            <div class="p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between spotlight-card reveal group" data-delay="{{ ($index % 3) * 100 }}">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#007BFF]/15 to-[#00D2FF]/20 text-[#007BFF] flex items-center justify-center border border-[#007BFF]/25 group-hover:scale-105 transition-transform">
                        <x-icon :name="$service->icon" class="w-6 h-6" />
                    </div>
                    <div>
                        @if($service->badge)
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#007BFF] font-mono">{{ $service->badge }}</span>
                        @endif
                        <h3 class="text-lg font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors font-heading mt-0.5">
                            {{ $service->title }}
                        </h3>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        {{ Str::limit($service->short_description, 165) }}
                    </p>
                    @if($service->tech_stack && is_array($service->tech_stack))
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        @foreach(array_slice($service->tech_stack, 0, 3) as $tech)
                        <span class="px-2 py-0.5 rounded text-[10px] font-mono font-medium bg-slate-100 text-slate-700">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] group-hover:text-[#0052b3] group-hover:translate-x-1 transition-all">
                        <span>Explore {{ $service->title }}</span>
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            @empty
            <p class="col-span-full text-sm text-slate-500">No featured services published yet.</p>
            @endforelse
        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- 04. FEATURED PORTFOLIO & CASE STUDIES (Case Study Architecture) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-white border-t border-slate-200/80 relative overflow-hidden" x-data="{ activeFilter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-14 reveal">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                    FEATURED CASE STUDIES
                </div>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-[#0F172A] font-heading">
                    Real Engineering Impact & <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Measurable Client Results</span>
                </h2>
                <p class="text-sm text-slate-600 max-w-lg">
                    Discover how we build high-concurrency systems, automate complex enterprise workflows, and deliver measurable bottom-line growth.
                </p>
            </div>

            <!-- Filter tabs, derived from the categories actually represented -->
            @php
                $projectFilters = $featuredProjects
                    ->pluck('category')
                    ->filter()
                    ->unique('id')
                    ->values();
            @endphp
            @if($projectFilters->count() > 1)
            <div class="flex flex-wrap items-center gap-2">
                <button @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    All Case Studies
                </button>
                @foreach($projectFilters as $filter)
                <button @click="activeFilter = '{{ $filter->slug }}'"
                        :class="activeFilter === '{{ $filter->slug }}' ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    {{ $filter->name }}
                </button>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Featured case studies (driven by Admin → Projects) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($featuredProjects as $index => $project)
            <div x-show="activeFilter === 'all' || activeFilter === '{{ $project->category?->slug }}'"
                 x-transition.opacity.duration.300ms
                 class="rounded-2xl bg-white border border-slate-200/90 hover:border-[#007BFF]/50 shadow-md hover:shadow-2xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between spotlight-card group overflow-hidden reveal" data-delay="{{ ($index % 2) * 100 }}">
                <div class="relative h-56 sm:h-64 overflow-hidden bg-slate-900">
                    @if($project->thumbnail_url)
                    <x-picture :src="$project->thumbnail" :alt="$project->title" width="1200" height="675" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-[#132139] to-[#0B132B]" aria-hidden="true"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F172A] via-[#0F172A]/30 to-transparent"></div>
                    @if($project->category)
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#007BFF] text-white shadow-md">
                            {{ $project->category->name }}
                        </span>
                    </div>
                    @endif
                    <div class="absolute bottom-4 left-4 right-4">
                        <span class="text-xs font-semibold text-cyan-300 font-mono">{{ $project->client_name }}</span>
                        <h3 class="text-lg font-bold text-white mt-0.5">{{ $project->title }}</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <p class="text-xs text-slate-600 leading-relaxed">
                        {{ Str::limit($project->tagline ?: $project->overview, 175) }}
                    </p>

                    @if($project->results && is_array($project->results) && count($project->results))
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                        <p class="text-[10px] uppercase font-mono text-slate-500">Business Result</p>
                        <p class="text-xs font-bold text-emerald-600 mt-0.5">{{ $project->results[0] }}</p>
                    </div>
                    @endif

                    <div class="flex flex-wrap items-center justify-between gap-2 pt-2 border-t border-slate-100">
                        <div class="flex flex-wrap gap-1.5">
                            @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                            <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-slate-100 text-slate-600">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="text-xs font-bold text-[#007BFF] group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                            <span>Read Case Study</span>
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <p class="col-span-full text-sm text-slate-500">No featured case studies published yet.</p>
            @endforelse
        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- 05. KEY STATS STRIP (High-Contrast Dark Navy Contrast Anchor) -->
<!-- ========================================================================= -->
@php
    // Figures are edited in Admin → Settings. Each value is stored as a single
    // string ("45+", "99.9%"), so split it into the number the counter animates
    // and the suffix that trails it.
    $statCards = [
        ['key' => 'stat_happy_clients',      'fallback' => '30+',   'label' => 'Happy Clients',      'accent' => 'blue',    'icon' => 'users'],
        ['key' => 'stat_projects_completed', 'fallback' => '45+',   'label' => 'Projects Delivered', 'accent' => 'blue',    'icon' => 'shield-check'],
        ['key' => 'stat_team_experience',    'fallback' => '7+',    'label' => 'Years of Practice',  'accent' => 'blue',    'icon' => 'award'],
        ['key' => 'stat_uptime',             'fallback' => '99.9%', 'label' => 'System SLA Uptime',  'accent' => 'emerald', 'icon' => 'activity'],
        ['key' => 'stat_support',            'fallback' => '24/7',  'label' => 'Support Available',  'accent' => 'blue',    'icon' => 'cpu'],
    ];

    $stats = collect($statCards)->map(function ($card) {
        $raw = (string) setting($card['key'], $card['fallback']);
        preg_match('/^([0-9]+(?:\.[0-9]+)?)(.*)$/', trim($raw), $parts);

        return $card + [
            'raw' => $raw,
            'number' => $parts[1] ?? null,
            'suffix' => trim($parts[2] ?? ''),
        ];
    });
@endphp
<section class="py-16 bg-[#0B132B] border-y border-slate-800 relative overflow-hidden text-white">
    <div class="absolute inset-0 bg-tech-grid pointer-events-none opacity-20"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-slate-800">
            @foreach($stats as $index => $stat)
            <div class="flex items-center justify-center gap-3.5 pt-4 md:pt-0 reveal-scale" data-delay="{{ $index * 100 }}">
                <div @class([
                    'w-12 h-12 rounded-xl flex items-center justify-center shrink-0 shadow-lg border',
                    'bg-[#007BFF]/20 text-[#38BDF8] border-[#007BFF]/30' => $stat['accent'] === 'blue',
                    'bg-emerald-500/20 text-emerald-400 border-emerald-500/30' => $stat['accent'] === 'emerald',
                ])>
                    <x-icon :name="$stat['icon']" class="w-6 h-6" />
                </div>
                <div class="text-left">
                    <p class="text-2xl sm:text-3xl font-black text-white font-heading"
                       @if($stat['number']) data-counter="{{ $stat['number'] }}" data-suffix="{{ $stat['suffix'] }}" @endif>
                        {{ $stat['raw'] }}
                    </p>
                    <p class="text-xs font-semibold text-slate-400">{{ $stat['label'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 06. WHY CHOOSE ZAROSOFT — THE ZARO FRAMEWORK -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-[#F8FAFC] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: The 4 ZARO Pillars -->
            <div class="lg:col-span-7 space-y-6 reveal-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                    THE ZAROSOFT ADVANTAGE
                </div>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-[#0F172A] font-heading">
                    Why Leading Companies <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Trust Our Engineering</span>
                </h2>
                <p class="text-sm text-slate-600 leading-relaxed max-w-xl">
                    We don't just write code; we partner with ambitious leadership teams to eliminate operational bottlenecks and build resilient, long-term digital infrastructure.
                </p>

                <!-- 4 ZARO Framework Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    
                    <!-- Z — Zenith Quality -->
                    <div class="p-4 rounded-xl bg-white border border-slate-200/90 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all group">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-black text-xs font-mono border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white transition-colors">
                                Z
                            </div>
                            <h4 class="text-sm font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors font-heading">Zenith Quality</h4>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Pristine clean code architectures, strict automated tests, and pixel-perfect design standards.
                        </p>
                    </div>

                    <!-- A — Automation -->
                    <div class="p-4 rounded-xl bg-white border border-slate-200/90 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all group">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-black text-xs font-mono border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white transition-colors">
                                A
                            </div>
                            <h4 class="text-sm font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors font-heading">Automation Focus</h4>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Eliminating manual data entry, human error bottlenecks, and disconnected spreadsheet silos.
                        </p>
                    </div>

                    <!-- R — Reliability -->
                    <div class="p-4 rounded-xl bg-white border border-slate-200/90 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all group">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-black text-xs font-mono border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white transition-colors">
                                R
                            </div>
                            <h4 class="text-sm font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors font-heading">Reliable Systems</h4>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            99.9% uptime SLA, automated backup snapshots, and enterprise-grade security protocols.
                        </p>
                    </div>

                    <!-- O — Optimization -->
                    <div class="p-4 rounded-xl bg-white border border-slate-200/90 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all group">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-black text-xs font-mono border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white transition-colors">
                                O
                            </div>
                            <h4 class="text-sm font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors font-heading">Optimization & ROI</h4>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Sub-second database query execution, efficient server scaling, and clear return on investment.
                        </p>
                    </div>

                </div>
            </div>

            <!-- Right Column: Engineering Methodology & Team Visual -->
            <div class="lg:col-span-5 relative reveal-right">
                <div class="relative rounded-2xl overflow-hidden border border-slate-200/80 bg-[#0B132B] shadow-2xl p-6 text-white space-y-5">
                    
                    <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                        <div class="flex items-center gap-2.5">
                            <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs font-mono font-bold text-slate-300">Agile Engineering Protocol</span>
                        </div>
                        <span class="text-[10px] font-mono font-semibold px-2 py-0.5 rounded bg-[#007BFF]/20 text-[#38BDF8] border border-[#007BFF]/30">
                            Sprint 2.4 Active
                        </span>
                    </div>

                    <!-- 4-Step Agile Delivery Visual -->
                    <div class="space-y-3.5">
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-900/80 border border-slate-800">
                            <div class="w-6 h-6 rounded-full bg-[#007BFF]/20 text-[#38BDF8] flex items-center justify-center text-xs font-bold font-mono shrink-0">1</div>
                            <div>
                                <h5 class="text-xs font-bold text-white">Discovery & Architecture Blueprint</h5>
                                <p class="text-[11px] text-slate-400 mt-0.5">Deep workflow discovery and data schema modeling.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-900/80 border border-slate-800">
                            <div class="w-6 h-6 rounded-full bg-[#007BFF]/20 text-[#38BDF8] flex items-center justify-center text-xs font-bold font-mono shrink-0">2</div>
                            <div>
                                <h5 class="text-xs font-bold text-white">2-Week Demonstration Sprints</h5>
                                <p class="text-[11px] text-slate-400 mt-0.5">Bi-weekly live demo deployments on private staging servers.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-900/80 border border-slate-800">
                            <div class="w-6 h-6 rounded-full bg-[#007BFF]/20 text-[#38BDF8] flex items-center justify-center text-xs font-bold font-mono shrink-0">3</div>
                            <div>
                                <h5 class="text-xs font-bold text-white">Automated QA & Security Audits</h5>
                                <p class="text-[11px] text-slate-400 mt-0.5">Stress testing, penetration tests, and database indexing.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-900/80 border border-slate-800">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xs font-bold font-mono shrink-0">4</div>
                            <div>
                                <h5 class="text-xs font-bold text-white">Production Launch & 24/7 SLA</h5>
                                <p class="text-[11px] text-slate-400 mt-0.5">Smooth data migration, team training, and cloud monitoring.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 flex items-center justify-between text-xs text-slate-400 border-t border-slate-800">
                        <span class="text-[11px] font-mono">HQ: Software Tech Park, Dhaka</span>
                        <a href="{{ route('about') }}" class="text-xs font-bold text-[#38BDF8] hover:text-white inline-flex items-center gap-1">
                            <span>Meet our team</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 07. CLIENT TESTIMONIALS & AUTHENTIC REVIEWS -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                VERIFIED CLIENT TESTIMONIALS
            </div>
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-[#0F172A] font-heading">
                Trusted by Founders & <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Enterprise Executives</span>
            </h2>
            <p class="text-sm text-slate-600">
                Here is what our clients have to say about our code quality, on-time delivery, and ongoing technical support.
            </p>
        </div>

        <!-- Client reviews (driven by Admin → Testimonials) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($testimonials->take(3) as $index => $testimonial)
            <div class="p-8 rounded-2xl bg-white border border-slate-200/90 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between space-y-6 spotlight-card reveal" data-delay="{{ $index * 120 }}">
                <div class="space-y-4">
                    @php $rating = max(1, min(5, (int) ($testimonial->rating ?: 5))); @endphp
                    <div class="flex items-center gap-1 text-amber-400" role="img" aria-label="{{ $rating }} out of 5 stars">
                        @for($star = 1; $star <= 5; $star++)
                        <svg @class(['w-4 h-4', 'fill-current' => $star <= $rating, 'text-slate-200 fill-current' => $star > $rating]) viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <blockquote class="text-xs text-slate-700 leading-relaxed italic font-normal">
                        &ldquo;{{ $testimonial->quote }}&rdquo;
                    </blockquote>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#007BFF] to-[#00D2FF] p-0.5 shrink-0">
                        @if($testimonial->avatar_url)
                        <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->client_name }}" loading="lazy" class="w-full h-full rounded-full object-cover">
                        @else
                        <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-xs font-bold text-[#007BFF]">
                            {{ $testimonial->initials }}
                        </div>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#0F172A]">{{ $testimonial->client_name }}</h4>
                        <p class="text-[11px] text-slate-500">
                            {{ collect([$testimonial->client_position, $testimonial->company])->filter()->implode(', ') }}
                        </p>
                        @if($testimonial->location)
                        <p class="text-[10px] text-slate-400 font-mono">{{ $testimonial->location }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <p class="col-span-full text-sm text-slate-500">No client reviews published yet.</p>
            @endforelse
        </div>
        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- 08. INSIGHTS & COMMON QUESTIONS -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-white border-t border-slate-200/80 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            <!-- Latest articles -->
            <div class="lg:col-span-7 space-y-8">
                <div class="flex items-end justify-between gap-6 reveal">
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                            ENGINEERING INSIGHTS
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-[#0F172A] font-heading">
                            Notes from the <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">build floor</span>
                        </h2>
                    </div>
                    <a href="{{ route('blog.index') }}" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#0052b3] shrink-0">
                        <span>All articles</span>
                        <span aria-hidden="true">→</span>
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($latestBlogs as $index => $post)
                    <a href="{{ route('blog.show', $post->slug) }}"
                       class="group flex gap-5 p-4 rounded-2xl border border-slate-200/80 bg-white hover:border-[#007BFF]/50 hover:shadow-lg hover:shadow-[#007BFF]/10 transition-all duration-300 reveal" data-delay="{{ $index * 90 }}">
                        <div class="w-28 h-24 sm:w-36 sm:h-28 rounded-xl overflow-hidden bg-slate-900 shrink-0">
                            @if($post->cover_image_url)
                            <img src="{{ $post->cover_image_url }}" alt="" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-[#132139] to-[#0B132B]"></div>
                            @endif
                        </div>
                        <div class="min-w-0 space-y-1.5 self-center">
                            <div class="flex items-center gap-2 text-[10px] font-mono text-slate-500">
                                @if($post->category)
                                <span class="text-[#007BFF] font-bold uppercase tracking-wider">{{ $post->category->name }}</span>
                                <span aria-hidden="true">·</span>
                                @endif
                                <span>{{ $post->published_at?->format('M d, Y') }}</span>
                                @if($post->read_time)
                                <span aria-hidden="true">·</span>
                                <span>{{ $post->read_time }}</span>
                                @endif
                            </div>
                            <h3 class="text-sm font-bold text-[#0F172A] leading-snug group-hover:text-[#007BFF] transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed line-clamp-2 hidden sm:block">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <p class="text-sm text-slate-500">No articles published yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Frequently asked -->
            <div class="lg:col-span-5 space-y-8">
                <div class="space-y-3 reveal">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-xs font-bold uppercase tracking-[0.18em] text-slate-600 font-heading">
                        FREQUENTLY ASKED
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-[#0F172A] font-heading">
                        Before you get in touch
                    </h2>
                </div>

                <div class="divide-y divide-slate-200/80 border-y border-slate-200/80" x-data="{ open: 0 }">
                    @forelse($faqs->take(5) as $index => $faq)
                    <div class="py-1">
                        <button type="button"
                                @click="open = open === {{ $index }} ? null : {{ $index }}"
                                :aria-expanded="(open === {{ $index }}).toString()"
                                aria-controls="home-faq-{{ $index }}"
                                class="w-full flex items-start justify-between gap-4 py-4 text-left group">
                            <span class="text-sm font-semibold text-[#0F172A] group-hover:text-[#007BFF] transition-colors">{{ $faq->question }}</span>
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-slate-400 transition-transform duration-300"
                                 :class="{ 'rotate-45 text-[#007BFF]': open === {{ $index }} }"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                                <path d="M12 5v14M5 12h14"/>
                            </svg>
                        </button>
                        <div id="home-faq-{{ $index }}" x-show="open === {{ $index }}" x-collapse x-cloak>
                            <p class="pb-5 pr-8 text-xs text-slate-600 leading-relaxed">{{ $faq->answer }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="py-4 text-sm text-slate-500">No questions published yet.</p>
                    @endforelse
                </div>

                <a href="{{ route('faq.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#0052b3]">
                    <span>Read the full FAQ</span>
                    <span aria-hidden="true">→</span>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 09. FINAL CTA SECTION (High-Converting Enterprise Banner) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-[#F8FAFC] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-[#0B132B] via-[#0F172A] to-[#141E33] border border-slate-700/80 shadow-2xl p-8 sm:p-14 text-white reveal">
            
            <!-- Ambient Glow Effect (Dreamcore Aurora Orbs) -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#007BFF]/20 rounded-full blur-[100px] pointer-events-none animate-aurora-1"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#00D2FF]/15 rounded-full blur-[100px] pointer-events-none animate-aurora-2"></div>

            <div class="relative z-10 max-w-3xl space-y-6">
                
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#007BFF]/20 border border-[#007BFF]/40 text-xs font-bold text-[#38BDF8] font-heading">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>ENGINEERING DISCOVERY CALL</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white leading-tight font-heading">
                    Let's Build Something <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#38BDF8] to-[#00D2FF]">Extraordinary Together</span>
                </h2>

                <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-2xl font-normal">
                    Have an idea, complex operational challenge, or high-scale web platform in mind? Let's turn it into a resilient, scalable digital solution built for growth.
                </p>

                <!-- CTA Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">
                    <a href="{{ route('contact.index') }}" 
                       class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0066d6] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/35 btn-premium flex items-center justify-center gap-2 group">
                        <span>Schedule a Consultation Call</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>

                    <a href="{{ route('portfolio.index') }}" 
                       class="w-full sm:w-auto px-7 py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-sm border border-white/20 hover:border-white/40 btn-premium flex items-center justify-center gap-2">
                        <span>View Our Portfolio</span>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="pt-6 border-t border-slate-700/80 flex flex-wrap items-center gap-6 text-xs text-slate-400 font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>Strict NDA Protected</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#38BDF8]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>24-Hour Response Guarantee</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Free Architecture Estimate</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection


