@extends('layouts.app')

@section('title', 'AI & Innovation — Intelligence That Drives Your Business | ZaroSoft')
@section('meta_description', 'Discover ZaroSoft AI solutions: Enterprise OCR Document Processing, RAG Knowledge Chatbots, Predictive Analytics, and automated LLM API integrations.')

@section('content')
<!-- Header Hero with 3D Background & Text On Top -->
<section class="relative min-h-[58vh] flex items-center justify-center overflow-hidden py-24 sm:py-28 bg-[#06080e] border-b border-white/5 text-center">
    <!-- 3D Tech Background (Softly Blurred / Halka Japsa) -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <img src="{{ asset('images/rocket-launch.jpg') }}" 
             alt="ZaroSoft 3D AI Innovation Background" 
             class="w-full h-full object-cover object-center opacity-45 blur-[2px] scale-105 transition-all">
        <div class="absolute inset-0 bg-gradient-to-b from-[#06080e]/80 via-[#06080e]/50 to-[#06080e]"></div>
        <div class="absolute inset-0 bg-[#06080e]/40"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-[#007BFF]/20 rounded-full blur-[130px] pointer-events-none animate-pulse-glow"></div>
    </div>

    <!-- Text Layer on Top -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#06080e]/80 border border-[#007BFF]/40 text-xs font-bold uppercase tracking-[0.2em] text-[#00D2FF] backdrop-blur-md shadow-lg shadow-[#007BFF]/20">
            <span class="animate-pulse">✨</span> Future-Ready Business AI
        </div>
        
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight font-heading drop-shadow-[0_4px_16px_rgba(0,0,0,0.9)]">
            Intelligence That <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Drives Your Business.</span>
        </h1>

        <p class="text-base sm:text-lg text-slate-200 max-w-2xl mx-auto leading-relaxed font-normal drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)]">
            Move beyond generic prompts. We engineer custom AI agents, automated invoice OCR engines, and predictive analytics that integrate directly into your database.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="{{ route('contact.index', ['service' => 'AI Solutions']) }}" class="px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0099FF] to-[#00D2FF] hover:from-[#0069d9] hover:to-[#00B4FF] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
                Integrate AI Into Your Software →
            </a>
            <a href="#services" class="px-8 py-4 rounded-full bg-[#06080e]/80 hover:bg-slate-900 text-white border border-white/20 hover:border-[#007BFF] font-bold text-sm backdrop-blur-md transition-all shadow-xl">
                Explore AI Services ↓
            </a>
        </div>
    </div>
</section>

<!-- AI Core Services Grid -->
<section class="py-24 bg-[#080b12] relative overflow-hidden" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 reveal">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">Capabilities</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white font-heading">
                Practical AI Engineered For <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Measurable ROI</span>
            </h2>
            <p class="text-slate-400 text-sm sm:text-base">
                We focus on high-impact operational automations that save hundreds of human work-hours every month.
            </p>
        </div>

        @php
        $aiServices = [
            [
                'title' => 'Document Processing & OCR',
                'icon' => '📄',
                'badge' => 'Highest ROI',
                'desc' => 'Automatically extract vendor names, line items, taxes, and amounts from paper and PDF invoices directly into your MySQL/ERP database with 99%+ accuracy.',
                'highlights' => ['Multi-page PDF parsing', '3-Way matching with POs', 'Zero manual typing', 'Fraud & anomaly alerts'],
            ],
            [
                'title' => 'Context-Aware AI Chatbots',
                'icon' => '🤖',
                'badge' => '24/7 Support',
                'desc' => 'Custom conversational agents trained specifically on your company FAQs, product catalogs, and policies via secure Retrieval-Augmented Generation (RAG).',
                'highlights' => ['Sub-second response times', 'Multi-lingual support', 'Human fallback handover', 'WhatsApp/Web chat widget'],
            ],
            [
                'title' => 'Predictive Business Analytics',
                'icon' => '📈',
                'badge' => 'Forecasting',
                'desc' => 'Machine learning models analyzing historical sales data to forecast future inventory demand, reduce warehouse storage waste, and prevent stockouts.',
                'highlights' => ['Seasonal trend analysis', 'Low-stock warnings', 'Revenue projections', 'Customer churn scoring'],
            ],
            [
                'title' => 'Intelligent Recommendation Engines',
                'icon' => '🎯',
                'badge' => 'E-Commerce',
                'desc' => 'Hyper-personalized product and content recommendations powered by collaborative filtering to boost shopping cart sizes and user retention.',
                'highlights' => ['Dynamic "Frequently Bought With"', 'User behavior personalization', 'A/B tested uplift', 'Real-time scoring'],
            ],
            [
                'title' => 'Business Process Automation',
                'icon' => '⚡',
                'badge' => 'Workflow',
                'desc' => 'Automate complex multi-step workflows across your email, ERP, cloud storage, and CRM without human intervention.',
                'highlights' => ['Automated customer onboarding', 'Smart lead qualification', 'Dynamic email generation', 'Automated report creation'],
            ],
            [
                'title' => 'Custom LLM & API Integration',
                'icon' => '🔌',
                'badge' => 'Private & Secure',
                'desc' => 'Integrate OpenAI, Anthropic, or self-hosted open-source AI models (Llama 3, Mistral) securely inside your private cloud infrastructure.',
                'highlights' => ['Zero data retention for training', 'Role-based access security', 'Cached API token cost savings', 'Custom fine-tuning'],
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($aiServices as $index => $ai)
            <div class="p-8 rounded-3xl bg-[#0c1018] border border-white/5 hover:border-[#007BFF]/40 shadow-2xl transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between group spotlight-card reveal" data-delay="{{ ($index % 3) * 120 }}">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">{{ $ai['icon'] }}</span>
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#007BFF]/10 text-[#00D2FF] border border-[#007BFF]/20">
                            {{ $ai['badge'] }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-white group-hover:text-[#00D2FF] transition-colors font-heading">
                        {{ $ai['title'] }}
                    </h3>

                    <p class="text-sm text-slate-400 leading-relaxed">
                        {{ $ai['desc'] }}
                    </p>

                    <div class="pt-4 border-t border-white/5 space-y-2">
                        @foreach($ai['highlights'] as $highlight)
                        <div class="flex items-center gap-2 text-xs text-slate-300">
                            <span class="text-[#007BFF] font-bold">✓</span>
                            <span>{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-white/5">
                    <a href="{{ route('contact.index', ['service' => 'AI: ' . $ai['title']]) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] group-hover:translate-x-1 transition-all">
                        <span>Discuss Implementation</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- AI Architecture & Security -->
<section class="py-24 bg-[#06080e] text-white border-t border-white/5 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-20"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6 reveal-left">
                <span class="text-xs font-bold uppercase tracking-widest text-[#00D2FF]">Security & Privacy First</span>
                <h2 class="text-3xl sm:text-4xl font-black leading-tight font-heading">
                    Enterprise Data Privacy <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Without Compromise.</span>
                </h2>
                <div class="space-y-3 pt-2">
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-bold text-xs border border-[#007BFF]/20">✓</span>
                        <span class="text-slate-300 text-xs">Private data isolation inside your MySQL / PostgreSQL databases</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-bold text-xs border border-[#007BFF]/20">✓</span>
                        <span class="text-slate-300 text-xs">SOC2 / GDPR compliant API routing & payload encryption</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center font-bold text-xs border border-[#007BFF]/20">✓</span>
                        <span class="text-slate-300 text-xs">Option for 100% self-hosted on-premise open-source LLMs</span>
                    </div>
                </div>
            </div>

            <!-- Visual Terminal -->
            <div class="p-6 rounded-3xl bg-[#0c1018] border border-white/10 font-mono text-xs text-slate-300 space-y-4 shadow-2xl spotlight-card reveal-right">
                <div class="flex items-center justify-between pb-3 border-b border-white/5 text-slate-500">
                    <span>zarosoft-ai-gateway v2.4</span>
                    <span class="text-emerald-400">● Encrypted TLS</span>
                </div>
                <div class="space-y-2 text-[11px]">
                    <p class="text-[#00D2FF]">[INVOICE_OCR] Received file: invoice_apex_mill_492.pdf</p>
                    <p class="text-slate-400">→ Running computer vision layout detection...</p>
                    <p class="text-cyan-300">→ Matched Vendor: "Apex Steel Mills Ltd" (ID: #4012)</p>
                    <p class="text-cyan-300">→ Extracted Line Items: 14 items, Subtotal: $42,500.00, Tax: $2,125.00</p>
                    <p class="text-emerald-400">✓ 3-Way Match Verified against PO #88921. Ledger Journal Entry Posted!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-[#06080e] text-white text-center border-t border-white/5 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Ready to Explore How AI Can Accelerate Your Operations?</h2>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl mx-auto">Book an AI architecture discovery call with our lead AI engineer.</p>
        <a href="{{ route('contact.index', ['service' => 'AI Solutions']) }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0099FF] to-[#00D2FF] hover:from-[#0069d9] hover:to-[#00B4FF] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Schedule AI Consultation</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection
