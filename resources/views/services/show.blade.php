@extends('layouts.app')

@section('title', $service->title . ' — ZaroSoft Specialized Services')
@section('meta_description', $service->short_description)

@section('content')
<!-- Header Hero -->
<section class="py-20 relative overflow-hidden bg-[#F8FAFC] border-b border-slate-200/80">
    <div class="absolute inset-0 bg-grid-pattern opacity-60"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#007BFF]/10 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6 font-medium reveal">
            <a href="{{ route('home') }}" class="hover:text-[#007BFF]">Home</a>
            <span>/</span>
            <a href="{{ route('services.index') }}" class="hover:text-[#007BFF]">Services</a>
            <span>/</span>
            <span class="text-[#111827] font-semibold">{{ $service->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8 space-y-6 reveal-left">
                <div class="flex items-center gap-3">
                    <span class="px-3.5 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-wider text-[#007BFF] backdrop-blur-md">
                        {{ $service->category->name ?? 'Software Engineering' }}
                    </span>
                    @if($service->badge)
                    <span class="px-3 py-0.5 rounded-full text-xs font-bold bg-[#00D2FF]/15 text-[#007BFF] border border-[#00D2FF]/30">
                        {{ $service->badge }}
                    </span>
                    @endif
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#111827] leading-tight font-heading">
                    {{ $service->title }}
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-3xl font-normal">
                    {{ $service->short_description }}
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('contact.index', ['service' => $service->title]) }}" class="px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-1 transition-all duration-300">
                        Request a Quote for this Service →
                    </a>
                    <a href="#capabilities" class="px-6 py-4 rounded-full bg-white border border-slate-200 text-slate-700 font-bold text-sm hover:text-[#111827] hover:bg-slate-50 transition-colors shadow-sm">
                        View Capabilities ↓
                    </a>
                </div>
            </div>

            <!-- Right Visual Card -->
            <div class="lg:col-span-4 reveal-right">
                <div class="p-8 rounded-3xl bg-white border border-slate-200/80 shadow-xl space-y-6 spotlight-card">
                    <h3 class="text-base font-bold text-[#111827] border-b border-slate-100 pb-3 font-heading">
                        Service Snapshot
                    </h3>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Delivery Architecture:</span>
                            <span class="font-bold text-[#111827]">Agile Bi-Weekly Sprints</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Code Ownership:</span>
                            <span class="font-bold text-emerald-600">100% Client IP</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Warranty Support:</span>
                            <span class="font-bold text-[#111827]">Included Post-Launch</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-slate-500">Deployment:</span>
                            <span class="font-bold text-[#007BFF]">AWS / Linux / Cloud VPS</span>
                        </div>
                    </div>

                    @if($service->tech_stack && is_array($service->tech_stack))
                    <div class="pt-2">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-2">Technologies Used:</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($service->tech_stack as $tech)
                            <span class="text-xs px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-medium border border-slate-200">
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
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#111827] font-heading">
                Detailed Overview & Strategy
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
                <span class="text-xs font-bold uppercase tracking-wider text-[#007BFF]">Core Capabilities</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#111827] font-heading">What We Build Into Every Solution</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($service->features as $index => $feature)
                <div class="p-6 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm flex items-start gap-4 spotlight-card reveal" data-delay="{{ ($index % 2) * 120 }}">
                    <div class="w-10 h-10 rounded-xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center shrink-0 font-bold border border-[#007BFF]/20 shadow-sm">
                        ✓
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-[#111827]">{{ $feature }}</h3>
                        <p class="text-xs text-slate-500 mt-1">Engineered with rigorous testing, high scalability, and seamless integration.</p>
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
            <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 shadow-md space-y-6 spotlight-card reveal-left">
                <h3 class="text-xl font-extrabold text-[#111827] font-heading">Development & Delivery Process</h3>
                <div class="space-y-4">
                    @foreach($service->process_steps as $step)
                    <div class="flex items-start gap-4">
                        <span class="w-7 h-7 rounded-full bg-[#007BFF] text-white font-bold text-xs flex items-center justify-center shrink-0 shadow-md shadow-[#007BFF]/25">
                            {{ $loop->iteration }}
                        </span>
                        <div>
                            <p class="text-sm font-bold text-[#111827]">{{ $step }}</p>
                            <p class="text-xs text-slate-500 mt-0.5">Iterative review and client milestone validation.</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Deliverables & Benefits -->
            @if($service->deliverables && is_array($service->deliverables))
            <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 shadow-md space-y-6 spotlight-card reveal-right">
                <h3 class="text-xl font-extrabold text-[#111827] font-heading">Turnkey Deliverables</h3>
                <div class="space-y-3">
                    @foreach($service->deliverables as $deliverable)
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white text-xs font-semibold text-[#111827] border border-slate-200/80 shadow-sm">
                        <span class="text-[#007BFF] font-bold">📦</span>
                        <span>{{ $deliverable }}</span>
                    </div>
                    @endforeach
                </div>

                @if($service->benefits && is_array($service->benefits))
                <div class="pt-4 border-t border-slate-200/80">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-[#007BFF] mb-3">Key Business Benefits:</h4>
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
<section class="py-20 bg-[#111827] text-white border-t border-slate-800 relative overflow-hidden text-center">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Ready to Kickstart Your {{ $service->title }}?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">
            Contact our engineering leads directly. We will evaluate your requirements and provide an estimated timeline and proposal.
        </p>
        <a href="{{ route('contact.index', ['service' => $service->title]) }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-extrabold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Start {{ $service->title }} Project</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection
