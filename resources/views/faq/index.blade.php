@extends('layouts.app')

@section('title', 'Frequently Asked Questions — ZaroSoft')
@section('meta_description', 'Find answers to common questions about custom software development costs, ERP implementation timelines, AI integration, and long-term technical support.')

@section('content')
<div x-data="{ search: '', selectedCategory: 'all', active: null }">
    <!-- Header Hero with 3D Background & Text On Top -->
    <section class="relative min-h-[58vh] flex items-center justify-center overflow-hidden py-24 sm:py-28 bg-[#06080e] border-b border-white/5 text-center">
        <!-- 3D Tech Background (Softly Blurred / Halka Japsa) -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <img src="{{ asset('images/hero-workstation.jpg') }}" 
                 alt="ZaroSoft 3D FAQ Knowledge Background" 
                 class="w-full h-full object-cover object-center opacity-45 blur-[2px] scale-105 transition-all">
            <div class="absolute inset-0 bg-gradient-to-b from-[#06080e]/80 via-[#06080e]/50 to-[#06080e]"></div>
            <div class="absolute inset-0 bg-[#06080e]/40"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-[#007BFF]/20 rounded-full blur-[130px] pointer-events-none animate-pulse-glow"></div>
        </div>

        <!-- Text Layer on Top -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#06080e]/80 border border-[#007BFF]/40 text-xs font-bold uppercase tracking-[0.2em] text-[#00D2FF] backdrop-blur-md shadow-lg shadow-[#007BFF]/20">
                <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                Help & Knowledge Center
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight font-heading drop-shadow-[0_4px_16px_rgba(0,0,0,0.9)]">
                Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Questions</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-200 leading-relaxed font-normal max-w-2xl mx-auto drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)]">
                Everything you need to know about our custom engineering, pricing structure, development speed, and ongoing maintenance.
            </p>

            <!-- Real-Time Search Bar -->
            <div class="pt-2 max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" x-model="search" placeholder="Type a keyword (e.g. ERP, Cost, AI, Timeline, Support)..." class="w-full pl-12 pr-4 py-4 rounded-full bg-[#06080e]/85 backdrop-blur-md border border-white/20 text-sm text-white shadow-2xl focus:outline-none focus:border-[#007BFF] placeholder-slate-400">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section class="py-24 bg-[#080b12] relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
            
            <!-- Category Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2 reveal">
                <button @click="selectedCategory = 'all'" :class="{ 'bg-[#007BFF] text-white shadow-lg shadow-[#007BFF]/30': selectedCategory === 'all', 'bg-[#111622] text-slate-400 hover:text-white border border-white/5 hover:border-[#007BFF]/30': selectedCategory !== 'all' }" class="px-5 py-2.5 rounded-full text-xs font-bold transition-all">
                    All Questions
                </button>
                @foreach($categories as $category)
                <button @click="selectedCategory = '{{ $category }}'" :class="{ 'bg-[#007BFF] text-white shadow-lg shadow-[#007BFF]/30': selectedCategory === '{{ $category }}', 'bg-[#111622] text-slate-400 hover:text-white border border-white/5 hover:border-[#007BFF]/30': selectedCategory !== '{{ $category }}' }" class="px-5 py-2.5 rounded-full text-xs font-bold transition-all">
                    {{ $category }}
                </button>
                @endforeach
            </div>

            <!-- FAQ List -->
            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                <div x-show="(selectedCategory === 'all' || selectedCategory === '{{ $faq->category }}') && (search === '' || '{{ strtolower(addslashes($faq->question . ' ' . $faq->answer)) }}'.includes(search.toLowerCase()))"
                     class="rounded-3xl border border-white/5 bg-[#0c1018] overflow-hidden shadow-xl transition-all hover:border-[#007BFF]/40 spotlight-card reveal" data-delay="{{ ($index % 5) * 80 }}">
                    
                    <button @click="active = (active === {{ $index }} ? null : {{ $index }})" class="w-full p-6 text-left flex items-center justify-between gap-4">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-[#00D2FF]">{{ $faq->category }}</span>
                            <h3 class="text-base font-bold text-white font-heading">
                                {{ $faq->question }}
                            </h3>
                        </div>
                        <span class="p-2 rounded-full bg-[#111622] text-slate-400 shrink-0 border border-white/5">
                            <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180 text-[#007BFF]': active === {{ $index }} }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </span>
                    </button>
                    
                    <div x-show="active === {{ $index }}" x-collapse class="px-6 pb-6 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-4">
                        {{ $faq->answer }}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Still have questions card -->
            <div class="p-8 sm:p-10 rounded-3xl bg-[#0c1018] border border-[#007BFF]/30 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-2xl spotlight-card reveal">
                <div class="space-y-2 text-center sm:text-left">
                    <h3 class="text-xl font-bold font-heading">Have a question not answered here?</h3>
                    <p class="text-xs text-slate-400">Our engineering leads are ready to answer your specific technical questions.</p>
                </div>
                <a href="{{ route('contact.index') }}" class="px-6 py-3.5 rounded-full bg-gradient-to-r from-[#007BFF] to-[#00D2FF] text-white font-bold text-xs hover:from-[#0069d9] hover:to-[#00B4FF] shrink-0 shadow-lg shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
                    Contact Us Directly →
                </a>
            </div>

        </div>
    </section>
</div>
@endsection
