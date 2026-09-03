@extends('layouts.app')

@section('title', 'Industry & Enterprise Solutions — ZaroSoft')
@section('meta_description', 'Discover bespoke industry software solutions engineered by ZaroSoft for Manufacturing, Retail, Healthcare, Education, FinTech, and Logistics.')

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
            INDUSTRY-SPECIFIC ENGINEERING
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
            Tailored Architectures For <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Your Vertical.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            We adapt software architectures around your unique operational rules, supply chain dynamics, and regulatory compliance standards.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="#industries" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0062cc] hover:from-[#0062cc] hover:to-[#004bb5] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                Explore 6 Industries ↓
            </a>
            <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-xl bg-white hover:bg-slate-50 text-[#0F172A] font-bold text-sm border border-slate-200 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                Request Discovery Session →
            </a>
        </div>
    </div>
</section>

<!-- Industry Grid -->
<section class="py-24 bg-white relative overflow-hidden" id="industries">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($industries as $index => $ind)
            <div class="p-8 sm:p-10 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 shadow-sm space-y-6 flex flex-col justify-between hover:border-[#007BFF]/50 hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1.5 group spotlight-card reveal" data-delay="{{ ($index % 2) * 120 }}">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-white text-[#007BFF] border border-slate-200 shadow-sm font-mono">
                            {{ $ind['name'] }}
                        </span>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shadow-sm shadow-emerald-500/50 animate-pulse"></span>
                    </div>

                    <h2 class="text-2xl font-bold text-[#0F172A] font-heading group-hover:text-[#007BFF] transition-colors">
                        {{ $ind['headline'] }}
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ $ind['summary'] }}
                    </p>

                    <div class="pt-4 border-t border-slate-200/80">
                        <p class="text-xs font-bold uppercase tracking-wider text-[#007BFF] mb-3 font-mono">Core Modules Included:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-700">
                            @foreach($ind['features'] as $feature)
                            <div class="flex items-center gap-2">
                                <span class="text-[#007BFF] font-bold text-xs">✓</span>
                                <span>{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="pt-5 border-t border-slate-200/80 flex items-center justify-between">
                    <a href="{{ route('contact.index', ['service' => 'Industry Solution: ' . $ind['name']]) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#0052b3] group-hover:translate-x-1 transition-all">
                        <span>Consult on {{ $ind['name'] }}</span>
                        <span>→</span>
                    </a>
                    <span class="text-[11px] font-mono text-slate-400">Custom Sprints</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-[#0B132B] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-tech-grid opacity-20 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Don't See Your Specific Industry Listed?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">Our software architecture framework is fully domain-agnostic. We construct custom logic to model any niche business workflow.</p>
        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Request Custom Architecture Scoping</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection

