@extends('layouts.app')

@section('title', 'ZaroSoft — Build. Innovate. Grow. | Digital Solutions')
@section('meta_description', 'Zarosoft is a global software development company that builds powerful web, mobile & digital solutions to help businesses succeed in the digital world.')

@section('content')

@php
    $heroServiceImages = [
        'website-development' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=1400&auto=format&fit=crop&q=85',
        'mobile-app-development' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=1400&auto=format&fit=crop&q=85',
        'e-commerce-development' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1400&auto=format&fit=crop&q=85',
        'erp-development' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1400&auto=format&fit=crop&q=85',
        'crm-development' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=1400&auto=format&fit=crop&q=85',
        'custom-software-development' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=1400&auto=format&fit=crop&q=85',
        'cloud-solutions' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=1400&auto=format&fit=crop&q=85',
        'ai-automation' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=1400&auto=format&fit=crop&q=85',
        'devops-infrastructure' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=1400&auto=format&fit=crop&q=85',
        'cybersecurity' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1400&auto=format&fit=crop&q=85',
        'ui-ux-design' => 'https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?w=1400&auto=format&fit=crop&q=85',
        'graphic-design' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=1400&auto=format&fit=crop&q=85',
        'branding-identity' => 'https://images.unsplash.com/photo-1523726491678-bf852e717f6a?w=1400&auto=format&fit=crop&q=85',
        'motion-design' => 'https://images.unsplash.com/photo-1618005198919-d3d4b5a92ead?w=1400&auto=format&fit=crop&q=85',
    ];
    $heroServices = $serviceCategories->flatMap(fn ($category) => $category->activeServices)->map(fn ($service) => [
        'title' => $service->title,
        'badge' => $service->badge ?: 'Digital Solution',
        'image' => $heroServiceImages[$service->slug] ?? asset('images/hero-workstation.jpg'),
    ])->values();
@endphp

<!-- ========================================================================= -->
<!-- 01. HERO SECTION (Light Neutral #F8FAFC, Dark Navy #111827 & Brand Blue #007BFF) -->
<!-- ========================================================================= -->
<section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden pt-8 pb-16 bg-[#F8FAFC]">
    <!-- Ambient Blue & Cyan Pulsing Glows -->
    <div class="absolute inset-0 bg-grid-pattern pointer-events-none opacity-60"></div>
    <div class="absolute top-1/4 right-1/4 w-[550px] h-[550px] bg-[#007BFF]/10 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-glow"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-[#00D2FF]/15 rounded-full blur-[110px] pointer-events-none -z-10 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Headline, Description & CTAs -->
            <div class="lg:col-span-6 space-y-7 text-center lg:text-left reveal-left">
                <!-- Cyan/Blue Kicker Badge with Live Pulsing Dot -->
                <div class="inline-flex items-center gap-3 px-4 py-1.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-[#00D2FF] animate-ping"></span>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">WE BUILD DIGITAL SOLUTIONS</span>
                    <span class="w-6 h-[2px] bg-[#007BFF] inline-block rounded-full"></span>
                </div>

                <!-- Main Headline with Dynamic Typewriter Animated Text -->
                <h1 class="text-4xl sm:text-5xl xl:text-6xl font-black tracking-tight text-[#111827] leading-[1.12] font-heading min-h-[3.3em] sm:min-h-[3.3em]">
                    Building Digital <br/>
                    Products That <br/>
                    <span x-data="{
                        phrases: ['Drive Real Growth', 'Automate Operations', 'Scale Globally', 'Transform Enterprise', 'Empower Business'],
                        phraseIdx: 0,
                        charIdx: 0,
                        displayText: '',
                        isDeleting: false,
                        init() {
                            this.typeLoop();
                        },
                        typeLoop() {
                            const currentPhrase = this.phrases[this.phraseIdx];
                            if (this.isDeleting) {
                                this.displayText = currentPhrase.substring(0, this.charIdx - 1);
                                this.charIdx--;
                            } else {
                                this.displayText = currentPhrase.substring(0, this.charIdx + 1);
                                this.charIdx++;
                            }

                            let speed = this.isDeleting ? 40 : 85;

                            if (!this.isDeleting && this.charIdx === currentPhrase.length) {
                                speed = 2200;
                                this.isDeleting = true;
                            } else if (this.isDeleting && this.charIdx === 0) {
                                this.isDeleting = false;
                                this.phraseIdx = (this.phraseIdx + 1) % this.phrases.length;
                                speed = 450;
                            }

                            setTimeout(() => this.typeLoop(), speed);
                        }
                    }" class="inline-flex items-center flex-wrap">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF] drop-shadow-[0_2px_12px_rgba(0,123,255,0.25)]" 
                              x-text="displayText || '\u00A0'">
                            Drive Real Growth
                        </span>
                        <span class="inline-block w-[3px] sm:w-[4px] h-[0.9em] bg-[#007BFF] ml-1.5 animate-cursor rounded-full shadow-[0_0_10px_rgba(0,123,255,0.8)]"></span>
                    </span>
                </h1>

                <!-- Subtitle (Clear and comfortable to read) -->
                <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
                    Zarosoft is a global software development company that builds powerful web, mobile & digital solutions to help businesses succeed in the digital world.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <!-- Primary CTA Button (Primary Color #007BFF) -->
                    <a href="{{ route('services.index') }}" 
                       class="w-full sm:w-auto px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2.5 group">
                        <span>Explore Services</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <!-- Secondary Action Button (Accent White with Border) -->
                    <a href="{{ route('portfolio.index') }}" 
                       class="w-full sm:w-auto px-8 py-4 rounded-full bg-white hover:bg-slate-50 text-[#111827] font-bold text-sm border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-[#007BFF]/10 flex items-center justify-center text-[10px] text-[#007BFF]">▶</span>
                        <span>View Our Work</span>
                    </a>
                </div>

                <!-- Trust Highlight Badges Row -->
                <div class="pt-6 border-t border-slate-200 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-slate-700 font-medium">
                    <div class="flex items-center gap-2 hover:text-[#007BFF] transition-colors">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-xs shadow-sm">🎧</span>
                        <span>On-Time Delivery</span>
                    </div>
                    <div class="flex items-center gap-2 hover:text-[#007BFF] transition-colors">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-xs shadow-sm">🛡️</span>
                        <span>Secure & Scalable</span>
                    </div>
                    <div class="flex items-center gap-2 hover:text-[#007BFF] transition-colors">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-xs shadow-sm">🕒</span>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Automatically Animated Service Showcase -->
            <div class="lg:col-span-6 relative reveal-right">
                <div class="relative mx-auto max-w-lg lg:max-w-none" data-tilt>
                    <!-- Ambient Blue/Cyan Neon Backlight -->
                    <div class="absolute -inset-2 bg-gradient-to-r from-[#007BFF] via-[#00C2FF] to-[#00D2FF] rounded-3xl blur-2xl opacity-25 hover:opacity-50 transition duration-700"></div>

                    <!-- Each service changes automatically every 4 seconds -->
                    <div x-data="{
                            services: @js($heroServices),
                            active: 0,
                            timer: null,
                            init() { this.timer = setInterval(() => this.next(), 4000) },
                            next() { this.active = (this.active + 1) % this.services.length },
                            select(index) { this.active = index; clearInterval(this.timer); this.timer = setInterval(() => this.next(), 4000) }
                         }"
                         class="relative rounded-3xl overflow-hidden border border-slate-200/80 bg-white shadow-2xl shadow-slate-900/10 group h-[400px]">
                        <template x-for="(service, index) in services" :key="service.title">
                            <img x-show="active === index" x-cloak
                                 x-transition:enter="transition ease-out duration-700"
                                 x-transition:enter-start="opacity-0 scale-105"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-500"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 :src="service.image"
                                 :alt="service.title + ' solution by ZaroSoft'"
                                 class="absolute inset-0 w-full h-full object-cover object-center">
                        </template>

                        <div class="absolute inset-0 bg-gradient-to-t from-[#111827]/40 via-transparent to-transparent opacity-60"></div>

                        <!-- Current service name -->
                        <div class="absolute left-5 bottom-5 right-5 text-left text-white pointer-events-none">
                            <p class="text-[10px] font-bold tracking-[0.18em] uppercase text-cyan-200" x-text="services[active]?.badge"></p>
                            <p class="mt-1 text-xl font-black" x-text="services[active]?.title"></p>
                            <p class="mt-1 text-xs text-slate-200">Custom-built for your business workflow</p>
                        </div>

                        <!-- Floating Micro Element 1: Top-Left Uptime SLA -->
                        <div class="absolute top-5 left-5 p-3 rounded-2xl bg-white/95 backdrop-blur-md border border-slate-200/80 shadow-xl animate-float flex items-center gap-3 pointer-events-none">
                            <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                            <div class="text-left">
                                <p class="text-[11px] font-bold text-[#111827] leading-none">System Active</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">99.99% Cloud SLA</p>
                            </div>
                        </div>

                        <!-- Floating Micro Element 2: Bottom-Right Deployments -->
                        <div class="absolute bottom-5 right-5 p-3 rounded-2xl bg-white/95 backdrop-blur-md border border-[#007BFF]/30 shadow-xl animate-float-delayed flex items-center gap-3 pointer-events-none">
                            <span class="text-base">🚀</span>
                            <div class="text-left">
                                <p class="text-[11px] font-bold text-[#111827] leading-none">50+ Enterprise Deployments</p>
                                <p class="text-[9px] text-[#007BFF] font-semibold mt-0.5">Production Ready</p>
                            </div>
                        </div>

                        <!-- Click a dot to view a specific service -->
                        <div class="absolute top-5 right-5 flex max-w-[170px] flex-wrap justify-end gap-1.5">
                            <template x-for="(service, index) in services" :key="service.title + '-dot'">
                                <button type="button" @click="select(index)" :aria-label="'Show ' + service.title"
                                        class="h-1.5 rounded-full transition-all duration-300"
                                        :class="active === index ? 'w-6 bg-[#00D2FF]' : 'w-1.5 bg-white/70 hover:bg-white'"></button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 02. TRUSTED BY GLOBAL BUSINESSES STRIP (Infinite Animated Marquee) -->
<!-- ========================================================================= -->
<section class="py-7 border-y border-slate-200/80 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4 flex items-center justify-between">
        <span class="text-[11px] font-extrabold uppercase tracking-widest text-slate-500 flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF]"></span>
            TRUSTED BY GLOBAL BUSINESSES & TECH LEADERS
        </span>
        <a href="{{ route('about') }}" class="px-4 py-1.5 rounded-full text-xs font-bold text-slate-700 bg-slate-100 hover:bg-[#007BFF] hover:text-white border border-slate-200 transition-colors">
            View All Clients →
        </a>
    </div>

    <!-- Infinite Scrolling Marquee Track -->
    <div class="relative w-full overflow-hidden [mask-image:linear-gradient(to_right,transparent,white_15%,white_85%,transparent)]">
        <div class="animate-marquee flex items-center gap-14 sm:gap-20 py-2">
            <!-- Set 1 -->
            <span class="text-lg font-black tracking-tight text-slate-800 flex items-center gap-1 font-heading opacity-80 hover:opacity-100 transition-opacity">
                <span class="text-blue-500">G</span><span class="text-red-500">o</span><span class="text-amber-500">o</span><span class="text-blue-500">g</span><span class="text-green-500">l</span><span class="text-red-500">e</span>
            </span>
            <span class="text-sm font-bold tracking-tight text-slate-800 flex items-center gap-2 opacity-80 hover:opacity-100 transition-opacity">
                <span class="grid grid-cols-2 gap-0.5 w-3.5 h-3.5"><span class="bg-red-500 rounded-sm"></span><span class="bg-green-500 rounded-sm"></span><span class="bg-blue-500 rounded-sm"></span><span class="bg-amber-500 rounded-sm"></span></span>
                <span>Microsoft</span>
            </span>
            <span class="text-sm font-black tracking-widest text-amber-600 uppercase opacity-80 hover:opacity-100 transition-opacity">AWS Cloud</span>
            <span class="text-sm font-black italic tracking-tight text-[#007BFF] opacity-80 hover:opacity-100 transition-opacity">PayPal</span>
            <span class="text-sm font-black tracking-tight text-indigo-600 opacity-80 hover:opacity-100 transition-opacity">stripe</span>
            <span class="text-sm font-bold tracking-tight text-emerald-600 flex items-center gap-1.5 opacity-80 hover:opacity-100 transition-opacity">
                <span>🛍️</span><span>shopify</span>
            </span>
            <span class="text-sm font-black tracking-wider text-rose-600 uppercase opacity-80 hover:opacity-100 transition-opacity">ORACLE</span>
            <span class="text-sm font-black tracking-tight text-[#00A8FF] opacity-80 hover:opacity-100 transition-opacity">Salesforce</span>

            <!-- Set 2 (Duplicate for smooth infinite loop) -->
            <span class="text-lg font-black tracking-tight text-slate-800 flex items-center gap-1 font-heading opacity-80 hover:opacity-100 transition-opacity">
                <span class="text-blue-500">G</span><span class="text-red-500">o</span><span class="text-amber-500">o</span><span class="text-blue-500">g</span><span class="text-green-500">l</span><span class="text-red-500">e</span>
            </span>
            <span class="text-sm font-bold tracking-tight text-slate-800 flex items-center gap-2 opacity-80 hover:opacity-100 transition-opacity">
                <span class="grid grid-cols-2 gap-0.5 w-3.5 h-3.5"><span class="bg-red-500 rounded-sm"></span><span class="bg-green-500 rounded-sm"></span><span class="bg-blue-500 rounded-sm"></span><span class="bg-amber-500 rounded-sm"></span></span>
                <span>Microsoft</span>
            </span>
            <span class="text-sm font-black tracking-widest text-amber-600 uppercase opacity-80 hover:opacity-100 transition-opacity">AWS Cloud</span>
            <span class="text-sm font-black italic tracking-tight text-[#007BFF] opacity-80 hover:opacity-100 transition-opacity">PayPal</span>
            <span class="text-sm font-black tracking-tight text-indigo-600 opacity-80 hover:opacity-100 transition-opacity">stripe</span>
            <span class="text-sm font-bold tracking-tight text-emerald-600 flex items-center gap-1.5 opacity-80 hover:opacity-100 transition-opacity">
                <span>🛍️</span><span>shopify</span>
            </span>
            <span class="text-sm font-black tracking-wider text-rose-600 uppercase opacity-80 hover:opacity-100 transition-opacity">ORACLE</span>
            <span class="text-sm font-black tracking-tight text-[#00A8FF] opacity-80 hover:opacity-100 transition-opacity">Salesforce</span>
        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 03. WHAT WE DO — AMAZING SOLUTIONS FOR YOUR BUSINESS -->
<!-- ========================================================================= -->
<section class="py-24 bg-[#F8FAFC] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16 reveal">
            <div class="space-y-3 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                    WHAT WE DO
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#111827] font-heading">
                    Amazing Solutions <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">For Your Business</span>
                </h2>
            </div>

            <div class="space-y-4 max-w-lg lg:text-right flex flex-col lg:items-end">
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    We provide end-to-end digital solutions using modern technologies to help startups, SMEs & enterprises transform their ideas into real products.
                </p>
                <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full text-xs font-bold text-[#111827] bg-white hover:bg-[#007BFF] hover:text-white border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                    <span>All 17 Services</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- 6 Service Cards Grid (Staggered Scroll Reveal + Spotlight + 3D Tilt) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
            
            <!-- 1. Software Development -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between spotlight-card reveal" data-delay="0" data-tilt>
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-black text-lg border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-md shadow-[#007BFF]/10">
                        &lt;/&gt;
                    </div>
                    <h3 class="text-base font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors font-heading">
                        Software Development
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Custom software, ERP, CRM & enterprise solutions.
                    </p>
                </div>
                <div class="pt-5 mt-4 border-t border-slate-100">
                    <a href="{{ route('services.show', 'erp-development') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1.5 transition-transform duration-300">
                        <span>Learn More</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- 2. Web Development -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between spotlight-card reveal" data-delay="100" data-tilt>
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-[#00D2FF]/15 text-[#007BFF] flex items-center justify-center font-black text-xl border border-[#00D2FF]/30 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-md shadow-[#00D2FF]/10">
                        🌐
                    </div>
                    <h3 class="text-base font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors font-heading">
                        Web Development
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        High-performance websites & web applications.
                    </p>
                </div>
                <div class="pt-5 mt-4 border-t border-slate-100">
                    <a href="{{ route('services.show', 'website-development') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1.5 transition-transform duration-300">
                        <span>Learn More</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- 3. Mobile App Development -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between spotlight-card reveal" data-delay="200" data-tilt>
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-600 flex items-center justify-center font-black text-xl border border-purple-500/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-md shadow-purple-600/10">
                        📱
                    </div>
                    <h3 class="text-base font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors font-heading">
                        Mobile App Development
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Android, iOS & Flutter apps that deliver seamless experiences.
                    </p>
                </div>
                <div class="pt-5 mt-4 border-t border-slate-100">
                    <a href="{{ route('services.show', 'mobile-app-development') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1.5 transition-transform duration-300">
                        <span>Learn More</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- 4. UI/UX Design -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between spotlight-card reveal" data-delay="300" data-tilt>
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center font-black text-xl border border-amber-500/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-md shadow-amber-600/10">
                        ✏️
                    </div>
                    <h3 class="text-base font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors font-heading">
                        UI/UX Design
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Modern, intuitive & user-friendly designs that convert.
                    </p>
                </div>
                <div class="pt-5 mt-4 border-t border-slate-100">
                    <a href="{{ route('services.show', 'ui-ux-design') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1.5 transition-transform duration-300">
                        <span>Learn More</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- 5. Digital Marketing -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between spotlight-card reveal" data-delay="400" data-tilt>
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-[#00D2FF]/15 text-[#007BFF] flex items-center justify-center font-black text-xl border border-[#00D2FF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-md shadow-[#00D2FF]/10">
                        📢
                    </div>
                    <h3 class="text-base font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors font-heading">
                        Digital Marketing
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        SEO, Social Media, Ads & content strategies that drive growth.
                    </p>
                </div>
                <div class="pt-5 mt-4 border-t border-slate-100">
                    <a href="{{ route('services.show', 'digital-marketing') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1.5 transition-transform duration-300">
                        <span>Learn More</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- 6. Cloud & DevOps Solutions -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between spotlight-card reveal" data-delay="500" data-tilt>
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center font-black text-xl border border-blue-500/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-md shadow-blue-600/10">
                        ☁️
                    </div>
                    <h3 class="text-base font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors font-heading">
                        Cloud & DevOps Solutions
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Scalable cloud infrastructure & DevOps consulting.
                    </p>
                </div>
                <div class="pt-5 mt-4 border-t border-slate-100">
                    <a href="{{ route('services.show', 'cloud-solutions') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1.5 transition-transform duration-300">
                        <span>Learn More</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- 04. OUR PORTFOLIO — OUR RECENT FEATURED PROJECTS -->
<!-- ========================================================================= -->
<section class="py-24 bg-white border-t border-slate-200/80 relative overflow-hidden" x-data="{ activeFilter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-12 reveal">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                    OUR PORTFOLIO
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#111827] font-heading">
                    Our Recent <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Featured Projects</span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 max-w-md">
                    We take pride in delivering innovative solutions that make a real impact.
                </p>
                <div class="pt-2">
                    <a href="{{ route('portfolio.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full text-xs font-bold text-white bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] shadow-lg shadow-[#007BFF]/25 hover:-translate-y-0.5 transition-all">
                        <span>View All Projects</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap items-center gap-2">
                <button @click="activeFilter = 'all'" 
                        :class="activeFilter === 'all' ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#111827] hover:bg-slate-200 border border-slate-200'"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all hover:scale-105">
                    All
                </button>
                <button @click="activeFilter = 'web'" 
                        :class="activeFilter === 'web' ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#111827] hover:bg-slate-200 border border-slate-200'"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all hover:scale-105">
                    Web Development
                </button>
                <button @click="activeFilter = 'mobile'" 
                        :class="activeFilter === 'mobile' ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#111827] hover:bg-slate-200 border border-slate-200'"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all hover:scale-105">
                    Mobile Apps
                </button>
                <button @click="activeFilter = 'software'" 
                        :class="activeFilter === 'software' ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#111827] hover:bg-slate-200 border border-slate-200'"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all hover:scale-105">
                    Software
                </button>
                <button @click="activeFilter = 'uiux'" 
                        :class="activeFilter === 'uiux' ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#111827] hover:bg-slate-200 border border-slate-200'"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all hover:scale-105">
                    UI/UX Design
                </button>
            </div>
        </div>

        <!-- 4 Featured Project Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Project 1: SaaS Dashboard -->
            <div x-show="activeFilter === 'all' || activeFilter === 'web' || activeFilter === 'software'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="rounded-2xl overflow-hidden bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 group transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between spotlight-card reveal" data-delay="0">
                <div class="h-48 overflow-hidden bg-slate-950 relative">
                    <img src="{{ asset('images/project-saas.jpg') }}" alt="SaaS Dashboard" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-5 flex items-center justify-between border-t border-slate-100">
                    <div>
                        <h3 class="text-sm font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">SaaS Dashboard</h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">Web Application</p>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 group-hover:bg-[#007BFF] group-hover:text-white group-hover:translate-x-1 flex items-center justify-center text-xs transition-all shadow-sm">
                        →
                    </span>
                </div>
            </div>

            <!-- Project 2: Food Delivery App -->
            <div x-show="activeFilter === 'all' || activeFilter === 'mobile' || activeFilter === 'uiux'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="rounded-2xl overflow-hidden bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 group transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between spotlight-card reveal" data-delay="100">
                <div class="h-48 overflow-hidden bg-slate-950 relative">
                    <img src="{{ asset('images/project-food.jpg') }}" alt="Food Delivery App" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-5 flex items-center justify-between border-t border-slate-100">
                    <div>
                        <h3 class="text-sm font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">Food Delivery App</h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">Mobile Application</p>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 group-hover:bg-[#007BFF] group-hover:text-white group-hover:translate-x-1 flex items-center justify-center text-xs transition-all shadow-sm">
                        →
                    </span>
                </div>
            </div>

            <!-- Project 3: Zarosoft CRM -->
            <div x-show="activeFilter === 'all' || activeFilter === 'web' || activeFilter === 'software'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="rounded-2xl overflow-hidden bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 group transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between spotlight-card reveal" data-delay="200">
                <div class="h-48 overflow-hidden bg-slate-950 relative">
                    <img src="{{ asset('images/project-crm.jpg') }}" alt="Zarosoft CRM" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-5 flex items-center justify-between border-t border-slate-100">
                    <div>
                        <h3 class="text-sm font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">Zarosoft CRM</h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">Web Application</p>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 group-hover:bg-[#007BFF] group-hover:text-white group-hover:translate-x-1 flex items-center justify-center text-xs transition-all shadow-sm">
                        →
                    </span>
                </div>
            </div>

            <!-- Project 4: eCommerce Platform -->
            <div x-show="activeFilter === 'all' || activeFilter === 'web' || activeFilter === 'uiux'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="rounded-2xl overflow-hidden bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 group transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between spotlight-card reveal" data-delay="300">
                <div class="h-48 overflow-hidden bg-slate-950 relative">
                    <img src="{{ asset('images/project-saas.jpg') }}" alt="eCommerce Platform" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-5 flex items-center justify-between border-t border-slate-100">
                    <div>
                        <h3 class="text-sm font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">eCommerce Platform</h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">Web Development</p>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 group-hover:bg-[#007BFF] group-hover:text-white group-hover:translate-x-1 flex items-center justify-center text-xs transition-all shadow-sm">
                        →
                    </span>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- 05. KEY STATS STRIP (Dark Navy #111827 High-Impact Anchor) -->
<!-- ========================================================================= -->
<section class="py-14 bg-[#111827] border-y border-slate-800 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-slate-800">
            
            <div class="flex items-center justify-center gap-3.5 pt-4 md:pt-0 reveal-scale" data-delay="0">
                <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center text-xl shrink-0 border border-[#00D2FF]/30 shadow-lg shadow-[#007BFF]/20">
                    👥
                </div>
                <div class="text-left">
                    <p class="text-2xl sm:text-3xl font-black text-white font-heading" data-counter="150" data-suffix="+">150+</p>
                    <p class="text-[11px] font-semibold text-slate-400">Happy Clients</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3.5 pt-4 md:pt-0 reveal-scale" data-delay="100">
                <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center text-xl shrink-0 border border-[#00D2FF]/30 shadow-lg shadow-[#007BFF]/20">
                    💼
                </div>
                <div class="text-left">
                    <p class="text-2xl sm:text-3xl font-black text-white font-heading" data-counter="250" data-suffix="+">250+</p>
                    <p class="text-[11px] font-semibold text-slate-400">Projects Completed</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3.5 pt-4 md:pt-0 reveal-scale" data-delay="200">
                <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center text-xl shrink-0 border border-[#00D2FF]/30 shadow-lg shadow-[#007BFF]/20">
                    👨‍💻
                </div>
                <div class="text-left">
                    <p class="text-2xl sm:text-3xl font-black text-white font-heading" data-counter="20" data-suffix="+">20+</p>
                    <p class="text-[11px] font-semibold text-slate-400">Expert Team Members</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3.5 pt-4 md:pt-0 reveal-scale" data-delay="300">
                <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center text-xl shrink-0 border border-[#00D2FF]/30 shadow-lg shadow-[#007BFF]/20">
                    🏆
                </div>
                <div class="text-left">
                    <p class="text-2xl sm:text-3xl font-black text-white font-heading" data-counter="5" data-suffix="+">5+</p>
                    <p class="text-[11px] font-semibold text-slate-400">Years of Experience</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3.5 pt-4 md:pt-0 reveal-scale" data-delay="400">
                <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center text-xl shrink-0 border border-[#00D2FF]/30 shadow-lg shadow-[#007BFF]/20">
                    🎧
                </div>
                <div class="text-left">
                    <p class="text-2xl sm:text-3xl font-black text-white font-heading" data-counter="24" data-suffix="/7">24/7</p>
                    <p class="text-[11px] font-semibold text-slate-400">Support Available</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 06. WHY CHOOSE ZAROSOFT — WE COMBINE CREATIVITY WITH TECHNOLOGY -->
<!-- ========================================================================= -->
<section class="py-24 bg-[#F8FAFC] relative overflow-hidden">
    <!-- Ambient Blue Glow -->
    <div class="absolute top-1/2 left-0 w-[500px] h-[500px] bg-[#007BFF]/10 rounded-full blur-[140px] pointer-events-none -z-10 animate-pulse-glow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: 6 Feature Points (Scroll Reveal Left) -->
            <div class="lg:col-span-7 space-y-6 reveal-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                    WHY CHOOSE ZAROSOFT
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#111827] font-heading">
                    We Combine Creativity <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">With Technology</span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed max-w-xl">
                    We don't just build software; we build long-term partnerships with our clients to drive measurable bottom-line growth.
                </p>

                <!-- 6 Feature Grid with Spotlight & Hover Micro-Transitions -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-4">
                    
                    <!-- 1. Experienced Team -->
                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 spotlight-card group">
                        <div class="w-10 h-10 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-base shrink-0 mt-0.5 border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 transition-all shadow-sm">
                            👥
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">Experienced Team</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                Skilled engineers & architects with hands-on industry experience.
                            </p>
                        </div>
                    </div>

                    <!-- 2. Affordable Pricing -->
                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 spotlight-card group">
                        <div class="w-10 h-10 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-base shrink-0 mt-0.5 border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 transition-all shadow-sm">
                            💳
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">Affordable Pricing</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                Transparent, zero-hidden-cost pricing models tailored to your budget.
                            </p>
                        </div>
                    </div>

                    <!-- 3. Rapid Prototyping -->
                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 spotlight-card group">
                        <div class="w-10 h-10 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-base shrink-0 mt-0.5 border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 transition-all shadow-sm">
                            ⚡
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">Rapid Prototyping</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                Fast 2-week sprint cycles with live demo staging environments.
                            </p>
                        </div>
                    </div>

                    <!-- 4. On-Time Delivery -->
                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 spotlight-card group">
                        <div class="w-10 h-10 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-base shrink-0 mt-0.5 border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 transition-all shadow-sm">
                            ⏱️
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">On-Time Delivery</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                Guaranteed milestones and SLA delivery deadlines.
                            </p>
                        </div>
                    </div>

                    <!-- 5. Agile Governance -->
                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 spotlight-card group">
                        <div class="w-10 h-10 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-base shrink-0 mt-0.5 border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 transition-all shadow-sm">
                            🎯
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">Agile Governance</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                Direct founder access and weekly progress sync reports.
                            </p>
                        </div>
                    </div>

                    <!-- 6. Long-term Support -->
                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 spotlight-card group">
                        <div class="w-10 h-10 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-base shrink-0 mt-0.5 border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 transition-all shadow-sm">
                            🛡️
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">Long-term Support</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                24/7 server monitoring, security patches & software enhancements.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Column: Collaboration Team Image with 3D Parallax Tilt -->
            <div class="lg:col-span-5 relative reveal-right">
                <div class="relative rounded-3xl overflow-hidden border border-slate-200/80 bg-white shadow-2xl shadow-slate-900/10 group" data-tilt>
                    <img src="{{ asset('images/team-collaboration.jpg') }}" alt="ZaroSoft Team Collaboration" class="w-full h-full object-cover transform group-hover:scale-[1.03] transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#111827]/40 via-transparent to-transparent opacity-60"></div>
                    
                    <!-- Floating Badge -->
                    <div class="absolute bottom-5 left-5 right-5 p-3 rounded-2xl bg-white/95 backdrop-blur-md border border-slate-200/80 shadow-xl flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[#111827] font-bold">Engineering Team Active</span>
                        </div>
                        <span class="text-[#007BFF] font-bold text-[11px]">Dhaka • Global</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- 07. CLIENT TESTIMONIALS & CTA (LET'S BUILD SOMETHING EXTRAORDINARY) -->
<!-- ========================================================================= -->
<section class="py-24 bg-white relative overflow-hidden">
    <!-- Ambient Cyan/Blue Nebula -->
    <div class="absolute bottom-0 right-10 w-[600px] h-[600px] bg-[#007BFF]/10 rounded-full blur-[140px] pointer-events-none animate-pulse-glow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Top Split: Headline + Checkmarks + 3D Rocket Visual -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-16">
            <div class="lg:col-span-7 space-y-6 reveal-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                    CLIENT TESTIMONIALS & REVIEWS
                </div>
                <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-[#111827] leading-tight font-heading">
                    Let's Build Something <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Extraordinary Together!</span>
                </h2>

                <!-- 4 Checkpoints List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-xs text-slate-700 font-medium">
                    <div class="flex items-center gap-2.5 p-2 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="w-5 h-5 rounded-full bg-[#007BFF]/15 text-[#007BFF] flex items-center justify-center text-xs">✓</span>
                        <span>Professional & Experienced Team</span>
                    </div>
                    <div class="flex items-center gap-2.5 p-2 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="w-5 h-5 rounded-full bg-[#007BFF]/15 text-[#007BFF] flex items-center justify-center text-xs">✓</span>
                        <span>Affordable & Scalable Pricing</span>
                    </div>
                    <div class="flex items-center gap-2.5 p-2 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="w-5 h-5 rounded-full bg-[#007BFF]/15 text-[#007BFF] flex items-center justify-center text-xs">✓</span>
                        <span>On-Time Delivery Guarantee</span>
                    </div>
                    <div class="flex items-center gap-2.5 p-2 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="w-5 h-5 rounded-full bg-[#007BFF]/15 text-[#007BFF] flex items-center justify-center text-xs">✓</span>
                        <span>24/7 Dedicated Support</span>
                    </div>
                </div>

                <div class="pt-3">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full text-xs font-bold text-white bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                        <span>Schedule Consultation Call →</span>
                    </a>
                </div>
            </div>

            <!-- 3D Rocket Launch Image with Floating Flare -->
            <div class="lg:col-span-5 relative flex justify-center lg:justify-end reveal-right">
                <div class="relative w-72 sm:w-80 h-72 sm:h-80 rounded-3xl overflow-hidden border border-slate-200/80 shadow-2xl bg-white group" data-tilt>
                    <img src="{{ asset('images/rocket-launch.jpg') }}" alt="Let's Launch Your Project" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#111827]/40 via-transparent to-transparent opacity-60"></div>
                    
                    <div class="absolute bottom-4 left-4 right-4 p-3 rounded-2xl bg-white/95 backdrop-blur-md border border-slate-200/80 text-center shadow-xl animate-float">
                        <p class="text-xs font-bold text-[#111827]">🚀 Ready to Launch in 2 Weeks</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Testimonial Cards (Staggered Scroll Reveal + Spotlight) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Testimonial 1 -->
            <div class="p-7 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between space-y-5 spotlight-card reveal" data-delay="0">
                <!-- 5 Cyan/Blue Stars -->
                <div class="flex items-center gap-1 text-[#007BFF] text-sm">
                    ★★★★★
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Zarosoft delivered our custom ERP system on time with exceptional code quality. Their engineering team is responsive and brilliant."
                </p>
                <div class="flex items-center gap-3 pt-3 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#007BFF] to-[#00D2FF] p-0.5 shadow-sm">
                        <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-xs font-bold text-[#007BFF]">
                            JD
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#111827]">John Doe</h4>
                        <p class="text-[10px] text-slate-500">CEO, TechNova Systems</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="p-7 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between space-y-5 spotlight-card reveal" data-delay="120">
                <!-- 5 Cyan/Blue Stars -->
                <div class="flex items-center gap-1 text-[#007BFF] text-sm">
                    ★★★★★
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Great experience working with Zarosoft. They understood our complex business logic perfectly and built a high-speed e-commerce portal."
                </p>
                <div class="flex items-center gap-3 pt-3 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#007BFF] to-[#00D2FF] p-0.5 shadow-sm">
                        <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-xs font-bold text-[#007BFF]">
                            SS
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#111827]">Sarah Smith</h4>
                        <p class="text-[10px] text-slate-500">Head of Operations, Global Retail</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="p-7 rounded-2xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-md hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between space-y-5 spotlight-card reveal" data-delay="240">
                <!-- 5 Cyan/Blue Stars -->
                <div class="flex items-center gap-1 text-[#007BFF] text-sm">
                    ★★★★★
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Highly recommended! The team is skilled, dependable, and provides outstanding ongoing maintenance and cloud scaling support."
                </p>
                <div class="flex items-center gap-3 pt-3 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#007BFF] to-[#00D2FF] p-0.5 shadow-sm">
                        <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-xs font-bold text-[#007BFF]">
                            MB
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#111827]">Michael Brown</h4>
                        <p class="text-[10px] text-slate-500">Founder, ShopEasy FinTech</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
