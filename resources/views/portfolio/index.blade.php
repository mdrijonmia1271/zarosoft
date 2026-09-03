@extends('layouts.app')

@section('title', 'Case Studies & Engineering Portfolio — ZaroSoft')
@section('meta_description', 'Explore ZaroSoft case studies: Custom ERP implementations, AI OCR automation, FinTech mobile wallets, and high-concurrency e-commerce platforms.')

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
            PROVEN ENGINEERING OUTCOMES
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
            Transforming Operations <br/>
            Through <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Precision Code.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            Discover how we engineer custom software architectures that eliminate bottlenecks and drive measurable bottom-line ROI for businesses globally.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="#projects" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0062cc] hover:from-[#0062cc] hover:to-[#004bb5] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                Explore Case Studies ↓
            </a>
            <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-xl bg-white hover:bg-slate-50 text-[#0F172A] font-bold text-sm border border-slate-200 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                Build Your Project →
            </a>
        </div>
    </div>
</section>

<!-- Category Filters & Grid -->
<section class="py-24 bg-white relative overflow-hidden" id="projects">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center justify-center gap-2 reveal">
            <a href="{{ route('portfolio.index') }}" class="px-5 py-2 rounded-xl text-xs font-bold transition-all font-mono {{ empty($selectedCategory) ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#0F172A] hover:bg-slate-200 border border-slate-200' }}">
                All Projects
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('portfolio.index', ['category' => $cat->slug]) }}" class="px-5 py-2 rounded-xl text-xs font-bold transition-all font-mono {{ $selectedCategory === $cat->slug ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#0F172A] hover:bg-slate-200 border border-slate-200' }}">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $index => $project)
            <div class="rounded-2xl overflow-hidden bg-white border border-slate-200/80 shadow-sm group hover:border-[#007BFF]/50 hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between spotlight-card reveal" data-delay="{{ ($index % 3) * 100 }}">
                <!-- Image -->
                <div class="relative h-56 overflow-hidden bg-slate-900">
                    <x-picture :src="$project->thumbnail" :alt="$project->title" width="1200" height="675" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F172A]/85 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/95 text-[#007BFF] border border-slate-200 shadow-sm font-mono backdrop-blur-md">
                            {{ $project->industry ?? 'Enterprise' }}
                        </span>
                    </div>
                    <div class="absolute bottom-3 left-4 right-4">
                        <p class="text-[11px] text-[#38BDF8] font-mono font-medium">{{ $project->client_name }}</p>
                        <h3 class="text-base font-bold text-white group-hover:text-[#00D2FF] transition-colors truncate font-heading">
                            {{ $project->title }}
                        </h3>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-4 flex-1 flex flex-col justify-between">
                    <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                        {{ $project->tagline ?? $project->overview }}
                    </p>

                    @if($project->tech_stack && is_array($project->tech_stack))
                    <div class="flex flex-wrap gap-1.5 pt-2">
                        @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                        <span class="text-[10px] px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-mono font-medium border border-slate-200">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                    @endif

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#007BFF] hover:text-[#0052b3] group-hover:translate-x-1 transition-all">
                            <span>View Case Study</span>
                            <span>→</span>
                        </a>
                        @if($project->duration)
                        <span class="inline-flex items-center gap-1 text-[11px] text-slate-500 font-mono">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $project->duration }}</span>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center text-slate-400 space-y-2">
                <p class="text-sm font-semibold">No case studies found in this category.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pt-6">
            {{ $projects->links() }}
        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-[#0B132B] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-tech-grid opacity-20 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Ready to Engineer Your Custom Software Solution?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">Let our team build a scalable, high-performance system for your business.</p>
        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Start a Case Consultation</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection

