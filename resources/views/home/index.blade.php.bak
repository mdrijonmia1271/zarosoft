@extends('layouts.app')

@section('title', 'ZaroSoft — Enterprise Software Engineering & Digital Solutions')
@section('meta_description', 'ZaroSoft engineers custom ERPs, scalable SaaS platforms, high-concurrency web & mobile apps, and automated AI pipelines for scaling businesses and global enterprises.')

@section('content')

<!-- ========================================================================= -->
<!-- 01. UNIFIED HERO SECTION (Left Content + Right Media Card Showcase) -->
<!-- ========================================================================= -->
<section id="hero-section" class="relative overflow-hidden py-10 sm:py-14 lg:py-18 bg-[#060A17] text-white border-b border-slate-800/60">
    {{-- High-tech 3D wave particle canvas --}}
    <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <canvas id="hero-particle-wave-canvas" class="w-full h-full opacity-35"></canvas>
    </div>

    {{-- Ambient dynamic glow behind content --}}
    <div class="absolute top-1/4 left-1/4 -translate-x-1/2 w-[550px] h-[350px] bg-[#007BFF]/15 blur-[160px] pointer-events-none rounded-full"></div>
    <div class="absolute top-1/3 right-10 w-[500px] h-[350px] bg-[#00D2FF]/10 blur-[150px] pointer-events-none rounded-full"></div>
    <div class="absolute inset-0 bg-tech-grid opacity-15 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 xl:gap-12 items-center">
            
            <!-- ============================================================= -->
            <!-- LEFT COLUMN: Value Proposition, Headlines, CTAs, & Trust KPIs -->
            <!-- ============================================================= -->
            <div class="lg:col-span-6 xl:col-span-7 space-y-6 sm:space-y-7 text-left reveal">
                
                <!-- Main Headline with Dynamic Typewriter Effect -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-black tracking-tight text-white leading-[1.14] font-heading drop-shadow-2xl">
                    Engineering the Digital Future of Business. <br class="hidden sm:inline" />
                    <span x-data="{
                        phrases: ['Scale Without Limits', 'Automate Operations', 'Drive Real Growth', 'Empower Enterprises'],
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
                                speed = 2200;
                                this.isDeleting = true;
                            } else if (this.isDeleting && this.charIdx === 0) {
                                this.isDeleting = false;
                                this.phraseIdx = (this.phraseIdx + 1) % this.phrases.length;
                                speed = 400;
                            }
                            setTimeout(() => this.typeLoop(), speed);
                        }
                    }" class="inline-flex items-center flex-wrap">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00D2FF] via-[#38BDF8] to-[#007BFF] drop-shadow-[0_0_35px_rgba(0,210,255,0.6)]" 
                              x-text="displayText || '\u00A0'">
                            Scale Without Limits
                        </span>
                        <span class="inline-block w-[3px] sm:w-[4px] h-[0.9em] bg-[#00D2FF] ml-1 animate-cursor rounded-full shadow-[0_0_12px_rgba(0,210,255,0.9)]"></span>
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-sm sm:text-base lg:text-lg text-slate-300 max-w-xl leading-relaxed font-normal">
                    ZaroSoft builds scalable digital products, intelligent enterprise systems, and AI-powered automation that help ambitious businesses operate smarter and scale faster.
                </p>

                <!-- Dual Action CTAs -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 pt-1">
                    <!-- Primary CTA -->
                    <a href="{{ route('contact.index') }}" 
                       class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0052cc] hover:from-[#0062cc] hover:to-[#003d99] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/40 hover:shadow-[#007BFF]/60 hover:scale-[1.02] transition-all btn-premium flex items-center justify-center gap-2 group border border-blue-400/30">
                        <span>Schedule a Consultation</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <!-- Secondary CTA -->
                    <a href="{{ route('portfolio.index') }}" 
                       class="px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white font-bold text-sm border border-white/20 hover:border-cyan-400/50 shadow-lg backdrop-blur-md hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-[#00D2FF]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span>Explore Case Studies</span>
                    </a>
                </div>

                <!-- TRUST KPI STRIP (figures come from Admin → Settings) -->
                @php
                    $heroKpis = [
                        [
                            'label' => 'DELIVERY COMMITMENT',
                            'value' => '2-Week Sprints',
                            'note' => 'Working software, bi-weekly',
                            'accent' => 'text-[#00D2FF]',
                            'dot' => 'bg-[#00D2FF]',
                            'border' => 'hover:border-[#00D2FF]/60',
                        ],
                        [
                            'label' => 'ARCHITECTURE SLA',
                            'value' => '99.9% Uptime',
                            'note' => 'High availability by design',
                            'accent' => 'text-emerald-400',
                            'dot' => 'bg-emerald-400',
                            'border' => 'hover:border-emerald-400/60',
                        ],
                        [
                            'label' => 'TRACK RECORD',
                            'value' => setting('stat_projects_completed', '45+'),
                            'note' => 'ERP, web & AI platforms',
                            'accent' => 'text-[#38BDF8]',
                            'dot' => 'bg-[#38BDF8]',
                            'border' => 'hover:border-[#007BFF]/60',
                        ],
                        [
                            'label' => 'SLA SUPPORT',
                            'value' => setting('stat_support', '24/7'),
                            'note' => 'Continuous live monitoring',
                            'accent' => 'text-purple-400',
                            'dot' => 'bg-purple-400',
                            'border' => 'hover:border-purple-400/60',
                        ],
                    ];
                @endphp
                <div class="pt-3 grid grid-cols-2 sm:grid-cols-4 gap-2.5 sm:gap-3 text-left">
                    @foreach($heroKpis as $kpiIndex => $kpi)
                    <div class="reveal-scale p-3 sm:p-3.5 rounded-xl bg-[#090E20]/80 border border-slate-700/60 backdrop-blur-xl shadow-lg {{ $kpi['border'] }} transition-all duration-300 hover:-translate-y-0.5">
                        <div class="flex items-center gap-1.5 {{ $kpi['accent'] }} text-[9px] font-mono font-bold mb-1">
                            <span class="w-1.5 h-1.5 rounded-full {{ $kpi['dot'] }}"></span>
                            <span>{{ $kpi['label'] }}</span>
                        </div>
                        <div class="text-sm sm:text-base font-black text-white font-heading">{{ $kpi['value'] }}</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 line-clamp-1">{{ $kpi['note'] }}</div>
                    </div>
                    @endforeach
                </div>

                <!-- Subtle Enterprise Trust Caption -->
                <div class="pt-1 flex items-center gap-2 text-xs font-mono text-slate-400/90">
                    <span class="text-amber-400 font-bold tracking-widest">★★★★★</span>
                    <span>Trusted by <strong class="text-[#38BDF8]">100+ Enterprise Clients</strong> Worldwide</span>
                </div>

            </div>

            <!-- ============================================================= -->
            <!-- RIGHT COLUMN: Media Showcase Card (Clean Video + Photos) -->
            <!-- ============================================================= -->
            <div class="lg:col-span-6 xl:col-span-5 relative lg:-translate-y-10 xl:-translate-y-14 lg:-mt-2 reveal">
                
                {{-- Clean Media Card Showcase Frame --}}
                <div x-data="{
                    activeSlide: 0,
                    autoplay: true,
                    videoDuration: 20000,
                    imageDuration: 5500,
                    timer: null,
                    slides: [
                        {
                            type: 'video',
                            src: '{{ asset('videos/video-5.mp4') }}'
                        },
                        {
                            type: 'image',
                            src: '{{ asset('images/hero-workstation.webp') }}'
                        },
                        {
                            type: 'image',
                            src: '{{ asset('images/projects/zaro-erp-manufacturing-system.webp') }}'
                        },
                        {
                            type: 'image',
                            src: '{{ asset('images/projects/omnistore-b2b-ecommerce-platform.webp') }}'
                        },
                        {
                            type: 'image',
                            src: '{{ asset('images/projects/neuralbot-ai-document-ocr.webp') }}'
                        },
                        {
                            type: 'image',
                            src: '{{ asset('images/projects/paypulse-mobile-fintech-wallet.webp') }}'
                        },
                        {
                            type: 'image',
                            src: '{{ asset('images/team-collaboration.webp') }}'
                        }
                    ],
                    init() {
                        this.startTimer();
                    },
                    startTimer() {
                        this.clearTimer();
                        if (!this.autoplay) return;
                        const duration = this.activeSlide === 0 ? this.videoDuration : this.imageDuration;
                        this.timer = setTimeout(() => {
                            this.nextSlide();
                        }, duration);
                    },
                    clearTimer() {
                        if (this.timer) {
                            clearTimeout(this.timer);
                            this.timer = null;
                        }
                    },
                    handleSlideChange() {
                        this.startTimer();
                        if (this.activeSlide === 0) {
                            this.$nextTick(() => {
                                const v = document.getElementById('hero-card-video');
                                if (v) {
                                    v.currentTime = 0;
                                    v.play().catch(() => {});
                                    if (v.duration && !isNaN(v.duration) && v.duration > 0) {
                                        this.clearTimer();
                                        const dur = Math.max(v.duration * 1000, this.videoDuration);
                                        this.timer = setTimeout(() => {
                                            this.nextSlide();
                                        }, dur);
                                    }
                                }
                            });
                        }
                    },
                    nextSlide() {
                        this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                        this.handleSlideChange();
                    },
                    prevSlide() {
                        this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                        this.handleSlideChange();
                    },
                    goToSlide(index) {
                        this.activeSlide = index;
                        this.handleSlideChange();
                    }
                }" 
                @mouseenter="clearTimer()"
                @mouseleave="if(autoplay) startTimer()"
                class="relative rounded-2xl sm:rounded-3xl p-1 bg-gradient-to-b from-[#00D2FF]/40 via-[#007BFF]/20 to-transparent shadow-2xl shadow-[#007BFF]/25 group"
                >
                    <div class="rounded-[1.35rem] sm:rounded-[1.65rem] bg-[#090E20]/95 border border-slate-700/80 backdrop-blur-2xl overflow-hidden relative">
                        
                        <!-- Media Display Screen -->
                        <div class="relative w-full aspect-[16/10] overflow-hidden bg-[#060A17]">
                            
                            {{-- Slide 0: Video Reel --}}
                            <div x-show="activeSlide === 0" 
                                 x-transition:enter="transition ease-out duration-500"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 class="absolute inset-0 w-full h-full">
                                <video 
                                    id="hero-card-video"
                                    autoplay 
                                    muted 
                                    playsinline 
                                    preload="auto"
                                    @ended="if(activeSlide === 0 && autoplay) nextSlide()"
                                    src="{{ asset('videos/video-5.mp4') }}"
                                    class="w-full h-full object-cover object-center"
                                >
                                    <source src="{{ asset('videos/video-5.mp4') }}" type="video/mp4">
                                    <source src="{{ asset('videos/video-4.mp4') }}" type="video/mp4">
                                    <source src="{{ asset('videos/hero-bg.mp4') }}" type="video/mp4">
                                </video>
                            </div>

                            {{-- Slides 1..6: Picture Showcases --}}
                            <template x-for="(slide, index) in slides.slice(1)" :key="index + 1">
                                <div x-show="activeSlide === (index + 1)" 
                                     x-transition:enter="transition ease-out duration-500"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     class="absolute inset-0 w-full h-full">
                                    <img :src="slide.src" 
                                         alt="ZaroSoft Showcase" 
                                         loading="lazy"
                                         class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700">
                                </div>
                            </template>

                            <!-- Navigation Arrows (appear on hover) -->
                            <button type="button" @click="prevSlide()" aria-label="Previous slide" 
                                    class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/50 hover:bg-[#007BFF] text-white/80 hover:text-white backdrop-blur-md flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-lg z-20">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button type="button" @click="nextSlide()" aria-label="Next slide" 
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/50 hover:bg-[#007BFF] text-white/80 hover:text-white backdrop-blur-md flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-lg z-20">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <!-- Minimal Sleek Dots Indicator -->
                            <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-black/40 backdrop-blur-md z-20">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button type="button" @click="goToSlide(index)" :aria-label="'Go to slide ' + (index + 1)"
                                            class="h-1.5 rounded-full transition-all duration-300 cursor-pointer"
                                            :class="activeSlide === index ? 'w-5 bg-[#00D2FF] shadow-[0_0_8px_rgba(0,210,255,0.8)]' : 'w-1.5 bg-white/40 hover:bg-white/70'">
                                    </button>
                                </template>
                            </div>

                        </div>

                    </div>
                </div>

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
    <div class="reveal relative w-full overflow-hidden [mask-image:linear-gradient(to_right,transparent,white_12%,white_88%,transparent)]">
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

    <div class="reveal max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 flex justify-center relative z-10" data-delay="120">
        <a href="{{ route('portfolio.index') }}"
           class="group inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white hover:bg-[#007BFF] text-[#0F172A] hover:text-white text-xs font-bold border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-lg hover:shadow-[#007BFF]/20 hover:-translate-y-0.5 transition-all">
            <span>See what we built for them</span>
            <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">→</span>
        </a>
    </div>
</section>
@endif


<!-- ========================================================================= -->
<!-- 04. FEATURED PORTFOLIO & CASE STUDIES (Case Study Architecture) -->
<!-- ========================================================================= -->
<section class="py-20 sm:py-24 bg-white border-t border-slate-200/80 relative overflow-hidden" x-data="{ activeFilter: 'all' }">
    <div class="absolute inset-x-0 top-0 h-64 bg-gradient-to-b from-[#F8FAFC] to-transparent pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Header + category filter -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-14">
            <x-section-heading
                eyebrow="Featured Case Studies"
                title="Real Engineering Impact &"
                accent="Measurable Client Results"
                lede="How we build high-concurrency systems, automate complex enterprise workflows, and deliver growth you can read off a balance sheet." />

            @php
                $projectFilters = $featuredProjects
                    ->pluck('category')
                    ->filter()
                    ->unique('id')
                    ->values();
            @endphp
            @if($projectFilters->count() > 1)
            <div class="flex flex-wrap items-center gap-2 reveal" data-delay="120">
                <button type="button" @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'filter-pill--active' : ''"
                        class="filter-pill">
                    All work
                </button>
                @foreach($projectFilters as $filter)
                <button type="button" @click="activeFilter = '{{ $filter->slug }}'"
                        :class="activeFilter === '{{ $filter->slug }}' ? 'filter-pill--active' : ''"
                        class="filter-pill">
                    {{ $filter->name }}
                </button>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Case studies (driven by Admin → Projects) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            @forelse($featuredProjects as $index => $project)
            <a href="{{ route('portfolio.show', $project->slug) }}"
               x-show="activeFilter === 'all' || activeFilter === '{{ $project->category?->slug }}'"
               x-transition.opacity.duration.300ms
               class="case-card group reveal" data-delay="{{ ($index % 2) * 110 }}">

                <!-- Cover -->
                <div class="case-card__media">
                    @if($project->thumbnail_url)
                    <x-picture :src="$project->thumbnail" :alt="$project->title" width="1200" height="675"
                               class="w-full h-full object-cover transition-transform duration-[900ms] ease-out group-hover:scale-[1.07]" />
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-[#1B2B4B] via-[#132139] to-[#0B132B]" aria-hidden="true"></div>
                    @endif

                    <div class="case-card__scrim" aria-hidden="true"></div>

                    @if($project->category)
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[10px] font-bold tracking-[0.14em] uppercase bg-white/95 text-[#0F172A] shadow-lg backdrop-blur-sm">
                        {{ $project->category->name }}
                    </span>
                    @endif

                    <div class="absolute inset-x-5 bottom-5">
                        <span class="text-[11px] font-bold text-[#38BDF8] font-mono tracking-wide">{{ $project->client_name }}</span>
                        <h3 class="text-xl font-black text-white font-heading tracking-tight mt-1 leading-snug">
                            {{ $project->title }}
                        </h3>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-6 flex flex-col flex-1">
                    <p class="text-xs text-slate-600 leading-relaxed flex-1">
                        {{ Str::limit($project->tagline ?: $project->overview, 165) }}
                    </p>

                    @if($project->results && is_array($project->results) && count($project->results))
                    {{-- The outcome is the reason anyone reads a case study, so it
                         gets its own band rather than a grey box in the corner. --}}
                    <div class="case-card__result">
                        <span class="case-card__result-icon" aria-hidden="true">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 17l6-6 4 4 8-8M21 7v5h-5"/>
                            </svg>
                        </span>
                        <span>
                            <span class="block text-[9px] font-mono uppercase tracking-[0.18em] text-emerald-700/60">Business result</span>
                            <span class="block text-xs font-bold text-emerald-700 mt-0.5">{{ $project->results[0] }}</span>
                        </span>
                    </div>
                    @endif

                    <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                        <div class="flex flex-wrap gap-1.5">
                            @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                            <span class="tech-chip">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <span class="inline-flex items-center gap-2 text-xs font-bold text-[#007BFF] shrink-0">
                            <span class="hidden sm:inline">Read case study</span>
                            <span class="case-card__go" aria-hidden="true">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M13 6l6 6-6 6"/>
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>
            </a>
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
<section class="py-20 sm:py-24 bg-gradient-to-b from-[#F8FAFC] via-[#F1F5F9] to-[#F8FAFC] relative overflow-hidden">
    <!-- Ambient Background Lighting & Tech Grid Mesh -->
    <div class="absolute inset-0 bg-[radial-gradient(#CBD5E1_1px,transparent_1px)] [background-size:24px_24px] opacity-40 pointer-events-none"></div>
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-gradient-to-br from-[#007BFF]/15 to-[#00D2FF]/10 rounded-full blur-3xl pointer-events-none animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-gradient-to-br from-[#8B5CF6]/15 to-[#007BFF]/10 rounded-full blur-3xl pointer-events-none animate-pulse" style="animation-duration: 10s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <x-section-heading
            class="mb-14 sm:mb-16"
            align="center"
            eyebrow="The ZaroSoft Advantage"
            title="Why Leading Companies"
            accent="Trust Our Engineering"
            lede="We don't just write code; we partner with ambitious leadership teams to eliminate operational bottlenecks and build resilient, long-term digital infrastructure." />

        <!-- The four ZARO pillars. One card template, four data rows — the accent
             colour rides in as a CSS variable so a pillar can be re-themed here
             without touching a single rule in app.css. -->
        @php
            $zaroPillars = [
                [
                    'letter' => 'Z',
                    'title' => 'Zenith Quality',
                    'icon' => 'shield-check',
                    'accent' => '#007BFF',
                    'ink' => '#0369A1',
                    'metric' => ['value' => '99.8', 'suffix' => '%', 'caption' => 'Automated test coverage'],
                    'summary' => 'Pristine clean-code architecture, strict automated test coverage, and pixel-perfect delivery standards built to scale.',
                    'features' => ['Clean architecture principles', 'Zero tech-debt tolerance', 'PHPStan level 8 linting'],
                    'tag' => 'Standards',
                ],
                [
                    'letter' => 'A',
                    'title' => 'Automation Focus',
                    'icon' => 'zap',
                    'accent' => '#00A8D6',
                    'ink' => '#0E7490',
                    'metric' => ['value' => '4', 'suffix' => 'x', 'caption' => 'Faster delivery velocity'],
                    'summary' => 'Eliminating manual data entry, human-error bottlenecks, and spreadsheet silos with intelligent AI workflows.',
                    'features' => ['AI agent & OCR workflows', 'No repetitive manual tasks', 'Instant CI/CD deployments'],
                    'tag' => 'Pipelines',
                ],
                [
                    'letter' => 'R',
                    'title' => 'Reliable Systems',
                    'icon' => 'server',
                    'accent' => '#10B981',
                    'ink' => '#047857',
                    'metric' => ['value' => '99.99', 'suffix' => '%', 'caption' => 'Contracted uptime SLA'],
                    'summary' => 'Guaranteed uptime, automated backup snapshots, disaster-recovery failover, and zero-trust security throughout.',
                    'features' => ['Encrypted multi-region DB', 'Zero-downtime deployments', 'Automated disaster recovery'],
                    'tag' => 'Resilience',
                ],
                [
                    'letter' => 'O',
                    'title' => 'Optimization & ROI',
                    'icon' => 'activity',
                    'accent' => '#7C3AED',
                    'ink' => '#6D28D9',
                    'metric' => ['value' => '100', 'prefix' => '<', 'suffix' => 'ms', 'caption' => 'Median query latency'],
                    'summary' => 'Sub-second database execution, intelligent Redis caching, and a quantifiable return on every engineering hour.',
                    'features' => ['Redis query caching', 'High-concurrency scaling', 'Measurable cloud cost savings'],
                    'tag' => 'Performance',
                ],
            ];
        @endphp

        <div class="zaro-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="zaro-cards-container">
            @foreach($zaroPillars as $index => $pillar)
            @php $pillarNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT); @endphp
            <article class="zaro-pillar reveal-scale" data-delay="{{ $index * 110 }}"
                     style="--zaro-accent: {{ $pillar['accent'] }}; --zaro-accent-ink: {{ $pillar['ink'] }};">
                <div class="zaro-pillar__frame">
                    <div class="zaro-pillar__body">
                        <div class="zaro-pillar__glow" aria-hidden="true"></div>
                        <span class="zaro-pillar__monogram" aria-hidden="true">{{ $pillar['letter'] }}</span>

                        <div class="zaro-pillar__content">
                            <!-- Icon + pillar code -->
                            <div class="flex items-start justify-between gap-3">
                                <div class="relative">
                                    <div class="zaro-pillar__icon">
                                        <x-icon :name="$pillar['icon']" class="w-6 h-6" />
                                    </div>
                                    <span class="zaro-pillar__pip" aria-hidden="true"></span>
                                </div>
                                <span class="px-2.5 py-1 rounded-lg bg-slate-50 border border-slate-200/80 text-[11px] font-black font-mono tracking-wider text-slate-400">
                                    {{ $pillar['letter'] }}-{{ $pillarNumber }}
                                </span>
                            </div>

                            <!-- Title & summary. `flex-1` parks the slack here, so a longer
                                 summary never knocks this card metric out of line with its neighbours. -->
                            <div class="flex-1">
                                <h3 class="text-lg font-black text-[#0F172A] font-heading tracking-tight">
                                    {{ $pillar['title'] }}
                                </h3>
                                <p class="mt-2 text-xs leading-relaxed text-slate-500">
                                    {{ $pillar['summary'] }}
                                </p>
                            </div>

                            <!-- The number that backs the claim. `data-counter` hands it to the
                                 shared roll-up engine in resources/js/app.js. -->
                            <div>
                                <div class="zaro-pillar__rule mb-3" aria-hidden="true"></div>
                                <p class="zaro-pillar__metric"
                                   data-counter="{{ $pillar['metric']['value'] }}"
                                   @isset($pillar['metric']['prefix']) data-prefix="{{ $pillar['metric']['prefix'] }}" @endisset
                                   data-suffix="{{ $pillar['metric']['suffix'] }}">
                                    {{ $pillar['metric']['prefix'] ?? '' }}{{ $pillar['metric']['value'] }}{{ $pillar['metric']['suffix'] }}
                                </p>
                                <p class="mt-1.5 text-[10px] font-bold uppercase tracking-[0.16em] text-slate-400">
                                    {{ $pillar['metric']['caption'] }}
                                </p>
                            </div>

                            <!-- Feature checklist -->
                            <ul class="space-y-2.5 pt-4 border-t border-slate-100 text-xs font-medium text-slate-600">
                                @foreach($pillar['features'] as $featureIndex => $feature)
                                <li class="flex items-center gap-2.5">
                                    <span class="zaro-pillar__check" style="--zaro-check-delay: {{ $featureIndex * 60 }}ms;" aria-hidden="true">
                                        <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>{{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="zaro-pillar__footer flex items-center justify-between text-[11px] font-bold">
                            <span class="font-mono uppercase tracking-wider text-[10px] text-slate-400">Pillar {{ $pillarNumber }}</span>
                            <span class="inline-flex items-center gap-1.5" style="color: var(--zaro-accent-ink);">
                                {{ $pillar['tag'] }}
                                <span class="zaro-pillar__arrow" aria-hidden="true">&rarr;</span>
                            </span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Agile Protocol Engine temporarily disabled --}}
        @if(false)
        <!-- Right Column: Interactive Agile Engineering Protocol Terminal -->
        <div class="lg:col-span-5 relative">
            <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-[#007BFF]/30 via-[#38BDF8]/20 to-[#8B5CF6]/30 blur-xl opacity-75 pointer-events-none"></div>
            <div class="relative rounded-3xl overflow-hidden border border-slate-700/80 bg-gradient-to-b from-[#0F172A] via-[#0B132B] to-[#080D1A] shadow-2xl p-6 sm:p-7 text-white space-y-6 backdrop-blur-2xl">
                <div class="flex items-center justify-between border-b border-slate-800/80 pb-4">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500/80"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500/80"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500/80"></span>
                        </div>
                        <span class="text-xs font-mono font-bold text-slate-300 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            Agile Protocol Engine
                        </span>
                    </div>
                    <span class="text-[10px] font-mono font-semibold px-2.5 py-1 rounded-full bg-[#007BFF]/20 text-[#38BDF8] border border-[#007BFF]/40 shadow-sm flex items-center gap-1.5">
                        <span class="w-1 h-1 rounded-full bg-[#38BDF8] animate-ping"></span>
                        Sprint 2.4 Active
                    </span>
                </div>
            </div>
        </div>
        @endif

    </div>
</section>


<!-- ========================================================================= -->
<!-- 07. CLIENT TESTIMONIALS & AUTHENTIC REVIEWS -->
<!-- ========================================================================= -->
{{-- Dark anchor. Sections 04, 06 and 08 are all light, so without this the
     whole middle of the page reads as one undifferentiated white run. --}}
<section class="py-20 sm:py-24 bg-[#0B132B] border-y border-slate-800 relative overflow-hidden text-white">
    <div class="absolute inset-0 bg-tech-grid opacity-25 pointer-events-none" aria-hidden="true"></div>
    <div class="absolute -top-32 left-1/4 w-[32rem] h-[32rem] bg-[#007BFF]/15 blur-[130px] rounded-full pointer-events-none" aria-hidden="true"></div>
    <div class="absolute -bottom-32 right-1/4 w-[32rem] h-[32rem] bg-[#00D2FF]/10 blur-[130px] rounded-full pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <x-section-heading
            class="mb-16"
            align="center"
            tone="dark"
            eyebrow="Verified Client Testimonials"
            title="Trusted by Founders &"
            accent="Enterprise Executives"
            lede="What our clients say about our code quality, our delivery dates, and the support that carries on long after launch." />

        <!-- Client reviews (driven by Admin → Testimonials) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @forelse($testimonials->take(3) as $index => $testimonial)
            <figure class="quote-card reveal" data-delay="{{ $index * 120 }}">
                <span class="quote-card__mark" aria-hidden="true">&ldquo;</span>

                @php $rating = max(1, min(5, (int) ($testimonial->rating ?: 5))); @endphp
                <div class="flex items-center gap-1 text-amber-400 relative z-10" role="img" aria-label="{{ $rating }} out of 5 stars">
                    @for($star = 1; $star <= 5; $star++)
                    <svg @class(['w-4 h-4', 'fill-current' => $star <= $rating, 'text-white/15 fill-current' => $star > $rating]) viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>

                <blockquote class="relative z-10 mt-5 flex-1 text-sm leading-relaxed text-slate-300">
                    {{ $testimonial->quote }}
                </blockquote>

                <figcaption class="relative z-10 mt-6 pt-5 border-t border-white/10 flex items-center gap-3.5">
                    <span class="quote-card__avatar">
                        @if($testimonial->avatar_url)
                        <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->client_name }}" loading="lazy" decoding="async" class="w-full h-full rounded-full object-cover">
                        @else
                        <span class="w-full h-full rounded-full bg-[#0B132B] flex items-center justify-center text-xs font-black text-[#38BDF8]">
                            {{ $testimonial->initials }}
                        </span>
                        @endif
                    </span>
                    <span class="min-w-0">
                        <span class="block text-sm font-bold text-white truncate">{{ $testimonial->client_name }}</span>
                        <span class="block text-[11px] text-slate-400 leading-snug">
                            {{ collect([$testimonial->client_position, $testimonial->company])->filter()->implode(', ') }}
                        </span>
                        @if($testimonial->location)
                        <span class="block text-[10px] text-slate-500 font-mono mt-0.5">{{ $testimonial->location }}</span>
                        @endif
                    </span>
                </figcaption>
            </figure>
            @empty
            <p class="col-span-full text-sm text-slate-400">No client reviews published yet.</p>
            @endforelse
        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- 08. INSIGHTS & COMMON QUESTIONS -->
<!-- ========================================================================= -->
<section class="py-20 sm:py-24 bg-[#F8FAFC] relative overflow-hidden">
    <div class="absolute inset-0 bg-tech-dots opacity-40 pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            <!-- Latest articles -->
            <div class="lg:col-span-7 space-y-8">
                <div class="flex items-end justify-between gap-6">
                    <x-section-heading
                        size="sm"
                        :break="false"
                        eyebrow="Engineering Insights"
                        title="Notes from the"
                        accent="build floor" />

                    <a href="{{ route('blog.index') }}" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#0052b3] shrink-0 pb-1.5 reveal" data-delay="120">
                        <span>All articles</span>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($latestBlogs as $index => $post)
                    <a href="{{ route('blog.show', $post->slug) }}"
                       class="post-row group reveal" data-delay="{{ $index * 90 }}">
                        <span class="post-row__media">
                            @if($post->cover_image_url)
                            <img src="{{ $post->cover_image_url }}" alt="" loading="lazy" decoding="async"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                            <span class="block w-full h-full bg-gradient-to-br from-[#1B2B4B] to-[#0B132B]"></span>
                            @endif
                        </span>

                        <span class="min-w-0 flex-1 self-center">
                            <span class="flex items-center gap-2 text-[10px] font-mono text-slate-500">
                                @if($post->category)
                                <span class="text-[#007BFF] font-bold uppercase tracking-[0.14em]">{{ $post->category->name }}</span>
                                <span aria-hidden="true">&middot;</span>
                                @endif
                                <span>{{ $post->published_at?->format('M d, Y') }}</span>
                                @if($post->read_time)
                                <span aria-hidden="true">&middot;</span>
                                <span>{{ $post->read_time }}</span>
                                @endif
                            </span>
                            <span class="block text-sm font-bold text-[#0F172A] leading-snug group-hover:text-[#007BFF] transition-colors line-clamp-2 mt-1.5">
                                {{ $post->title }}
                            </span>
                            <span class="hidden sm:block text-xs text-slate-600 leading-relaxed line-clamp-2 mt-1.5">
                                {{ $post->excerpt }}
                            </span>
                        </span>
                    </a>
                    @empty
                    <p class="text-sm text-slate-500">No articles published yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Frequently asked -->
            <div class="lg:col-span-5 space-y-8">
                <x-section-heading
                    size="sm"
                    eyebrow="Frequently Asked"
                    title="Before you get in touch"
                    lede="The questions that come up in almost every first call." />

                <div class="space-y-3" x-data="{ open: 0 }">
                    @forelse($faqs->take(5) as $index => $faq)
                    <div class="faq-item reveal" :class="open === {{ $index }} ? 'faq-item--open' : ''" data-delay="{{ $index * 70 }}">
                        <button type="button"
                                @click="open = open === {{ $index }} ? null : {{ $index }}"
                                :aria-expanded="(open === {{ $index }}).toString()"
                                aria-controls="home-faq-{{ $index }}"
                                class="w-full flex items-start justify-between gap-4 text-left group">
                            <span class="text-sm font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors">{{ $faq->question }}</span>
                            <span class="faq-item__toggle" aria-hidden="true">
                                <svg class="w-3.5 h-3.5 transition-transform duration-300"
                                     :class="{ 'rotate-45': open === {{ $index }} }"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                    <path d="M12 5v14M5 12h14"/>
                                </svg>
                            </span>
                        </button>
                        <div id="home-faq-{{ $index }}" x-show="open === {{ $index }}" x-collapse x-cloak>
                            <p class="pt-3 pr-8 text-xs text-slate-600 leading-relaxed">{{ $faq->answer }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="py-4 text-sm text-slate-500">No questions published yet.</p>
                    @endforelse
                </div>

                <a href="{{ route('faq.index') }}" class="reveal inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#0052b3]">
                    <span>Read the full FAQ</span>
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 09. FINAL CTA SECTION (High-Converting Enterprise Banner) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="relative rounded-[28px] overflow-hidden bg-gradient-to-br from-[#0B132B] via-[#0F172A] to-[#141E33] border border-slate-700/70 shadow-2xl text-white">

            <!-- Ambient Glow Effect (Dreamcore Aurora Orbs) -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#007BFF]/20 rounded-full blur-[100px] pointer-events-none animate-aurora-1" aria-hidden="true"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#00D2FF]/15 rounded-full blur-[100px] pointer-events-none animate-aurora-2" aria-hidden="true"></div>
            <div class="absolute inset-0 bg-tech-grid opacity-30 pointer-events-none" aria-hidden="true"></div>

            {{-- Two columns: the pitch on the left, and what actually happens
                 after they click on the right. The old single-column version
                 left half the banner empty on desktop. --}}
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 p-8 sm:p-12 lg:p-14">

                <div class="lg:col-span-7 space-y-6 reveal-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/5 border border-white/15 text-[11px] font-bold uppercase tracking-[0.2em] text-[#38BDF8] font-heading backdrop-blur-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        Engineering Discovery Call
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white leading-[1.1] font-heading">
                        Let's Build Something
                        <br class="hidden sm:block" />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#38BDF8] to-[#00D2FF]">Extraordinary Together</span>
                    </h2>

                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-xl">
                        Have an idea, a complex operational bottleneck, or a high-scale platform in mind? Let's turn it into a resilient system built for growth.
                    </p>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-2">
                        <a href="{{ route('contact.index') }}"
                           class="px-7 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0066d6] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/35 btn-premium inline-flex items-center justify-center gap-2 group">
                            <span>Schedule a consultation call</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </a>

                        <a href="{{ route('portfolio.index') }}"
                           class="px-7 py-4 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold text-sm border border-white/15 hover:border-white/30 btn-premium inline-flex items-center justify-center gap-2">
                            <span>View our portfolio</span>
                        </a>
                    </div>

                    <div class="pt-6 border-t border-white/10 flex flex-wrap items-center gap-x-6 gap-y-3 text-xs text-slate-400 font-medium">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <span>Strict NDA protected</span>
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#38BDF8]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>24-hour response guarantee</span>
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Free architecture estimate</span>
                        </span>
                    </div>
                </div>

                <!-- What happens after they click -->
                @php
                    $ctaSteps = [
                        ['label' => 'Discovery call', 'detail' => 'A 30-minute call to map the problem, the constraints and the systems already in play.'],
                        ['label' => 'Architecture estimate', 'detail' => 'A written scope, a technical approach and a realistic delivery window — free of charge.'],
                        ['label' => 'Build starts', 'detail' => 'Two-week sprints with working software at the end of each one, not status reports.'],
                    ];
                @endphp
                <div class="lg:col-span-5 reveal-right" data-delay="140">
                    <div class="cta-panel">
                        <div class="flex items-center justify-between gap-3 pb-4 mb-5 border-b border-white/10">
                            <span class="text-[11px] font-mono uppercase tracking-[0.18em] text-slate-400">How it starts</span>
                            <span class="flex items-center gap-1.5 text-[10px] font-mono text-emerald-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                Booking now
                            </span>
                        </div>

                        <ol class="space-y-5">
                            @foreach($ctaSteps as $stepIndex => $step)
                            <li class="cta-step">
                                <span class="cta-step__marker">{{ $stepIndex + 1 }}</span>
                                <span>
                                    <span class="block text-sm font-bold text-white">{{ $step['label'] }}</span>
                                    <span class="block text-xs text-slate-400 leading-relaxed mt-1">{{ $step['detail'] }}</span>
                                </span>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // =========================================================================
    // ZARO PILLARS — 3D TILT & CURSOR SPOTLIGHT
    // The cards' entrance is handled by the shared scroll-reveal engine in
    // app.js; this only adds the pointer affordances on top of it.
    // =========================================================================
    const grid = document.getElementById('zaro-cards-container');
    if (!grid) return;

    const cards = grid.querySelectorAll('.zaro-pillar');
    if (!cards.length) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    // Tilt is a pointer affordance; touch and pen visitors get the static card.
    if (!window.matchMedia('(pointer: fine)').matches) return;

    cards.forEach((card) => {
        const frame = card.querySelector('.zaro-pillar__frame');
        const icon = card.querySelector('.zaro-pillar__icon');
        if (!frame) return;

        let bounds = null;
        let frameId = null;

        card.addEventListener('mouseenter', () => {
            bounds = card.getBoundingClientRect();
            // Track the cursor tightly while hovering; the CSS spring below
            // takes back over on the way out.
            frame.style.transition = 'transform 0.12s ease-out';
        });

        card.addEventListener('mousemove', (event) => {
            if (!bounds) bounds = card.getBoundingClientRect();

            const x = event.clientX - bounds.left;
            const y = event.clientY - bounds.top;

            if (frameId) cancelAnimationFrame(frameId);
            frameId = requestAnimationFrame(() => {
                const xPct = (x / bounds.width) - 0.5;
                const yPct = (y / bounds.height) - 0.5;

                frame.style.transform = 'rotateX(' + (-yPct * 10).toFixed(2) + 'deg)'
                    + ' rotateY(' + (xPct * 10).toFixed(2) + 'deg)'
                    + ' scale3d(1.02, 1.02, 1.02)';

                card.style.setProperty('--zaro-x', x + 'px');
                card.style.setProperty('--zaro-y', y + 'px');

                // Icon drifts further than the card for a layered parallax.
                if (icon) {
                    icon.style.setProperty('--zaro-icon-x', (xPct * 9).toFixed(2) + 'px');
                    icon.style.setProperty('--zaro-icon-y', (yPct * 9).toFixed(2) + 'px');
                }
            });
        });

        card.addEventListener('mouseleave', () => {
            if (frameId) cancelAnimationFrame(frameId);
            frameId = null;
            bounds = null;

            // Clearing the inline values hands every property back to the
            // stylesheet, which eases them home on its own easing curve.
            frame.style.transition = '';
            frame.style.transform = '';
            card.style.removeProperty('--zaro-x');
            card.style.removeProperty('--zaro-y');

            if (icon) {
                icon.style.removeProperty('--zaro-icon-x');
                icon.style.removeProperty('--zaro-icon-y');
            }
        });
    });
});
</script>
@endpush


