@extends('layouts.app')

@php
    // Built from the live product list so the meta never drifts from the page.
    $productNames = $products->pluck('name');
    $siteName = setting('site_name', 'ZaroSoft');
@endphp

@section('title', $siteName . ' Proprietary Product Suite' . ($productNames->isNotEmpty() ? ' — ' . $productNames->take(4)->implode(', ') : ''))
@section('meta_description', 'Explore the proprietary software product suite developed by ' . $siteName . ($productNames->isNotEmpty() ? ': ' . $productNames->implode(', ') . '.' : '.'))

@section('content')
<div x-data="{ demoModalOpen: false, selectedProduct: '' }">
    <!-- Header Hero -->
    <section class="relative overflow-hidden py-16 sm:py-20 bg-[#0B132B] border-b border-slate-800 text-center">
        <!-- Ambient Tech Background -->
        <div class="absolute inset-0 bg-tech-grid opacity-30 pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-[#007BFF]/20 rounded-full blur-[130px] pointer-events-none animate-pulse-glow"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/5 border border-[#007BFF]/40 text-xs font-bold uppercase tracking-[0.18em] text-[#00D2FF] backdrop-blur-md shadow-lg shadow-[#007BFF]/20 font-mono">
                <span class="w-2 h-2 rounded-full bg-[#00D2FF] animate-pulse"></span>
                PROPRIETARY PRODUCT SUITE
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight font-heading">
                Turnkey Software <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Ready For Enterprise Scale.</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed font-normal max-w-2xl mx-auto">
                Deploy battle-tested enterprise products engineered with zero recurring per-user seat fees, modular expandability, and 100% private cloud database ownership.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <a href="#product-suite" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
                    View Products ↓
                </a>
                <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 hover:border-[#007BFF] font-bold text-sm backdrop-blur-md transition-all shadow-xl">
                    Request Demo Access →
                </a>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-24 bg-[#080E21] relative overflow-hidden text-white" id="product-suite">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $index => $product)
                <div class="p-8 rounded-2xl bg-[#0D1836] border border-slate-800 shadow-xl space-y-6 flex flex-col justify-between hover:border-[#007BFF]/50 transition-all duration-300 hover:-translate-y-1.5 group spotlight-card reveal" data-delay="{{ ($index % 3) * 100 }}">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-[#007BFF]/15 text-[#00D2FF] flex items-center justify-center border border-[#007BFF]/30 group-hover:scale-105 transition-transform">
                                <x-icon :name="$product->icon" class="w-6 h-6" />
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider border font-mono {{ $product->status_classes }}">
                                {{ $product->status }}
                            </span>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold text-white font-heading group-hover:text-[#00D2FF] transition-colors">{{ $product['name'] }}</h2>
                            <p class="text-xs font-semibold text-[#007BFF] mt-1 font-mono">{{ $product['tagline'] }}</p>
                        </div>

                        <p class="text-xs text-slate-300 leading-relaxed">
                            {{ $product['description'] }}
                        </p>

                        <div class="pt-4 border-t border-slate-800 space-y-1.5">
                            @foreach($product['highlights'] as $highlight)
                            <div class="flex items-center gap-2 text-xs text-slate-300">
                                <span class="text-[#00D2FF] font-bold">✓</span>
                                <span>{{ $highlight }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-5 mt-5 border-t border-slate-800">
                        @if($product['status'] === 'Enterprise Ready')
                        <button @click="demoModalOpen = true; selectedProduct = '{{ $product['name'] }}'" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-xs shadow-lg shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 transition-all text-center">
                            Request Live Demo & Pricing →
                        </button>
                        @else
                        <button @click="demoModalOpen = true; selectedProduct = '{{ $product['name'] }} (Early Access)'" class="w-full py-3 px-4 rounded-xl bg-white/5 text-slate-300 hover:text-white border border-slate-700 hover:border-[#007BFF]/50 font-bold text-xs transition-all text-center">
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
        
        <div @click.away="demoModalOpen = false" class="bg-[#0D1836] border border-slate-700 rounded-2xl p-8 max-w-lg w-full shadow-2xl relative text-white">
            <button @click="demoModalOpen = false" class="absolute top-6 right-6 text-slate-400 hover:text-white" aria-label="Close modal">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="space-y-4">
                <span class="px-3 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#007BFF]/20 text-[#00D2FF] border border-[#007BFF]/30 font-mono">LIVE DEMONSTRATION</span>
                <h3 class="text-2xl font-black text-white font-heading">
                    Request Demo for <span class="text-[#00D2FF]" x-text="selectedProduct"></span>
                </h3>
                <p class="text-xs text-slate-300">Fill in your corporate details to receive sandbox access credentials and an estimated rollout timeline.</p>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 pt-2">
                    @csrf
                    <input type="hidden" name="service_interest" :value="'Product Demo: ' + selectedProduct">

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Your Full Name *</label>
                        <input type="text" name="name" required class="w-full px-4 py-2.5 rounded-xl bg-[#080E21] border border-slate-700 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-300 mb-1">Work Email *</label>
                            <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl bg-[#080E21] border border-slate-700 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-300 mb-1">Phone Number</label>
                            <input type="text" name="phone" class="w-full px-4 py-2.5 rounded-xl bg-[#080E21] border border-slate-700 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Company / Organization</label>
                        <input type="text" name="company" class="w-full px-4 py-2.5 rounded-xl bg-[#080E21] border border-slate-700 text-sm text-white focus:outline-none focus:border-[#007BFF]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Specific Requirements or Estimated Users</label>
                        <textarea name="message" rows="3" required class="w-full px-4 py-2.5 rounded-xl bg-[#080E21] border border-slate-700 text-sm text-white focus:outline-none focus:border-[#007BFF]" placeholder="e.g. Need manufacturing BOM module with 50 factory terminals..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:opacity-95 transition-opacity">
                        Submit & Request Sandbox Demo →
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

