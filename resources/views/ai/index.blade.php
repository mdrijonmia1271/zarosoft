@extends('layouts.app')

@section('title', 'AI Solutions & Machine Intelligence — ZaroSoft')
@section('meta_description', 'Discover ZaroSoft AI solutions: Enterprise OCR Document Processing, RAG Knowledge Chatbots, Predictive Analytics, and automated LLM API integrations.')

@section('content')
<!-- Header Hero -->
<section class="relative overflow-hidden py-16 sm:py-20 bg-[#0B132B] border-b border-slate-800 text-center">
    <!-- Ambient Tech Background -->
    <div class="absolute inset-0 bg-tech-grid opacity-30 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-[#007BFF]/20 rounded-full blur-[130px] pointer-events-none animate-pulse-glow"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/5 border border-[#007BFF]/40 text-xs font-bold uppercase tracking-[0.18em] text-[#00D2FF] backdrop-blur-md shadow-lg shadow-[#007BFF]/20 font-mono">
            <span class="w-2 h-2 rounded-full bg-[#00D2FF] animate-pulse"></span>
            ENTERPRISE AI ARCHITECTURE
        </div>
        
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight font-heading">
            Applied Intelligence That <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Drives Real ROI.</span>
        </h1>

        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed font-normal">
            Move beyond generic chatbots. We engineer custom neural OCR document parsers, domain-trained RAG knowledge assistants, and automated multi-step LLM pipelines integrated directly into your database.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="{{ route('contact.index', ['service' => 'AI Solutions']) }}" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
                Integrate AI Into Your Software →
            </a>
            <a href="#services" class="px-8 py-4 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 hover:border-[#007BFF] font-bold text-sm backdrop-blur-md transition-all shadow-xl">
                Explore 6 AI Capabilities ↓
            </a>
        </div>
    </div>
</section>

<!-- AI Core Services Grid -->
<section class="py-24 bg-[#080E21] relative overflow-hidden text-white" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 reveal">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#00D2FF] font-mono">ENTERPRISE CAPABILITIES</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white font-heading">
                Practical AI Engineered For <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Measurable ROI</span>
            </h2>
            <p class="text-slate-400 text-sm sm:text-base">
                We focus on high-impact operational automations that save hundreds of human work-hours every month.
            </p>
        </div>

        @php
        $aiServices = [
            [
                'title' => 'Document OCR & Invoice Extraction',
                'badge' => 'Highest ROI',
                'desc' => 'Automatically extract vendor names, line items, taxes, and totals from PDF & paper invoices directly into your ERP ledger with 99.4% precision.',
                'highlights' => ['Multi-page PDF parsing', '3-Way matching with POs', 'Zero manual typing', 'Fraud & anomaly alerts'],
                'icon_type' => 'ocr',
            ],
            [
                'title' => 'Context-Aware AI Chatbots (RAG)',
                'badge' => '24/7 Support',
                'desc' => 'Custom conversational agents trained specifically on your company FAQs, product catalogs, and policies via secure Retrieval-Augmented Generation.',
                'highlights' => ['Sub-second response times', 'Multi-lingual support', 'Human fallback handover', 'WhatsApp/Web chat widget'],
                'icon_type' => 'bot',
            ],
            [
                'title' => 'Predictive Demand & Inventory',
                'badge' => 'Forecasting',
                'desc' => 'Machine learning models analyzing historical sales data to forecast future inventory demand, reduce warehouse waste, and prevent stockouts.',
                'highlights' => ['Seasonal trend analysis', 'Low-stock warnings', 'Revenue projections', 'Customer churn scoring'],
                'icon_type' => 'chart',
            ],
            [
                'title' => 'Intelligent Recommendation Engines',
                'badge' => 'E-Commerce',
                'desc' => 'Hyper-personalized product and content recommendations powered by collaborative filtering to boost shopping cart sizes and retention.',
                'highlights' => ['Dynamic "Frequently Bought With"', 'User behavior personalization', 'A/B tested uplift', 'Real-time scoring'],
                'icon_type' => 'target',
            ],
            [
                'title' => 'Autonomous Business Workflows',
                'badge' => 'Automation',
                'desc' => 'Automate complex multi-step workflows across your email, ERP, cloud storage, and CRM without human intervention.',
                'highlights' => ['Automated customer onboarding', 'Smart lead qualification', 'Dynamic email generation', 'Automated report creation'],
                'icon_type' => 'zap',
            ],
            [
                'title' => 'Custom LLM & Private Model Hosting',
                'badge' => 'Private & Secure',
                'desc' => 'Integrate OpenAI, Anthropic, or self-hosted open-source AI models (Llama 3, Mistral) securely inside your private cloud infrastructure.',
                'highlights' => ['Zero data retention for training', 'Role-based access security', 'Cached API token cost savings', 'Custom fine-tuning'],
                'icon_type' => 'cpu',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($aiServices as $index => $ai)
            <div class="p-8 rounded-2xl bg-[#0D1836] border border-slate-800 hover:border-[#007BFF]/50 shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group spotlight-card reveal" data-delay="{{ ($index % 3) * 100 }}">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-xl bg-[#007BFF]/15 text-[#00D2FF] flex items-center justify-center border border-[#007BFF]/30 group-hover:scale-105 transition-transform">
                            @if($ai['icon_type'] == 'ocr')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            @elseif($ai['icon_type'] == 'bot')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            @elseif($ai['icon_type'] == 'chart')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            @elseif($ai['icon_type'] == 'target')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @elseif($ai['icon_type'] == 'zap')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                            @endif
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#007BFF]/20 text-[#00D2FF] border border-[#007BFF]/30 font-mono">
                            {{ $ai['badge'] }}
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-white group-hover:text-[#00D2FF] transition-colors font-heading">
                        {{ $ai['title'] }}
                    </h3>

                    <p class="text-xs text-slate-300 leading-relaxed">
                        {{ $ai['desc'] }}
                    </p>

                    <div class="pt-4 border-t border-slate-800 space-y-1.5">
                        @foreach($ai['highlights'] as $highlight)
                        <div class="flex items-center gap-2 text-xs text-slate-300">
                            <span class="text-[#00D2FF] font-bold">✓</span>
                            <span>{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-5 mt-5 border-t border-slate-800">
                    <a href="{{ route('contact.index', ['service' => 'AI: ' . $ai['title']]) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#00D2FF] hover:text-white group-hover:translate-x-1 transition-all">
                        <span>Discuss Architecture</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- AI Architecture & Security -->
<section class="py-24 bg-[#0B132B] text-white border-t border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-tech-grid opacity-20 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-6 reveal-left">
                <span class="text-xs font-bold uppercase tracking-widest text-[#00D2FF] font-mono">SECURITY & PRIVACY FIRST</span>
                <h2 class="text-3xl sm:text-4xl font-black leading-tight font-heading">
                    Enterprise Data Privacy <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Without Compromise.</span>
                </h2>
                <div class="space-y-3 pt-2">
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center font-bold text-xs border border-[#007BFF]/30">✓</span>
                        <span class="text-slate-300 text-xs sm:text-sm">Private data isolation inside your MySQL / PostgreSQL databases</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center font-bold text-xs border border-[#007BFF]/30">✓</span>
                        <span class="text-slate-300 text-xs sm:text-sm">SOC2 / GDPR compliant API routing & payload encryption</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/20 text-[#00D2FF] flex items-center justify-center font-bold text-xs border border-[#007BFF]/30">✓</span>
                        <span class="text-slate-300 text-xs sm:text-sm">Option for 100% self-hosted on-premise open-source LLMs</span>
                    </div>
                </div>
            </div>

            <!-- Visual Terminal -->
            <div class="lg:col-span-6 p-6 rounded-2xl bg-[#080E21] border border-slate-700 font-mono text-xs text-slate-300 space-y-4 shadow-2xl spotlight-card reveal-right">
                <div class="flex items-center justify-between pb-3 border-b border-slate-800 text-slate-400">
                    <span>zarosoft-ai-neuralbot v2.4</span>
                    <span class="text-emerald-400">● Encrypted TLS</span>
                </div>
                <div class="space-y-2 text-[11px]">
                    <p class="text-[#00D2FF]">[INVOICE_OCR] Received payload: invoice_apex_mill_492.pdf</p>
                    <p class="text-slate-400">→ Running computer vision layout detection...</p>
                    <p class="text-cyan-300">→ Matched Vendor: "Apex Steel Mills Ltd" (Entity: #4012)</p>
                    <p class="text-cyan-300">→ Extracted 14 line items, Subtotal: $42,500.00, Tax: $2,125.00</p>
                    <p class="text-emerald-400">✓ 3-Way Match Verified against PO #88921. Ledger Journal Entry Posted in 410ms!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-[#080E21] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Ready to Explore How AI Can Accelerate Your Operations?</h2>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl mx-auto">Book an AI architecture discovery call with our lead technical architect.</p>
        <a href="{{ route('contact.index', ['service' => 'AI Solutions']) }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Schedule AI Consultation</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection

