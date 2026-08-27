@extends('layouts.app')

@section('title', 'All 17 Services — Software Development & Creative Solutions | ZaroSoft')
@section('meta_description', 'Explore ZaroSoft\'s complete portfolio of 17 specialized services spanning Custom ERPs, Web/Mobile Engineering, AI OCR Automations, and Modern UI/UX Brand Design.')

@section('content')
<!-- Header Hero -->
<section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden py-20 sm:py-24 bg-[#F8FAFC] border-b border-slate-200/80 text-center">
    <!-- Ambient Blue & Cyan Pulsing Glows & Grid Pattern -->
    <div class="absolute inset-0 bg-grid-pattern pointer-events-none opacity-60"></div>
    <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-[#007BFF]/10 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-glow"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-[#00D2FF]/15 rounded-full blur-[110px] pointer-events-none -z-10 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <!-- Text Layer on Top -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
            <span class="w-2 h-2 rounded-full bg-[#00D2FF] animate-ping"></span>
            Our Complete Capabilities
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#111827] leading-tight font-heading">
            Specialized <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Engineering & Creative</span> Services
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            Discover our full spectrum of 17 dedicated services organized under Software Development and Design & Creative solutions.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="#services-grid" class="px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-1 transition-all duration-300">
                Browse 17 Services ↓
            </a>
            <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-full bg-white hover:bg-slate-50 text-[#111827] font-bold text-sm border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
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
                    <span class="text-xs font-bold uppercase tracking-wider text-[#007BFF]">
                        Category {{ $loop->iteration }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#111827] font-heading">
                        {{ $category->name }}
                    </h2>
                    <p class="text-sm text-slate-600 max-w-2xl">
                        {{ $category->description }}
                    </p>
                </div>
                <span class="text-xs font-mono px-3.5 py-1.5 rounded-full bg-slate-100 text-slate-700 font-semibold border border-slate-200">
                    {{ $category->activeServices->count() }} Services
                </span>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($category->activeServices as $index => $service)
                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between group spotlight-card reveal" data-delay="{{ ($index % 3) * 120 }}">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-bold text-xl border border-[#007BFF]/20 group-hover:bg-[#007BFF] group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-md shadow-[#007BFF]/10">
                                @if($service->icon == 'globe') 🌐 
                                @elseif($service->icon == 'smartphone') 📱 
                                @elseif($service->icon == 'shopping-cart') 🛒 
                                @elseif($service->icon == 'layers') 🏢 
                                @elseif($service->icon == 'users') 👥 
                                @elseif($service->icon == 'code') 💻 
                                @elseif($service->icon == 'cloud') ☁️ 
                                @elseif($service->icon == 'cpu') 🤖 
                                @elseif($service->icon == 'server') 🖧 
                                @elseif($service->icon == 'shield-check') 🛡️ 
                                @elseif($service->icon == 'layout') 🎨 
                                @elseif($service->icon == 'image') 🖼️ 
                                @elseif($service->icon == 'target') 🎯 
                                @elseif($service->icon == 'award') 🏆 
                                @elseif($service->icon == 'video') 🎬 
                                @elseif($service->icon == 'zap') ⚡ 
                                @elseif($service->icon == 'sparkles') ✨ 
                                @else ⚡ @endif
                            </div>
                            @if($service->badge)
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#007BFF]/10 text-[#007BFF] border border-[#007BFF]/25">
                                {{ $service->badge }}
                            </span>
                            @endif
                        </div>

                        <h3 class="text-xl font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors font-heading">
                            {{ $service->title }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed">
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

                    <div class="pt-6 mt-6 border-t border-slate-200/80 flex items-center justify-between">
                        <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1 transition-all">
                            <span>Service Details & Pricing</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('contact.index', ['service' => $service->title]) }}" class="text-[11px] font-semibold text-slate-500 hover:text-[#007BFF] transition-colors">
                            Get Quote →
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
<section class="py-20 bg-[#111827] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Need a Custom Software Solution Tailored to Your Industry?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">We engineer custom architectures matching your exact specifications. Let's discuss your roadmap.</p>
        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Start a Free Discovery Call</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection
