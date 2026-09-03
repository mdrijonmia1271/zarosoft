@extends('layouts.app')

@section('title', 'Specialized Engineering & Design Services — ZaroSoft')
@section('meta_description', 'Explore ZaroSoft\'s complete portfolio of 17 specialized services spanning Custom ERPs, Web & Mobile Engineering, AI OCR Automations, and Modern UI/UX Brand Systems.')

@section('content')
<!-- Header Hero -->
<section class="relative overflow-hidden py-16 sm:py-20 bg-[#F8FAFC] border-b border-slate-200/80 text-center">
    <!-- Ambient Tech Glows & Grid Pattern -->
    <div class="absolute inset-0 bg-tech-grid pointer-events-none opacity-70"></div>
    <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-[#007BFF]/10 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-glow"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-[#00D2FF]/15 rounded-full blur-[110px] pointer-events-none -z-10 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            COMPLETE CAPABILITIES
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
            Specialized <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Engineering & Creative</span> Capabilities
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            Explore our complete spectrum of 17 specialized services spanning bespoke Enterprise ERPs, Web/Mobile Applications, AI OCR pipelines, and Modern UI/UX Brand Systems.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="#services-grid" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0062cc] hover:from-[#0062cc] hover:to-[#004bb5] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                Browse All 17 Services ↓
            </a>
            <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-xl bg-white hover:bg-slate-50 text-[#0F172A] font-bold text-sm border border-slate-200 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                Get Custom Quote →
            </a>
        </div>
    </div>
</section>

<!-- Services Directory -->
<section class="py-24 bg-white relative overflow-hidden" id="services-grid">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24 relative z-10">
        
        @foreach($categories as $category)
        <div id="{{ $category->slug }}" class="space-y-10">
            <!-- Category Header -->
            <div class="border-b border-slate-200/80 pb-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4 reveal">
                <div class="space-y-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#007BFF] font-mono">
                        Domain {{ sprintf('%02d', $loop->iteration) }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#0F172A] font-heading">
                        {{ $category->name }}
                    </h2>
                    <p class="text-sm text-slate-600 max-w-2xl">
                        {{ $category->description }}
                    </p>
                </div>
                <span class="text-xs font-mono px-3 py-1 rounded-full bg-slate-100 text-slate-700 font-semibold border border-slate-200">
                    {{ $category->activeServices->count() }} Specialized Services
                </span>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($category->activeServices as $index => $service)
                <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group spotlight-card reveal" data-delay="{{ ($index % 3) * 100 }}">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-bold border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-105 transition-all duration-300 shadow-md shadow-[#007BFF]/10">
                                @if($service->icon == 'globe')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                @elseif($service->icon == 'smartphone')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                @elseif($service->icon == 'shopping-cart')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                @elseif($service->icon == 'layers')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                @elseif($service->icon == 'users')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                @elseif($service->icon == 'code')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                @elseif($service->icon == 'cloud')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                                @elseif($service->icon == 'cpu')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                                @elseif($service->icon == 'server')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                                @elseif($service->icon == 'shield-check')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                @elseif($service->icon == 'layout')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                @elseif($service->icon == 'image')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                @elseif($service->icon == 'target')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @elseif($service->icon == 'award')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                                @elseif($service->icon == 'video')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                @elseif($service->icon == 'zap')
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                @endif
                            </div>
                            @if($service->badge)
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#007BFF]/10 text-[#007BFF] border border-[#007BFF]/25 font-mono">
                                {{ $service->badge }}
                            </span>
                            @endif
                        </div>

                        <h3 class="text-lg font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors font-heading">
                            {{ $service->title }}
                        </h3>

                        <p class="text-xs text-slate-600 leading-relaxed line-clamp-3">
                            {{ $service->short_description }}
                        </p>

                        @if($service->features && is_array($service->features))
                        <div class="space-y-1.5 pt-3 border-t border-slate-200/80">
                            @foreach(array_slice($service->features, 0, 3) as $feat)
                            <div class="flex items-center gap-2 text-xs text-slate-600">
                                <svg class="w-3.5 h-3.5 text-[#007BFF] shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span class="truncate">{{ $feat }}</span>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="pt-5 mt-5 border-t border-slate-200/80 flex items-center justify-between">
                        <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#007BFF] hover:text-[#0052b3] group-hover:translate-x-1 transition-all">
                            <span>Specifications & Deliverables</span>
                            <span>→</span>
                        </a>
                        <a href="{{ route('contact.index', ['service' => $service->title]) }}" class="text-[11px] font-medium text-slate-500 hover:text-[#007BFF] transition-colors">
                            Quote →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-[#0B132B] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-tech-grid opacity-20 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Need a Custom Software Solution Tailored to Your Industry?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">We engineer bespoke architectures matching your exact specifications. Let's discuss your roadmap.</p>
        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Start a Free Discovery Call</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection

