@extends('layouts.app')

@section('title', $project->title . ' — ZaroSoft Case Study')
@section('meta_description', $project->tagline ?? $project->overview)

@section('content')
<!-- Header Hero -->
<section class="py-20 relative overflow-hidden bg-[#F8FAFC] border-b border-slate-200/80">
    <div class="absolute inset-0 bg-grid-pattern opacity-60"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#007BFF]/10 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6 font-medium reveal">
            <a href="{{ route('home') }}" class="hover:text-[#007BFF]">Home</a>
            <span>/</span>
            <a href="{{ route('portfolio.index') }}" class="hover:text-[#007BFF]">Portfolio</a>
            <span>/</span>
            <span class="text-[#111827] font-semibold">{{ $project->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8 space-y-6 reveal-left">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="px-3.5 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-wider text-[#007BFF] backdrop-blur-md">
                        {{ $project->category->name ?? 'Enterprise Solution' }}
                    </span>
                    @if($project->industry)
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white text-slate-700 border border-slate-200 shadow-sm">
                        {{ $project->industry }}
                    </span>
                    @endif
                </div>

                <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-[#111827] leading-tight font-heading">
                    {{ $project->title }}
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-3xl font-normal">
                    {{ $project->tagline ?? $project->overview }}
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('contact.index', ['service' => 'Case Study Inquiry: ' . $project->title]) }}" class="px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-1 transition-all duration-300">
                        Build a Similar System →
                    </a>
                    @if($project->live_url)
                    <a href="{{ $project->live_url }}" target="_blank" class="px-6 py-4 rounded-full bg-white border border-slate-200 text-[#111827] font-bold text-sm hover:bg-slate-50 flex items-center gap-2 shadow-sm">
                        <span>Visit Live Demo</span>
                        <svg class="w-4 h-4 text-[#007BFF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Project Meta Card -->
            <div class="lg:col-span-4 reveal-right">
                <div class="p-8 rounded-3xl bg-white border border-slate-200/80 shadow-xl space-y-4 spotlight-card">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-[#007BFF] border-b border-slate-100 pb-3 font-heading">
                        Project Meta
                    </h3>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Client:</span>
                            <span class="font-bold text-[#111827]">{{ $project->client_name ?? 'Confidential' }}</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Timeline:</span>
                            <span class="font-bold text-[#007BFF]">{{ $project->duration ?? '3 Months' }}</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-slate-500">Architecture:</span>
                            <span class="font-bold text-[#111827]">Custom Laravel & MySQL</span>
                        </div>
                    </div>

                    @if($project->tech_stack && is_array($project->tech_stack))
                    <div class="pt-3">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-2">Technologies Used:</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($project->tech_stack as $tech)
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

<!-- Main Case Study Content -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20 relative z-10">
        
        <!-- Hero Image -->
        @if($project->hero_image || $project->thumbnail)
        <div class="rounded-3xl overflow-hidden border border-slate-200/80 shadow-2xl bg-slate-900 spotlight-card reveal">
            <img src="{{ $project->hero_image ?? $project->thumbnail }}" alt="{{ $project->title }}" class="w-full max-h-[550px] object-cover group-hover:scale-105 transition-transform duration-700">
        </div>
        @endif

        <!-- Problem & Solution Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Problem -->
            <div class="p-8 sm:p-10 rounded-3xl bg-blue-50 border border-[#007BFF]/20 space-y-4 spotlight-card reveal-left">
                <div class="w-12 h-12 rounded-2xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-bold text-xl border border-[#007BFF]/20 shadow-sm">
                    ⚠️
                </div>
                <h2 class="text-2xl font-extrabold text-[#111827] font-heading">The Client Problem</h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    {{ $project->problem ?? $project->overview }}
                </p>
            </div>

            <!-- Solution -->
            <div class="p-8 sm:p-10 rounded-3xl bg-emerald-50 border border-emerald-500/20 space-y-4 spotlight-card reveal-right">
                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-bold text-xl border border-emerald-500/20 shadow-sm">
                    💡
                </div>
                <h2 class="text-2xl font-extrabold text-[#111827] font-heading">The ZaroSoft Solution</h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    {{ $project->solution ?? $project->overview }}
                </p>
            </div>
        </div>

        <!-- Measurable Results (ROI) -->
        @if($project->results && is_array($project->results))
        <div class="p-10 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 text-[#111827] space-y-8 shadow-md spotlight-card reveal">
            <div class="space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-[#007BFF]">Impact & Business ROI</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-heading">Measurable Outcomes Delivered</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($project->results as $res)
                <div class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-sm space-y-2">
                    <span class="text-2xl font-black text-[#007BFF] font-heading">🚀</span>
                    <p class="text-xs sm:text-sm font-semibold text-slate-700 leading-relaxed">{{ $res }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Key Features List -->
        @if($project->key_features && is_array($project->key_features))
        <div class="space-y-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#111827] font-heading reveal">Key Architectural Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($project->key_features as $index => $feat)
                <div class="p-5 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 shadow-sm flex items-start gap-4 spotlight-card reveal" data-delay="{{ ($index % 2) * 100 }}">
                    <span class="w-6 h-6 rounded-full bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 border border-[#007BFF]/20">✓</span>
                    <span class="text-sm font-semibold text-slate-800">{{ $feat }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Screenshots Gallery -->
        @if($project->gallery && is_array($project->gallery) && count($project->gallery) > 1)
        <div class="space-y-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#111827] font-heading reveal">Interface & Screenshots</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($project->gallery as $index => $img)
                <div class="rounded-2xl overflow-hidden border border-slate-200/80 shadow-lg spotlight-card reveal" data-delay="{{ ($index % 2) * 100 }}">
                    <img src="{{ $img }}" alt="{{ $project->title }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-[#111827] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Facing Similar Bottlenecks in Your Operations?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">Let our senior architects design a custom solution tailored to your operational specifications.</p>
        <a href="{{ route('contact.index', ['service' => 'Case Study Consultation: ' . $project->title]) }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Schedule Project Discovery Call</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection
