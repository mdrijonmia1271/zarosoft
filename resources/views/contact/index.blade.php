@extends('layouts.app')

@section('title', 'Start a Project / Contact Us — ZaroSoft')
@section('meta_description', 'Tell us about your project requirements. Get an estimated budget, delivery timeline, and technical proposal from ZaroSoft founders.')

@section('content')
<div x-data="{ 
    selectedService: '{{ $preselectedService ?? 'Website Development' }}',
    selectedBudget: '$5,000 - $10,000'
}">
    <!-- Header Hero -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden py-20 sm:py-24 bg-[#F8FAFC] border-b border-slate-200/80 text-center">
        <!-- Ambient Blue & Cyan Pulsing Glows & Grid Pattern -->
        <div class="absolute inset-0 bg-grid-pattern pointer-events-none opacity-60"></div>
        <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-[#007BFF]/10 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-glow"></div>
        <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-[#00D2FF]/15 rounded-full blur-[110px] pointer-events-none -z-10 animate-pulse-glow" style="animation-delay: 2s;"></div>

        <!-- Text Layer on Top -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
                <span class="w-2 h-2 rounded-full bg-[#00D2FF] animate-ping"></span>
                Let's Build Something Great Together
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#111827] leading-tight font-heading">
                Start Your Project With <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">ZaroSoft.</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
                Share your operational goals and technical specifications. Our founders will review your inquiry and schedule a detailed technical discovery session.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <a href="#contact-form" class="px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-1 transition-all duration-300">
                    Fill Inquiry Form ↓
                </a>
                <a href="tel:+8801712345678" class="px-8 py-4 rounded-full bg-white hover:bg-slate-50 text-[#111827] font-bold text-sm border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    Direct Call 📞
                </a>
            </div>
        </div>
    </section>

    <!-- Main Contact & Estimator Grid -->
    <section class="py-24 bg-white relative overflow-hidden" id="contact-form">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left: Form -->
                <div class="lg:col-span-8 p-8 sm:p-12 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 shadow-xl space-y-8 spotlight-card reveal-left">
                    <div>
                        <h2 class="text-2xl font-extrabold text-[#111827] font-heading">Project Inquiry & Estimation Form</h2>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1">We respect your privacy. All information shared is protected under strict NDA.</p>
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- 1. Service Selection Pills -->
                        <div class="space-y-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#111827]">
                                01. What Service Do You Need? *
                            </label>
                            <input type="hidden" name="service_interest" :value="selectedService">
                            
                            @php
                            $serviceOptions = [
                                'Website Development', 'Mobile App Development', 'E-commerce', 'ERP Development',
                                'CRM Development', 'Custom Software', 'SaaS Development', 'AI & OCR Solutions',
                                'Cloud & DevOps', 'UI/UX & Brand Design', 'Other'
                            ];
                            @endphp

                            <div class="flex flex-wrap gap-2">
                                @foreach($serviceOptions as $opt)
                                <button type="button" @click="selectedService = '{{ $opt }}'"
                                        :class="{ 'bg-[#007BFF] text-white border-[#007BFF] shadow-md shadow-[#007BFF]/30': selectedService === '{{ $opt }}', 'bg-white text-slate-700 border-slate-200 hover:border-[#007BFF]/50 hover:bg-slate-50': selectedService !== '{{ $opt }}' }"
                                        class="px-4 py-2 rounded-full text-xs font-semibold border transition-all">
                                    {{ $opt }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- 2. Budget Range Selector -->
                        <div class="space-y-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#111827]">
                                02. What is Your Estimated Budget?
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
                                        class="py-2.5 px-2 rounded-full text-xs font-bold border text-center transition-all">
                                    {{ $b }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- 3. Contact Details -->
                        <div class="space-y-4">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#111827]">
                                03. Your Contact Information
                            </label>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Your Full Name *</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-sm text-[#111827] focus:outline-none focus:border-[#007BFF]" placeholder="e.g. John Doe">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Email Address *</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-sm text-[#111827] focus:outline-none focus:border-[#007BFF]" placeholder="e.g. john@company.com">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Phone / WhatsApp</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-sm text-[#111827] focus:outline-none focus:border-[#007BFF]" placeholder="+880 1700-000000">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Company / Organization</label>
                                    <input type="text" name="company" value="{{ old('company') }}" class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-sm text-[#111827] focus:outline-none focus:border-[#007BFF]" placeholder="e.g. Acme Corp Ltd.">
                                </div>
                            </div>
                        </div>

                        <!-- 4. Project Details -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#111827]">
                                04. Describe Your Project Requirements *
                            </label>
                            <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-sm text-[#111827] focus:outline-none focus:border-[#007BFF]" placeholder="Tell us about the business problem, key modules required, current systems, and target launch timeline...">{{ old('message') }}</textarea>
                        </div>

                        <!-- 5. Attachment (Optional) -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#111827]">
                                05. Attach Specification / RFP File (Optional)
                            </label>
                            <input type="file" name="attachment" class="block w-full text-xs text-slate-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#007BFF]/10 file:text-[#007BFF] hover:file:bg-[#007BFF] hover:file:text-white transition-colors">
                            <p class="text-[11px] text-slate-500">Supported formats: PDF, DOC, DOCX, PNG, JPG, ZIP (Max: 10MB)</p>
                        </div>

                        <button type="submit" class="w-full py-4 px-8 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-extrabold text-base shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all">
                            Submit Project Request & Get Proposal →
                        </button>
                    </form>
                </div>

                <!-- Right: Contact Cards & Guarantee -->
                <div class="lg:col-span-4 space-y-6 reveal-right">
                    <!-- Contact Info Card -->
                    <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 shadow-md space-y-6 spotlight-card">
                        <h3 class="text-lg font-bold text-[#111827] border-b border-slate-200/80 pb-3 font-heading">
                            Direct Contact
                        </h3>

                        <div class="space-y-4 text-xs">
                            <div class="flex items-start gap-3">
                                <span class="p-2 rounded-xl bg-[#007BFF]/10 text-[#007BFF] shrink-0 border border-[#007BFF]/20 shadow-sm">📧</span>
                                <div>
                                    <p class="text-slate-500 font-semibold">Email Us:</p>
                                    <a href="mailto:info@zarosoft.com" class="text-[#111827] font-bold hover:text-[#007BFF] transition-colors">
                                        info@zarosoft.com
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <span class="p-2 rounded-xl bg-[#007BFF]/10 text-[#007BFF] shrink-0 border border-[#007BFF]/20 shadow-sm">📱</span>
                                <div>
                                    <p class="text-slate-500 font-semibold">Hotline / WhatsApp:</p>
                                    <a href="tel:+8801712345678" class="text-[#111827] font-bold hover:text-[#007BFF] transition-colors">
                                        +880 1712 345678
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <span class="p-2 rounded-xl bg-[#007BFF]/10 text-[#007BFF] shrink-0 border border-[#007BFF]/20 shadow-sm">🏢</span>
                                <div>
                                    <p class="text-slate-500 font-semibold">HQ Address:</p>
                                    <p class="text-[#111827] font-bold leading-relaxed">
                                        House 12, Road 5, Dhanmondi, Dhaka-1205, Bangladesh
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <span class="p-2 rounded-xl bg-[#007BFF]/10 text-[#007BFF] shrink-0 border border-[#007BFF]/20 shadow-sm">⏰</span>
                                <div>
                                    <p class="text-slate-500 font-semibold">Business Hours:</p>
                                    <p class="text-[#111827] font-bold">
                                        Sun - Thu: 9:00 AM - 7:00 PM (GMT+6)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SLA Promise Card -->
                    <div class="p-8 rounded-3xl bg-[#111827] text-white border border-slate-800 shadow-xl space-y-4 spotlight-card">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#00D2FF] animate-pulse"></span>
                            <h4 class="text-sm font-bold uppercase tracking-wider text-[#00D2FF] font-heading">Our SLA Guarantee</h4>
                        </div>
                        <ul class="space-y-2.5 text-xs text-slate-300">
                            <li class="flex items-center gap-2">
                                <span class="text-[#00D2FF] font-bold">✓</span>
                                <span>24-Hour response time guaranteed</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-[#00D2FF] font-bold">✓</span>
                                <span>Free architectural discovery session</span>
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
