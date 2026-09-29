@extends('layouts.app')

@section('title', 'ZaroSoft — Engineering the Digital Future of Business')
@section('meta_description', 'ZaroSoft builds modern web, mobile and cloud solutions — custom ERP, SaaS products, CRM systems and automation that help businesses grow and operate efficiently.')

@section('content')

{{-- ======================================================================= --}}
{{-- 01. HERO                                                                --}}
{{-- ======================================================================= --}}
<section id="hero-section" class="relative bg-[#0B132B] text-white overflow-hidden">
    {{-- 3D particle wave + network plexus backdrop (resources/js/hero-wave.js) --}}
    <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none z-0" aria-hidden="true">
        <canvas id="hero-particle-wave-canvas" class="w-full h-full opacity-35"></canvas>
    </div>

    {{-- Ambient glows sitting behind the content --}}
    <div class="absolute top-1/4 left-1/4 -translate-x-1/2 w-[550px] h-[350px] bg-[#007BFF]/15 blur-[160px] rounded-full pointer-events-none" aria-hidden="true"></div>
    <div class="absolute top-1/3 right-10 w-[500px] h-[350px] bg-[#00D2FF]/10 blur-[150px] rounded-full pointer-events-none" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-tech-grid opacity-15 pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center pt-[44px] pb-16 sm:pt-[60px] sm:pb-20 lg:pt-[76px] lg:pb-24">

            {{-- Left: message --}}
            <div class="lg:col-span-5 reveal">
                <h1 class="font-heading font-bold tracking-tight leading-[1.08] text-4xl sm:text-5xl xl:text-[3.4rem]">
                    Engineering the<br>
                    <span class="text-[#3B9BFF]">Digital Future</span><br>
                    of Business.
                </h1>

                <p class="mt-6 text-sm sm:text-base leading-relaxed text-slate-400 max-w-md">
                    We build modern web, mobile and cloud solutions that help businesses grow, operate efficiently and stay ahead in a digital world.
                </p>

                <div class="mt-9 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('contact.index') }}"
                       class="group inline-flex items-center justify-center gap-2 px-6 py-3 rounded-md bg-[#007BFF] hover:bg-[#0069db] text-white text-[13px] font-semibold transition-colors">
                        Start Your Project
                        <span class="transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                    </a>
                    <a href="{{ route('portfolio.index') }}"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-md border border-white/25 hover:border-white/60 hover:bg-white/5 text-white text-[13px] font-semibold transition-colors">
                        Explore Our Work
                    </a>
                </div>

                <a href="#what-we-build" class="mt-12 inline-flex items-center gap-2 text-[11px] text-slate-400 hover:text-white transition-colors">
                    <span aria-hidden="true">&darr;</span> Scroll to explore
                </a>
            </div>

            {{-- Right: media showcase — the showreel, then one slide per service photo --}}
            <div class="lg:col-span-7 relative reveal" data-delay="120">
                {{-- Thin accent frame, offset behind the photo --}}
                <div class="hidden sm:block absolute -top-5 -left-5 w-40 h-40 border-t border-l border-[#3B9BFF]/60 pointer-events-none" aria-hidden="true"></div>

                <div x-data="{
                        slide: 0,
                        durations: {{ Illuminate\Support\Js::from($heroSlides->pluck('duration')) }},
                        count: {{ $heroSlides->count() }},
                        timer: null,
                        init() { this.play(); },
                        play() {
                            if (this.count < 2) return;
                            this.timer = setTimeout(() => this.next(), this.durations[this.slide]);
                        },
                        stop() { clearTimeout(this.timer); },
                        restart() { this.stop(); this.play(); },
                        show(i) {
                            this.slide = i;
                            const video = this.$refs.heroVideo;
                            if (video) {
                                if (i === 0) { video.currentTime = 0; video.play().catch(() => {}); }
                                else { video.pause(); }
                            }
                            this.restart();
                        },
                        go(i) { this.show(i); },
                        next() { this.show((this.slide + 1) % this.count); },
                        prev() { this.show((this.slide - 1 + this.count) % this.count); }
                     }"
                     class="relative aspect-[16/10] rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl shadow-black/50 bg-[#060A17]">
                    @foreach($heroSlides as $i => $slide)
                    <div x-show="slide === {{ $i }}" x-transition.opacity.duration.700ms class="absolute inset-0">
                        @if($slide['type'] === 'video')
                        <video x-ref="heroVideo"
                               class="w-full h-full object-cover"
                               autoplay muted loop playsinline preload="metadata"
                               aria-label="{{ $slide['alt'] }}">
                            <source src="{{ $slide['src'] }}" type="video/mp4">
                        </video>
                        @else
                        <x-picture :src="$slide['src']" :alt="$slide['alt']" width="1200" height="750"
                                   img-class="w-full h-full object-cover" />
                        @endif
                    </div>
                    @endforeach

                    {{-- Scrim: darker at the foot so a service caption stays readable --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0B132B]/85 via-[#0B132B]/10 to-transparent pointer-events-none"></div>

                    {{-- Caption of the service the current photo belongs to --}}
                    @foreach($heroSlides as $i => $slide)
                    @if($slide['title'])
                    <div x-show="slide === {{ $i }}" x-transition.opacity.duration.500ms
                         class="absolute bottom-3 left-4 right-28 sm:bottom-5 sm:left-6 sm:right-40">
                        <a href="{{ $slide['url'] }}" class="group inline-block max-w-lg">
                            <p class="font-heading font-semibold text-white text-base sm:text-lg leading-tight group-hover:text-[#3B9BFF] transition-colors">
                                {{ $slide['title'] }}
                            </p>
                            @if($slide['caption'])
                            <p class="mt-1 hidden sm:block text-xs text-slate-300 leading-relaxed line-clamp-2">
                                {{ $slide['caption'] }}
                            </p>
                            @endif
                        </a>
                    </div>
                    @endif
                    @endforeach

                    {{-- Slider controls --}}
                    @if($heroSlides->count() > 1)
                    <div class="absolute bottom-3 right-3 flex items-center gap-3">
                        <div class="flex items-center gap-1.5">
                            @foreach($heroSlides as $i => $slide)
                            <button type="button" @click="go({{ $i }})"
                                    :class="slide === {{ $i }} ? 'bg-white w-4' : 'bg-white/40 w-1.5'"
                                    class="h-1.5 rounded-full transition-all"
                                    aria-label="Show slide {{ $i + 1 }}"></button>
                            @endforeach
                        </div>
                        <button type="button" @click="prev()" class="w-7 h-7 grid place-items-center rounded bg-black/40 hover:bg-black/70 text-white/80 hover:text-white text-xs transition-colors" aria-label="Previous slide">&larr;</button>
                        <button type="button" @click="next()" class="w-7 h-7 grid place-items-center rounded bg-black/40 hover:bg-black/70 text-white/80 hover:text-white text-xs transition-colors" aria-label="Next slide">&rarr;</button>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ======================================================================= --}}
{{-- 02. TRUSTED BY                                                          --}}
{{-- ======================================================================= --}}
@if($clientLogos->isNotEmpty())
<section class="bg-[#F4F5F7] border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
        <p class="text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-500 reveal">Trusted by innovative companies</p>

        <div class="mt-7 flex items-center gap-8 sm:gap-12 lg:gap-16 overflow-x-auto reveal" data-delay="80">
            @foreach($clientLogos->take(6) as $client)
            <div class="shrink-0 h-8 sm:h-9 flex items-center">
                <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" loading="lazy" decoding="async"
                     class="max-h-full w-auto max-w-[150px] object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-300">
            </div>
            @endforeach
            <a href="{{ route('portfolio.index') }}" class="shrink-0 ml-auto text-slate-400 hover:text-[#007BFF] transition-colors" aria-label="See our work">&rarr;</a>
        </div>
    </div>
</section>
@endif


{{-- ======================================================================= --}}
{{-- 03. WHAT WE BUILD                                                       --}}
{{-- ======================================================================= --}}
<section id="what-we-build" class="bg-[#F4F5F7] py-20 sm:py-24 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            <div class="lg:col-span-4 reveal">
                <p class="flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-500">
                    What We Build
                    <span class="h-px w-8 bg-slate-400" aria-hidden="true"></span>
                </p>
                <h2 class="mt-5 font-heading text-2xl sm:text-3xl font-bold tracking-tight text-[#0B132B] leading-snug">
                    Custom Software Solutions for Real Business Challenges.
                </h2>
                <p class="mt-5 text-sm leading-relaxed text-slate-500">
                    From idea to scale, we design and develop digital products that solve problems and create lasting value.
                </p>
                <a href="{{ route('services.index') }}" class="mt-7 inline-flex items-center gap-2 text-[13px] font-semibold text-[#007BFF] border-b border-[#007BFF]/40 hover:border-[#007BFF] pb-0.5 transition-colors">
                    View All Services <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

            <div class="lg:col-span-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-10">
                    @forelse($featuredServices as $index => $service)
                    <a href="{{ route('services.show', $service->slug) }}"
                       class="group relative block reveal" data-delay="{{ $index * 70 }}">
                        <span class="inline-flex w-9 h-9 items-center justify-center rounded-md bg-white border border-slate-200 text-[#007BFF] shadow-sm group-hover:border-[#007BFF]/50 transition-colors">
                            <x-icon :name="$service->icon" class="w-4 h-4" />
                        </span>
                        <h3 class="mt-4 text-sm font-bold text-[#0B132B] group-hover:text-[#007BFF] transition-colors">{{ $service->title }}</h3>
                        <p class="mt-2 text-[13px] leading-relaxed text-slate-500 line-clamp-2">{{ $service->short_description }}</p>
                        <span class="mt-4 block h-px w-full bg-slate-300/70 group-hover:bg-[#007BFF]/50 transition-colors" aria-hidden="true"></span>
                        <span class="mt-2 block text-right text-[#007BFF] opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all text-xs" aria-hidden="true">&rarr;</span>
                    </a>
                    @empty
                    <p class="text-sm text-slate-500">Services are being published shortly.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ======================================================================= --}}
{{-- 04. SELECTED WORK                                                       --}}
{{-- ======================================================================= --}}
<section class="bg-white py-20 sm:py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-wrap items-end justify-between gap-4 reveal">
            <div>
                <p class="flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-500">
                    Selected Work
                    <span class="h-px w-8 bg-slate-400" aria-hidden="true"></span>
                </p>
                <h2 class="mt-4 font-heading text-2xl sm:text-3xl font-bold tracking-tight text-[#0B132B]">
                    Real Solutions. Measurable Impact.
                </h2>
            </div>
            <a href="{{ route('portfolio.index') }}" class="text-[13px] font-semibold text-[#007BFF] hover:text-[#0056b3] inline-flex items-center gap-1.5">
                View All Projects <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($featuredProjects as $index => $project)
            @php $projectStats = $project->highlight_stats; @endphp
            <a href="{{ route('portfolio.show', $project->slug) }}"
               class="group flex flex-col bg-white border border-slate-200 hover:border-[#007BFF]/40 hover:shadow-xl hover:shadow-slate-900/5 transition-all duration-300 reveal"
               data-delay="{{ $index * 90 }}">

                <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                    <x-picture :src="$project->thumbnail" :alt="$project->title" width="800" height="500"
                               img-class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>

                <div class="p-5 flex flex-col flex-1">
                    @if($project->category)
                    <span class="self-start text-[10px] font-semibold px-2 py-1 rounded bg-[#007BFF]/10 text-[#007BFF]">{{ $project->category->name }}</span>
                    @endif

                    <h3 class="mt-3 text-[15px] font-bold text-[#0B132B] leading-snug group-hover:text-[#007BFF] transition-colors">{{ $project->title }}</h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-slate-500 line-clamp-2">{{ $project->tagline }}</p>

                    @if($projectStats->isNotEmpty())
                    <div class="mt-auto pt-5 grid grid-cols-3 gap-3 border-t border-slate-200">
                        @foreach($projectStats as $stat)
                        <div>
                            <div class="text-sm font-bold text-[#0B132B]">{{ $stat['value'] }}</div>
                            <div class="mt-0.5 text-[10px] text-slate-500 leading-tight">{{ $stat['label'] }}</div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </a>
            @empty
            <p class="col-span-full text-sm text-slate-500">Case studies are being published shortly.</p>
            @endforelse
        </div>

    </div>
</section>


{{-- ======================================================================= --}}
{{-- 05. IMPACT NUMBERS                                                      --}}
{{-- ======================================================================= --}}
@php
    $impactStats = [
        ['value' => setting('stat_projects_completed', '150+'), 'label' => 'Projects Delivered'],
        ['value' => setting('stat_happy_clients', '80+'), 'label' => 'Happy Clients'],
        ['value' => setting('stat_team_experience', '5+'), 'label' => 'Years in Business'],
        ['value' => setting('stat_uptime', '99%'), 'label' => 'Client Satisfaction'],
    ];
@endphp
<section class="bg-[#0B132B] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-4 reveal">
                <p class="flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-400">
                    Our Impact
                    <span class="h-px w-8 bg-slate-600" aria-hidden="true"></span>
                </p>
                <h2 class="mt-4 font-heading text-2xl sm:text-[1.7rem] font-bold tracking-tight leading-snug">
                    Numbers that<br class="hidden sm:block"> speak for themselves.
                </h2>
            </div>

            <div class="lg:col-span-8 grid grid-cols-2 sm:grid-cols-4 gap-8">
                @foreach($impactStats as $index => $stat)
                <div class="reveal" data-delay="{{ $index * 80 }}">
                    <div class="font-heading text-3xl sm:text-[2rem] font-bold text-white">{{ $stat['value'] }}</div>
                    <div class="mt-1.5 text-[11px] text-slate-400">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- ======================================================================= --}}
{{-- 06. OUR APPROACH                                                        --}}
{{-- ======================================================================= --}}
@php
    $processSteps = [
        ['no' => '01', 'icon' => 'users', 'title' => 'Discover', 'copy' => 'Understand your goals, users and requirements.'],
        ['no' => '02', 'icon' => 'layout', 'title' => 'Design', 'copy' => 'Create intuitive experiences and solid architecture.'],
        ['no' => '03', 'icon' => 'code', 'title' => 'Develop', 'copy' => 'Build with clean code, modern tools and best practices.'],
        ['no' => '04', 'icon' => 'shield-check', 'title' => 'Launch & Grow', 'copy' => 'Test, deploy and support for long-term success.'],
    ];
@endphp
<section class="bg-[#F4F5F7] py-20 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-5 reveal">
                <p class="flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-500">
                    Our Approach
                    <span class="h-px w-8 bg-slate-400" aria-hidden="true"></span>
                </p>
                <h2 class="mt-4 font-heading text-2xl sm:text-3xl font-bold tracking-tight text-[#0B132B] leading-snug">
                    A Clear Process,<br> Better Results.
                </h2>
            </div>
            <div class="lg:col-span-5 lg:pt-10 reveal" data-delay="90">
                <p class="text-sm leading-relaxed text-slate-500">
                    We follow a proven, agile process to ensure transparency, collaboration and on-time delivery.
                </p>
                <a href="{{ route('about') }}" class="mt-3 inline-flex items-center gap-1.5 text-[13px] font-semibold text-[#007BFF] hover:text-[#0056b3]">
                    Learn More <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>

        <div class="mt-16 relative">
            {{-- Connecting rail behind the step markers --}}
            <div class="hidden md:block absolute top-6 left-[12.5%] right-[12.5%] h-px bg-slate-300" aria-hidden="true"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 md:gap-6 relative">
                @foreach($processSteps as $index => $step)
                <div class="reveal" data-delay="{{ $index * 90 }}">
                    <span class="relative z-10 inline-flex w-12 h-12 items-center justify-center rounded-full bg-white border border-slate-300 text-[#007BFF]">
                        <x-icon :name="$step['icon']" class="w-5 h-5" />
                    </span>
                    <h3 class="mt-5 text-sm font-bold text-[#0B132B]">
                        <span class="text-slate-400 font-mono mr-1">{{ $step['no'] }}.</span>{{ $step['title'] }}
                    </h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-slate-500 max-w-[15rem]">{{ $step['copy'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>


{{-- ======================================================================= --}}
{{-- 07. WHY ZAROSOFT                                                        --}}
{{-- ======================================================================= --}}
@php
    $whyPoints = [
        'Experienced & Skilled Engineering Team',
        'Modern Tech Stack & Best Practices',
        'Security, Scalability & Performance Focus',
        'Long-Term Partnership Mindset',
    ];
    $whyStats = [
        ['value' => setting('stat_team_experience', '5+'), 'label' => 'Years of Experience'],
        ['value' => '100%', 'label' => 'Client Focused'],
        ['value' => '4.9/5', 'label' => 'Client Satisfaction'],
    ];
@endphp
<section class="bg-[#0B132B] text-white py-20 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

            <div class="lg:col-span-4 reveal">
                <div class="aspect-[4/3] overflow-hidden ring-1 ring-white/10">
                    <x-picture src="images/team-collaboration.jpg" alt="The ZaroSoft team" width="800" height="600"
                               img-class="w-full h-full object-cover" />
                </div>
            </div>

            <div class="lg:col-span-5 reveal" data-delay="90">
                <p class="flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-400">
                    Why ZaroSoft
                    <span class="h-px w-8 bg-slate-600" aria-hidden="true"></span>
                </p>
                <h2 class="mt-4 font-heading text-2xl sm:text-3xl font-bold tracking-tight leading-snug">
                    More Than Code.<br> We Build Outcomes.
                </h2>
                <p class="mt-5 text-sm leading-relaxed text-slate-400 max-w-md">
                    We combine technical excellence with business understanding to deliver software that creates real value.
                </p>

                <ul class="mt-7 space-y-3">
                    @foreach($whyPoints as $point)
                    <li class="flex items-start gap-3 text-[13px] text-slate-300">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-[#3B9BFF]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/>
                        </svg>
                        {{ $point }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-3 grid grid-cols-3 lg:grid-cols-1 gap-8 lg:gap-9 reveal" data-delay="160">
                @foreach($whyStats as $stat)
                <div>
                    <div class="font-heading text-2xl sm:text-[1.75rem] font-bold text-white">{{ $stat['value'] }}</div>
                    <div class="mt-1 text-[11px] text-slate-400">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>


{{-- ======================================================================= --}}
{{-- 08. TESTIMONIALS                                                        --}}
{{-- ======================================================================= --}}
@if($testimonials->isNotEmpty())
<section class="bg-[#F4F5F7] py-20 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-wrap items-end justify-between gap-4 reveal">
            <div>
                <p class="flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-500">
                    Testimonials
                    <span class="h-px w-8 bg-slate-400" aria-hidden="true"></span>
                </p>
                <h2 class="mt-4 font-heading text-2xl sm:text-3xl font-bold tracking-tight text-[#0B132B]">What Our Clients Say</h2>
            </div>
            <a href="{{ route('portfolio.index') }}" class="text-[13px] font-semibold text-[#007BFF] hover:text-[#0056b3] inline-flex items-center gap-1.5">
                View All Testimonials <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testimonials as $index => $testimonial)
            <figure class="flex gap-4 bg-white border border-slate-200 p-6 reveal" data-delay="{{ $index * 90 }}">
                <span class="shrink-0 w-12 h-12 rounded-full overflow-hidden bg-slate-100">
                    @if($testimonial->avatar_url)
                    <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->client_name }}" loading="lazy" decoding="async" class="w-full h-full object-cover">
                    @else
                    <span class="w-full h-full grid place-items-center text-xs font-bold text-[#007BFF]">{{ $testimonial->initials }}</span>
                    @endif
                </span>

                <div class="min-w-0">
                    <blockquote class="text-[13px] leading-relaxed text-slate-600">
                        &ldquo;{{ $testimonial->quote }}&rdquo;
                    </blockquote>
                    <figcaption class="mt-4">
                        <span class="block text-[13px] font-bold text-[#0B132B]">{{ $testimonial->client_name }}</span>
                        <span class="block text-[11px] text-slate-500">
                            {{ collect([$testimonial->client_position, $testimonial->company])->filter()->implode(', ') }}
                        </span>
                    </figcaption>
                </div>
            </figure>
            @endforeach
        </div>

    </div>
</section>
@endif


{{-- ======================================================================= --}}
{{-- 09. INSIGHTS                                                            --}}
{{-- ======================================================================= --}}
@if($latestBlogs->isNotEmpty())
<section class="bg-white py-20 sm:py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-wrap items-end justify-between gap-4 reveal">
            <div>
                <p class="flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-500">
                    Insights
                    <span class="h-px w-8 bg-slate-400" aria-hidden="true"></span>
                </p>
                <h2 class="mt-4 font-heading text-2xl sm:text-3xl font-bold tracking-tight text-[#0B132B]">Latest from Our Blog</h2>
            </div>
            <a href="{{ route('blog.index') }}" class="text-[13px] font-semibold text-[#007BFF] hover:text-[#0056b3] inline-flex items-center gap-1.5">
                View All Articles <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestBlogs as $index => $post)
            <a href="{{ route('blog.show', $post->slug) }}"
               class="group flex gap-4 border border-slate-200 hover:border-[#007BFF]/40 hover:shadow-lg hover:shadow-slate-900/5 transition-all reveal"
               data-delay="{{ $index * 90 }}">

                <div class="w-28 sm:w-32 shrink-0 overflow-hidden bg-slate-100">
                    <x-picture :src="$post->cover_image" :alt="$post->title" width="400" height="400"
                               img-class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>

                <div class="py-4 pr-4 min-w-0">
                    @if($post->category)
                    <span class="text-[10px] font-semibold uppercase tracking-[0.14em] text-[#007BFF]">{{ $post->category->name }}</span>
                    @endif
                    <h3 class="mt-1.5 text-[13px] font-bold leading-snug text-[#0B132B] group-hover:text-[#007BFF] transition-colors line-clamp-3">
                        {{ $post->title }}
                    </h3>
                    <p class="mt-3 text-[11px] text-slate-500">
                        {{ optional($post->published_at)->format('M j, Y') }}
                        @if($post->read_time)
                        <span class="mx-1.5 text-slate-300">&middot;</span>{{ $post->read_time }} min read
                        @endif
                    </p>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>
@endif


{{-- ======================================================================= --}}
{{-- 10. CLOSING CTA                                                         --}}
{{-- ======================================================================= --}}
<section class="relative bg-[#0B132B] text-white overflow-hidden border-t border-white/10">
    {{-- Dhaka's business district: where our clients and our team actually are. --}}
    <x-picture src="images/dhaka-skyline.jpg" alt="" width="1920" height="760"
               img-class="absolute inset-0 w-full h-full object-cover opacity-30" />
    <div class="absolute inset-0 bg-gradient-to-r from-[#0B132B] via-[#0B132B]/92 to-[#0B132B]/55" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-tech-grid opacity-[0.06] pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 relative z-10">
        <div class="max-w-xl reveal">
            <h2 class="font-heading text-2xl sm:text-3xl font-bold tracking-tight">Let&rsquo;s Build Something Great Together.</h2>
            <p class="mt-4 text-sm leading-relaxed text-slate-300">
                Have a project in mind? We&rsquo;d love to hear from you. Get in touch and let&rsquo;s turn your ideas into powerful digital solutions.
            </p>

            <div class="mt-7 flex flex-wrap items-center gap-5">
                <a href="{{ route('contact.index') }}"
                   class="group inline-flex items-center gap-2 px-6 py-3 rounded-md bg-[#007BFF] hover:bg-[#0069db] text-white text-[13px] font-semibold transition-colors">
                    Get a Quote <span class="transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                </a>
                <p class="text-[12px] text-slate-400">
                    Or email us at
                    <a href="mailto:{{ setting('company_email', 'hello@zarosoft.com') }}" class="text-[#3B9BFF] hover:underline">{{ setting('company_email', 'hello@zarosoft.com') }}</a>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
