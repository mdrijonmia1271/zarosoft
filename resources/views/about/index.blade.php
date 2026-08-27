@extends('layouts.app')

@section('title', 'About ZaroSoft — Build. Innovate. Grow.')
@section('meta_description', 'Learn about ZaroSoft, our mission to automate enterprise workflows, our leadership team, and the core ZARO philosophy.')

@section('content')
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
            About ZaroSoft
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#111827] leading-tight font-heading">
            We Build Technology That <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Solves Business Problems.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            ZaroSoft was founded by passionate software engineers and product strategists on a single conviction: modern enterprises shouldn't be held back by slow, disjointed, and legacy tools.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="#team" class="px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/25 hover:shadow-[#007BFF]/40 hover:-translate-y-1 transition-all duration-300">
                Meet Our Team ↓
            </a>
            <a href="{{ route('contact.index') }}" class="px-8 py-4 rounded-full bg-white hover:bg-slate-50 text-[#111827] font-bold text-sm border border-slate-200 hover:border-[#007BFF] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                Get In Touch →
            </a>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-24 bg-white border-b border-slate-200/80 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Mission -->
            <div class="p-8 sm:p-10 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 space-y-4 group spotlight-card reveal-left" data-delay="0">
                <div class="w-14 h-14 rounded-2xl bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center text-2xl font-bold border border-[#007BFF]/20 group-hover:scale-110 group-hover:bg-[#007BFF] group-hover:text-white transition-all shadow-md shadow-[#007BFF]/10">
                    🎯
                </div>
                <h2 class="text-2xl font-extrabold text-[#111827] font-heading group-hover:text-[#007BFF] transition-colors">Our Mission</h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    To build smart, reliable, and innovative technology solutions that simplify operations, eliminate human error, and unlock unprecedented operational velocity for businesses globally.
                </p>
            </div>

            <!-- Vision -->
            <div class="p-8 sm:p-10 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-500 space-y-4 group spotlight-card reveal-right" data-delay="100">
                <div class="w-14 h-14 rounded-2xl bg-[#00D2FF]/15 text-[#007BFF] flex items-center justify-center text-2xl font-bold border border-[#00D2FF]/30 group-hover:scale-110 group-hover:bg-[#007BFF] group-hover:text-white transition-all shadow-md shadow-[#00D2FF]/10">
                    🚀
                </div>
                <h2 class="text-2xl font-extrabold text-[#111827] font-heading group-hover:text-[#007BFF] transition-colors">Our Vision</h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    To become the premier trusted global software engineering and business automation partner known for pristine code quality, rock-solid system reliability, and measurable client success.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- The ZARO Philosophy -->
<section class="py-24 bg-[#F8FAFC] border-b border-slate-200/80 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
                <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                Core Brand Pillars
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#111827] font-heading">
                The <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">ZARO</span> Principles
            </h2>
            <p class="text-slate-600 text-sm sm:text-base">
                Each letter in our brand represents an uncompromising commitment to our clients.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-8 rounded-3xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="0">
                <span class="text-4xl font-black text-[#007BFF] font-heading">Z</span>
                <h3 class="text-xl font-bold text-[#111827]">Zenith</h3>
                <p class="text-xs font-bold text-[#007BFF]">Aiming for Highest Quality</p>
                <p class="text-xs text-slate-500 leading-relaxed">
                    We never accept good enough. We build to the highest international standards of code craftsmanship, security, and design.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="100">
                <span class="text-4xl font-black text-[#00D2FF] font-heading">A</span>
                <h3 class="text-xl font-bold text-[#111827]">Automation</h3>
                <p class="text-xs font-bold text-[#007BFF]">Business Automation</p>
                <p class="text-xs text-slate-500 leading-relaxed">
                    We replace slow, error-prone manual spreadsheets and disjointed tools with unified, intelligent automated systems.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="200">
                <span class="text-4xl font-black text-[#007BFF] font-heading">R</span>
                <h3 class="text-xl font-bold text-[#111827]">Reliability</h3>
                <p class="text-xs font-bold text-[#007BFF]">Reliable Technology</p>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Zero downtime surprises. We engineer dependable, high-concurrency systems backed by 99.9% uptime and automated backups.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-white border border-slate-200/80 hover:border-[#007BFF]/50 shadow-sm hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1 space-y-3 spotlight-card reveal" data-delay="300">
                <span class="text-4xl font-black text-[#00D2FF] font-heading">O</span>
                <h3 class="text-xl font-bold text-[#111827]">Optimization</h3>
                <p class="text-xs font-bold text-[#007BFF]">Smart & Efficient Solutions</p>
                <p class="text-xs text-slate-500 leading-relaxed">
                    We optimize for lightning speed, minimal cloud infrastructure bills, higher employee productivity, and maximum ROI.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 4 Founders & Leadership -->
<section class="py-24 bg-white relative overflow-hidden" id="team">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.2em] text-[#007BFF]">
                <span class="w-1.5 h-1.5 rounded-full bg-[#007BFF] animate-pulse"></span>
                Core Leadership
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#111827] font-heading">
                Meet the <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">Co-Founders</span>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base">
                The four engineers and strategists driving ZaroSoft's technical vision, execution, and client success.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($founders as $index => $founder)
            <div class="rounded-3xl overflow-hidden bg-white border border-slate-200/80 shadow-md group hover:border-[#007BFF]/50 hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between spotlight-card reveal" data-delay="{{ $index * 100 }}">
                <div>
                    <!-- Photo -->
                    <div class="relative h-64 overflow-hidden bg-slate-900">
                        <img src="{{ $founder->avatar }}" alt="{{ $founder->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#111827]/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-3 left-4 right-4">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-white bg-[#007BFF] px-2.5 py-1 rounded-full shadow-md">
                                {{ $founder->role_title ?? 'Co-Founder' }}
                            </span>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="p-6 space-y-3">
                        <h3 class="text-lg font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors">{{ $founder->name }}</h3>
                        <p class="text-xs font-semibold text-[#007BFF]">{{ $founder->designation }}</p>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            {{ $founder->bio }}
                        </p>

                        @if($founder->skills && is_array($founder->skills))
                        <div class="flex flex-wrap gap-1.5 pt-2">
                            @foreach($founder->skills as $skill)
                            <span class="text-[10px] px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 font-medium border border-slate-200">
                                {{ $skill }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Socials -->
                <div class="p-6 pt-0 flex items-center gap-3 text-slate-500 border-t border-slate-100 mt-4 pt-4">
                    @if($founder->linkedin_url)
                    <a href="{{ $founder->linkedin_url }}" target="_blank" class="p-2 rounded-lg bg-slate-100 hover:bg-[#007BFF] hover:text-white border border-slate-200 transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    @endif
                    @if($founder->github_url)
                    <a href="{{ $founder->github_url }}" target="_blank" class="p-2 rounded-lg bg-slate-100 hover:bg-[#007BFF] hover:text-white border border-slate-200 transition-colors">
                        <span class="sr-only">GitHub</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                    </a>
                    @endif
                    @if($founder->email)
                    <a href="mailto:{{ $founder->email }}" class="p-2 rounded-lg bg-slate-100 hover:bg-[#007BFF] hover:text-white border border-slate-200 transition-colors">
                        <span class="sr-only">Email</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-[#111827] text-white text-center border-t border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 reveal">
        <h2 class="text-3xl sm:text-4xl font-black font-heading">Ready to Collaborate with Our Engineering Team?</h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto">Tell us about your project challenges. We will schedule a direct consultation with our founders.</p>
        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-[#007BFF] via-[#0095FF] to-[#00D2FF] hover:from-[#0062cc] hover:to-[#00b8e6] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 hover:shadow-[#007BFF]/50 hover:-translate-y-0.5 transition-all">
            <span>Start a Conversation</span>
            <span>→</span>
        </a>
    </div>
</section>
@endsection
