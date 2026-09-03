@extends('layouts.app')

@section('title', 'Frequently Asked Questions — ZaroSoft')
@section('meta_description', 'Find answers to common questions about custom software development costs, ERP implementation timelines, AI integration, and long-term technical support.')

@php
    // FAQPage schema makes these eligible for Google's rich results.
    $structuredData = $faqs->isEmpty() ? [] : [[
        '@type' => 'FAQPage',
        '@id' => url()->current() . '#faq',
        'mainEntity' => $faqs->map(fn ($faq) => [
            '@type' => 'Question',
            'name' => $faq->question,
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq->answer],
        ])->values()->all(),
    ]];
@endphp

@section('content')
<div x-data="{ search: '', selectedCategory: 'all', active: null }">
    <!-- Header Hero -->
    <section class="relative overflow-hidden py-16 sm:py-20 bg-[#0B132B] border-b border-slate-800 text-center">
        <!-- Ambient Tech Background -->
        <div class="absolute inset-0 bg-tech-grid opacity-30 pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-[#007BFF]/20 rounded-full blur-[130px] pointer-events-none animate-pulse-glow"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/5 border border-[#007BFF]/40 text-xs font-bold uppercase tracking-[0.18em] text-[#00D2FF] backdrop-blur-md shadow-lg shadow-[#007BFF]/20 font-mono">
                <span class="w-2 h-2 rounded-full bg-[#00D2FF] animate-pulse"></span>
                HELP & KNOWLEDGE BASE
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight font-heading">
                Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Questions</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed font-normal max-w-2xl mx-auto">
                Everything you need to know about our custom engineering, pricing structure, development speed, and ongoing maintenance.
            </p>

            <!-- Real-Time Search Bar -->
            <div class="pt-2 max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" x-model="search" placeholder="Search questions (e.g. ERP, Cost, AI, Timeline, Support)..." class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-[#080E21] border border-slate-700 text-sm text-white shadow-2xl focus:outline-none focus:border-[#007BFF] placeholder-slate-400">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section class="py-24 bg-[#080E21] relative overflow-hidden text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
            
            <!-- Category Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2 reveal">
                <button @click="selectedCategory = 'all'" :class="{ 'bg-[#007BFF] text-white shadow-lg shadow-[#007BFF]/30': selectedCategory === 'all', 'bg-[#0D1836] text-slate-400 hover:text-white border border-slate-800 hover:border-[#007BFF]/30': selectedCategory !== 'all' }" class="px-4 py-2 rounded-lg text-xs font-bold font-mono transition-all">
                    ALL QUESTIONS
                </button>
                @foreach($categories as $category)
                <button @click="selectedCategory = '{{ $category }}'" :class="{ 'bg-[#007BFF] text-white shadow-lg shadow-[#007BFF]/30': selectedCategory === '{{ $category }}', 'bg-[#0D1836] text-slate-400 hover:text-white border border-slate-800 hover:border-[#007BFF]/30': selectedCategory !== '{{ $category }}' }" class="px-4 py-2 rounded-lg text-xs font-bold font-mono transition-all uppercase">
                    {{ $category }}
                </button>
                @endforeach
            </div>

            <!-- FAQ List -->
            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                <div x-show="(selectedCategory === 'all' || selectedCategory === '{{ $faq->category }}') && (search === '' || '{{ strtolower(addslashes($faq->question . ' ' . $faq->answer)) }}'.includes(search.toLowerCase()))"
                     class="rounded-2xl border border-slate-800 bg-[#0D1836] overflow-hidden shadow-xl transition-all hover:border-[#007BFF]/50 spotlight-card reveal" data-delay="{{ ($index % 5) * 60 }}">
                    
                    <button @click="active = (active === {{ $index }} ? null : {{ $index }})" class="w-full p-6 text-left flex items-center justify-between gap-4">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-[#00D2FF] font-mono">{{ $faq->category }}</span>
                            <h3 class="text-base font-bold text-white font-heading">
                                {{ $faq->question }}
                            </h3>
                        </div>
                        <span class="p-2 rounded-lg bg-[#080E21] text-slate-400 shrink-0 border border-slate-800">
                            <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180 text-[#00D2FF]': active === {{ $index }} }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </span>
                    </button>
                    
                    <div x-show="active === {{ $index }}" x-collapse class="px-6 pb-6 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-slate-800 pt-4">
                        {{ $faq->answer }}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Still have questions card -->
            <div class="p-8 sm:p-10 rounded-2xl bg-[#0D1836] border border-[#007BFF]/30 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-2xl spotlight-card reveal">
                <div class="space-y-2 text-center sm:text-left">
                    <h3 class="text-xl font-bold font-heading">Have a question not covered here?</h3>
                    <p class="text-xs text-slate-400">Our engineering leads are ready to answer your specific technical questions.</p>
                </div>
                <a href="{{ route('contact.index') }}" class="px-6 py-3.5 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] text-white font-bold text-xs hover:from-[#0062cc] hover:to-[#00b8e6] shrink-0 shadow-lg shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
                    Contact Us Directly →
                </a>
            </div>

        </div>
    </section>
</div>
@endsection

