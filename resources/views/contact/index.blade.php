@extends('layouts.app')

@section('title', 'Start a Project / Technical Consultation — ZaroSoft')
@section('meta_description', 'Tell us about your project requirements. Get an estimated budget, delivery timeline, and technical proposal from ZaroSoft founders.')

@section('content')
<div x-data="{ 
    selectedService: '{{ $preselectedService ?? $services->first()?->title ?? 'Other' }}',
    selectedBudget: '$5,000 - $10,000'
}">
    <!-- Header Hero -->
    <section class="relative overflow-hidden py-16 sm:py-20 bg-[#F8FAFC] border-b border-slate-200/80 text-center">
        <!-- Ambient Tech Background -->
        <div class="absolute inset-0 bg-tech-grid opacity-70 pointer-events-none"></div>
        <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-[#007BFF]/10 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-glow"></div>
        <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-[#00D2FF]/15 rounded-full blur-[110px] pointer-events-none -z-10 animate-pulse-glow" style="animation-delay: 2s;"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                TECHNICAL CONSULTATION & INQUIRY
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
                Start Your Project With <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">ZaroSoft.</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
                Share your operational goals and technical specifications. Our engineering leads will review your requirements and schedule an in-depth discovery session.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <a href="#contact-form" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0062cc] hover:from-[#0062cc] hover:to-[#004bb5] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                    Fill Scoping Form ↓
                </a>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('company_phone', '')) }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white hover:bg-slate-50 text-[#0F172A] font-bold text-sm border border-slate-200 hover:border-[#007BFF]/50 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                    <svg class="w-4 h-4 text-[#007BFF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>Direct Call Hotline</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Main Contact & Estimator Grid -->
    <section class="py-24 bg-white relative overflow-hidden" id="contact-form">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left: Form -->
                <div class="lg:col-span-8 p-8 sm:p-12 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 shadow-lg space-y-8 spotlight-card reveal-left">
                    <div>
                        <h2 class="text-2xl font-bold text-[#0F172A] font-heading">Project Inquiry & Estimation Form</h2>
                        <p class="text-xs text-slate-600 mt-1">We respect your privacy. All information shared is protected under strict non-disclosure terms.</p>
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- 1. Service Selection Pills -->
                        <div class="space-y-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0F172A] font-mono">
                                01. Select Primary Capability *
                            </label>
                            <input type="hidden" name="service_interest" :value="selectedService">
                            
                            @php
                            // Options come from Admin → Services, so the form always
                            // reflects what the company actually offers.
                            $serviceOptions = $services->pluck('title')->push('Other')->unique()->values();
                            @endphp

                            <div class="flex flex-wrap gap-2">
                                @foreach($serviceOptions as $opt)
                                <button type="button" @click="selectedService = '{{ $opt }}'"
                                        :class="{ 'bg-[#007BFF] text-white border-[#007BFF] shadow-md shadow-[#007BFF]/30': selectedService === '{{ $opt }}', 'bg-white text-slate-700 border-slate-200 hover:border-[#007BFF]/50 hover:bg-slate-50': selectedService !== '{{ $opt }}' }"
                                        class="px-3.5 py-1.5 rounded-lg text-xs font-semibold border transition-all">
                                    {{ $opt }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- 2. Budget Range Selector -->
                        <div class="space-y-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0F172A] font-mono">
                                02. Target Budget Range
                            </label>
                            <input type="hidden" name="budget_range" :value="selectedBudget">
                            
                            @php
                            $budgets = [
                                '< $2,500', '$2,500 - $5,000', '$5,000 - $10,000', '$10,000 - $25,000', '$25,000+'
                            ];
                            @endphp

                            <div class="grid grid-cols-2 sm:grid-cols-5 gap-2">
                                @foreach($budgets as $b)
                                <button type="button" @click="selectedBudget = '{{ $b }}'"
                                        :class="{ 'bg-[#007BFF] text-white border-[#007BFF] shadow-md shadow-[#007BFF]/30': selectedBudget === '{{ $b }}', 'bg-white text-slate-700 border-slate-200 hover:border-[#007BFF]/50 hover:bg-slate-50': selectedBudget !== '{{ $b }}' }"
                                        class="py-2 px-2 rounded-lg text-xs font-bold border text-center font-mono transition-all">
                                    {{ $b }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- 3. Contact Details -->
                        <div class="space-y-4">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0F172A] font-mono">
                                03. Contact Details
                            </label>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Your Full Name *</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm text-[#0F172A] focus:outline-none focus:border-[#007BFF]" placeholder="e.g. John Doe">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Email Address *</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm text-[#0F172A] focus:outline-none focus:border-[#007BFF]" placeholder="e.g. john@company.com">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Phone / WhatsApp</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm text-[#0F172A] focus:outline-none focus:border-[#007BFF]" placeholder="+880 1700-000000">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Company / Organization</label>
                                    <input type="text" name="company" value="{{ old('company') }}" class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm text-[#0F172A] focus:outline-none focus:border-[#007BFF]" placeholder="e.g. Acme Corp Ltd.">
                                </div>
                            </div>
                        </div>

                        <!-- 4. Project Details -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0F172A] font-mono">
                                04. Describe Requirements & Goals *
                            </label>
                            <textarea name="message" rows="4" required class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm text-[#0F172A] focus:outline-none focus:border-[#007BFF]" placeholder="Detail your operational bottleneck, desired modules, current legacy software, and expected launch milestone...">{{ old('message') }}</textarea>
                        </div>

                        <!-- 5. Attachment (Optional) -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0F172A] font-mono">
                                05. Attach Technical RFP / Wireframes (Optional)
                            </label>
                            <input type="file" name="attachment" class="block w-full text-xs text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#007BFF]/10 file:text-[#007BFF] hover:file:bg-[#007BFF] hover:file:text-white transition-colors">
                            <p class="text-[11px] text-slate-400">Supported: PDF, DOC, DOCX, PNG, JPG, ZIP (Max 10MB)</p>
                        </div>

                        <button type="submit" class="w-full py-4 px-8 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                            Submit Project Request & Get Proposal →
                        </button>
                    </form>
                </div>

                <!-- Right: Direct Contact & Guarantees -->
                <div class="lg:col-span-4 space-y-6 reveal-right">
                    <!-- Direct Contact Card -->
                    <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 shadow-sm space-y-6 spotlight-card">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-[#0F172A] border-b border-slate-200/80 pb-3 font-mono">
                            DIRECT CONTACT
                        </h3>

                        <div class="space-y-4 text-xs">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center shrink-0 border border-[#007BFF]/20">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-slate-500 font-semibold font-mono text-[11px]">Email Us:</p>
                                    <a href="mailto:{{ setting('company_email', 'contact@zarosoft.com') }}" class="text-[#0F172A] font-bold hover:text-[#007BFF] transition-colors">
                                        {{ setting('company_email', 'contact@zarosoft.com') }}
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center shrink-0 border border-[#007BFF]/20">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <p class="text-slate-500 font-semibold font-mono text-[11px]">Hotline / WhatsApp:</p>
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('company_phone', '')) }}" class="text-[#0F172A] font-bold hover:text-[#007BFF] transition-colors">
                                        {{ setting('company_phone', '—') }}
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center shrink-0 border border-[#007BFF]/20">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-slate-500 font-semibold font-mono text-[11px]">HQ Address:</p>
                                    <p class="text-[#0F172A] font-semibold leading-relaxed">
                                        {{ setting('company_address', 'Dhaka, Bangladesh') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center shrink-0 border border-[#007BFF]/20">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-slate-500 font-semibold font-mono text-[11px]">Operating Hours:</p>
                                    <p class="text-[#0F172A] font-semibold">
                                        {{ setting('working_hours', 'Sun – Thu: 9:00 AM – 7:00 PM (GMT+6)') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SLA Promise Card -->
                    <div class="p-8 rounded-2xl bg-[#0B132B] text-white border border-slate-800 shadow-xl space-y-4 spotlight-card">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#00D2FF] animate-pulse"></span>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-[#00D2FF] font-mono">OUR SLA GUARANTEE</h4>
                        </div>
                        <ul class="space-y-2 text-xs text-slate-300">
                            <li class="flex items-center gap-2">
                                <span class="text-[#00D2FF] font-bold">✓</span>
                                <span>24-Hour response time guarantee</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-[#00D2FF] font-bold">✓</span>
                                <span>Free architectural scoping session</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-[#00D2FF] font-bold">✓</span>
                                <span>Transparent milestones with 0 hidden fees</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-[#00D2FF] font-bold">✓</span>
                                <span>100% intellectual property (IP) transfer</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection

