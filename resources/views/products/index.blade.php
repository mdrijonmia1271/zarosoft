@extends('layouts.app')

@section('title', 'ZaroSoft Product Suite — ZaroERP, ZaroCRM, ZaroPOS & ZaroAI')
@section('meta_description', 'Explore the proprietary software product suite developed by ZaroSoft: ZaroERP, ZaroCRM, ZaroPOS, ZaroHR, and ZaroAI.')

@section('content')
<div x-data="{ demoModalOpen: false, selectedProduct: '' }">
    <!-- Header Hero with 3D Background & Text On Top -->
    <section class="relative min-h-[58vh] flex items-center justify-center overflow-hidden py-24 sm:py-28 bg-[#06080e] border-b border-white/5 text-center">
        <!-- 3D Tech Background (Softly Blurred / Halka Japsa) -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <img src="{{ asset('images/project-saas.jpg') }}" 
                 alt="ZaroSoft 3D SaaS Background" 
                 class="w-full h-full object-cover object-center opacity-45 blur-[2px] scale-105 transition-all">
            <div class="absolute inset-0 bg-gradient-to-b from-[#06080e]/80 via-[#06080e]/50 to-[#06080e]"></div>
            <div class="absolute inset-0 bg-[#06080e]/40"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-[#007BFF]/20 rounded-full blur-[130px] pointer-events-none animate-pulse-glow"></div>
        </div>

        <!-- Text Layer on Top -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#06080e]/80 border border-[#007BFF]/40 text-xs font-bold uppercase tracking-[0.2em] text-[#00D2FF] backdrop-blur-md shadow-lg shadow-[#007BFF]/20">
                <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                Proprietary Product Suite
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight font-heading drop-shadow-[0_4px_16px_rgba(0,0,0,0.9)]">
                Turnkey Software <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Ready For Scale.</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-200 leading-relaxed font-normal max-w-2xl mx-auto drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)]">
                Deploy battle-tested enterprise products built with zero per-user license fees and 100% private cloud hosting.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <a href="#product-suite" class="px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0099FF] to-[#00D2FF] hover:from-[#0069d9] hover:to-[#00B4FF] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
                    View Products ↓
                </a>
                <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-full bg-[#06080e]/80 hover:bg-slate-900 text-white border border-white/20 hover:border-[#007BFF] font-bold text-sm backdrop-blur-md transition-all shadow-xl">
                    Request Demo Access →
                </a>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-24 bg-[#080b12] relative overflow-hidden" id="product-suite">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $index => $product)
                <div class="p-8 rounded-3xl bg-[#0c1018] border border-white/5 shadow-2xl space-y-6 flex flex-col justify-between hover:border-[#007BFF]/40 transition-all duration-300 hover:-translate-y-2 group spotlight-card reveal" data-delay="{{ ($index % 3) * 120 }}">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-3xl group-hover:scale-110 transition-transform duration-300">
                                @if($product['icon'] == 'layers') 🏢
                                @elseif($product['icon'] == 'users') 👥
                                @elseif($product['icon'] == 'shopping-cart') 🛒
                                @elseif($product['icon'] == 'briefcase') 💼
                                @elseif($product['icon'] == 'package') 📦
                                @elseif($product['icon'] == 'cpu') 🤖
                                @else ⚡ @endif
                            </span>
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-[#111622] text-[#00D2FF] border border-white/5">
                                {{ $product['status'] }}
                            </span>
                        </div>

                        <div>
                            <h2 class="text-2xl font-extrabold text-white font-heading group-hover:text-[#00D2FF] transition-colors">{{ $product['name'] }}</h2>
                            <p class="text-xs font-semibold text-[#007BFF] mt-1">{{ $product['tagline'] }}</p>
                        </div>

                        <p class="text-sm text-slate-400 leading-relaxed">
                            {{ $product['description'] }}
                        </p>

                        <div class="pt-4 border-t border-white/5 space-y-2">
                            @foreach($product['highlights'] as $highlight)
                            <div class="flex items-center gap-2 text-xs text-slate-300">
                                <span class="text-[#007BFF] font-bold">✓</span>
                                <span>{{ $highlight }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/5">
                        @if($product['status'] === 'Enterprise Ready')
                        <button @click="demoModalOpen = true; selectedProduct = '{{ $product['name'] }}'" class="w-full py-3.5 px-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0099FF] to-[#00D2FF] hover:from-[#0069d9] hover:to-[#00B4FF] text-white font-bold text-xs shadow-lg shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 transition-all text-center">
                            Request Live Demo & Pricing →
                        </button>
                        @else
                        <button @click="demoModalOpen = true; selectedProduct = '{{ $product['name'] }} (Early Access)'" class="w-full py-3.5 px-4 rounded-full bg-[#111622] text-slate-300 hover:text-white border border-white/10 hover:border-[#007BFF]/50 font-bold text-xs transition-all text-center">
                            Join Early Access Waitlist →
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Demo Request Modal -->
    <div x-show="demoModalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto bg-[#06080e]/85 backdrop-blur-md flex items-center justify-center p-4">
        
        <div @click.away="demoModalOpen = false" class="bg-[#0c1018] border border-white/10 rounded-3xl p-8 max-w-lg w-full shadow-2xl relative">
            <button @click="demoModalOpen = false" class="absolute top-6 right-6 text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="space-y-4">
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#007BFF]/10 text-[#00D2FF] border border-[#007BFF]/20">Live Demonstration</span>
                <h3 class="text-2xl font-black text-white font-heading">
                    Request Demo for <span class="text-[#007BFF]" x-text="selectedProduct"></span>
                </h3>
                <p class="text-xs text-slate-400">Fill in your corporate details to get instant access to our sandbox demonstration environment.</p>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 pt-2">
                    @csrf
                    <input type="hidden" name="service_interest" :value="'Product Demo: ' + selectedProduct">

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Your Full Name *</label>
                        <input type="text" name="name" required class="w-full px-4 py-2.5 rounded-xl bg-[#06080e] border border-white/10 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-300 mb-1">Work Email *</label>
                            <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl bg-[#06080e] border border-white/10 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-300 mb-1">Phone Number</label>
                            <input type="text" name="phone" class="w-full px-4 py-2.5 rounded-xl bg-[#06080e] border border-white/10 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Company / Organization</label>
                        <input type="text" name="company" class="w-full px-4 py-2.5 rounded-xl bg-[#06080e] border border-white/10 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Specific Requirements or Questions</label>
                        <textarea name="message" rows="3" required class="w-full px-4 py-2.5 rounded-xl bg-[#06080e] border border-white/10 text-sm text-white focus:outline-none focus:border-[#007BFF]" placeholder="e.g. Need factory BOM module with 50 users..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 px-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0099FF] to-[#00D2FF] hover:from-[#0069d9] hover:to-[#00B4FF] text-white font-extrabold text-sm shadow-xl shadow-[#007BFF]/30 hover:opacity-95 transition-opacity">
                        Submit & Request Demo Access →
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
