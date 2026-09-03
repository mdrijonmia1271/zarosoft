@extends('layouts.app')

@section('title', $service->title . ' — ZaroSoft Specialized Engineering')
@section('meta_description', $service->short_description)

@php
    $structuredData = [
        array_filter([
            '@type' => 'Service',
            '@id' => url()->current() . '#service',
            'name' => $service->title,
            'description' => $service->short_description,
            'serviceType' => $service->category?->name,
            'provider' => ['@id' => url('/') . '#organization'],
            'areaServed' => 'Worldwide',
        ], fn ($value) => !empty($value)),
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $service->title, 'item' => url()->current()],
            ],
        ],
    ];
@endphp

@section('content')
<!-- Header Hero -->
<section class="py-20 relative overflow-hidden bg-[#F8FAFC] border-b border-slate-200/80">
    <div class="absolute inset-0 bg-tech-grid opacity-70 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#007BFF]/10 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6 font-medium reveal">
            <a href="{{ route('home') }}" class="hover:text-[#007BFF] transition-colors">Home</a>
            <span class="text-slate-300">/</span>
            <a href="{{ route('services.index') }}" class="hover:text-[#007BFF] transition-colors">Services</a>
            <span class="text-slate-300">/</span>
            <span class="text-[#0F172A] font-semibold">{{ $service->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8 space-y-6 reveal-left">
                <div class="flex items-center gap-3">
                    <span class="px-3.5 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-wider text-[#007BFF] font-mono">
                        {{ $service->category->name ?? 'Software Engineering' }}
                    </span>
                    @if($service->badge)
                    <span class="px-3 py-0.5 rounded-full text-xs font-bold bg-[#00D2FF]/15 text-[#007BFF] border border-[#00D2FF]/30 font-mono">
                        {{ $service->badge }}
                    </span>
                    @endif
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
                    {{ $service->title }}
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-3xl font-normal">
                    {{ $service->short_description }}
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('contact.index', ['service' => $service->title]) }}" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0062cc] hover:from-[#0062cc] hover:to-[#004bb5] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                        Request a Quote for this Service →
                    </a>
                    <a href="#capabilities" class="px-6 py-4 rounded-xl bg-white border border-slate-200 text-slate-700 font-bold text-sm hover:text-[#0F172A] hover:bg-slate-50 transition-colors shadow-sm">
                        View Technical Specs ↓
                    </a>
                </div>
            </div>

            <!-- Right Visual Snapshot Card -->
            <div class="lg:col-span-4 reveal-right">
                <div class="p-8 rounded-2xl bg-white border border-slate-200/80 shadow-xl space-y-6 spotlight-card">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-[#0F172A] border-b border-slate-100 pb-3 font-heading">
                        Service Architecture Snapshot
                    </h3>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Delivery Sprint:</span>
                            <span class="font-bold text-[#0F172A]">Agile Bi-Weekly</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">IP Ownership:</span>
                            <span class="font-bold text-emerald-600">100% Client Retained</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Post-Launch SLA:</span>
                            <span class="font-bold text-[#0F172A]">Standard Warranty & Support</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-slate-500">Environment:</span>
                            <span class="font-bold text-[#007BFF]">Docker / AWS / Cloud VPS</span>
                        </div>
                    </div>

                    @if($service->tech_stack && is_array($service->tech_stack))
                    <div class="pt-2 border-t border-slate-100">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-2 font-mono">Technologies:</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($service->tech_stack as $tech)
                            <span class="text-xs px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 font-mono font-medium border border-slate-200">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Content & Capabilities -->
<section class="py-24 bg-white relative overflow-hidden" id="capabilities">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20 relative z-10">
        
        <!-- Deep Overview -->
        @if($service->description)
        <div class="max-w-4xl space-y-6 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 text-xs font-bold uppercase tracking-wider text-[#007BFF] font-mono">
                ENGINEERING STRATEGY
            </div>
            <h2 class="text-2xl sm:text-3xl font-black text-[#0F172A] font-heading">
                Detailed Scope & Methodology
            </h2>
            <div class="text-sm sm:text-base text-slate-600 leading-relaxed space-y-4">
                <p>{{ $service->description }}</p>
            </div>
        </div>
        @endif

        <!-- Features Grid -->
        @if($service->features && is_array($service->features))
        <div class="space-y-8">
            <div class="space-y-2 reveal">
                <span class="text-xs font-bold uppercase tracking-wider text-[#007BFF] font-mono">CORE SPECIFICATIONS</span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#0F172A] font-heading">Built Into Every Implementation</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($service->features as $index => $feature)
                <div class="p-6 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm flex items-start gap-4 spotlight-card reveal" data-delay="{{ ($index % 2) * 120 }}">
                    <div class="w-9 h-9 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center shrink-0 font-bold border border-[#007BFF]/20 shadow-sm mt-0.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#0F172A]">{{ $feature }}</h3>
                        <p class="text-xs text-slate-500 mt-1">Engineered with comprehensive QA testing, security protocols, and scalability.</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Process & Deliverables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Process Steps -->
            @if($service->process_steps && is_array($service->process_steps))
            <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 shadow-md space-y-6 spotlight-card reveal-left">
                <h3 class="text-xl font-bold text-[#0F172A] font-heading">Sprint & Delivery Process</h3>
                <div class="space-y-4">
                    @foreach($service->process_steps as $step)
                    <div class="flex items-start gap-3.5">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF] text-white font-bold text-xs flex items-center justify-center shrink-0 font-mono shadow-md shadow-[#007BFF]/25 mt-0.5">
                            {{ $loop->iteration }}
                        </span>
                        <div>
                            <p class="text-sm font-bold text-[#0F172A]">{{ $step }}</p>
                            <p class="text-xs text-slate-500 mt-0.5">Iterative review with milestone validation and QA checkpoints.</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Deliverables & Benefits -->
            @if($service->deliverables && is_array($service->deliverables))
            <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 shadow-md space-y-6 spotlight-card reveal-right">
                <h3 class="text-xl font-bold text-[#0F172A] font-heading">Turnkey Deliverables</h3>
                <div class="space-y-2.5">
                    @foreach($service->deliverables as $deliverable)
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white text-xs font-semibold text-[#0F172A] border border-slate-200/80 shadow-sm">
                        <svg class="w-4 h-4 text-[#007BFF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        <span>{{ $deliverable }}</span>
                    </div>
                    @endforeach
                </div>

                @if($service->benefits && is_array($service->benefits))
                <div class="pt-4 border-t border-slate-200/80">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-[#007BFF] mb-3 font-mono">Key Business Value:</h4>
                    <ul class="space-y-2 text-xs text-slate-600">
                        @foreach($service->benefits as $benefit)
                        <li class="flex items-center gap-2">
                            <span class="text-[#007BFF] font-bold">→</span>
                            <span>{{ $benefit }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @endif
        </div>

    </div>
</section>

<!-- Fast Inquiry CTA -->
<section class="py-20 bg-[#0B132B] text-white border-t border-slate-800 relative overflow-hidden text-center">
    <div class="absolute inset-0 bg-tech-grid opacity-20 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Ready to Kickstart Your {{ $service->title }}?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">
            Contact our engineering leads directly. We will evaluate your technical specifications and deliver an actionable implementation estimate.
        </p>
        <a href="{{ route('contact.index', ['service' => $service->title]) }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Start {{ $service->title }} Discovery</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection

