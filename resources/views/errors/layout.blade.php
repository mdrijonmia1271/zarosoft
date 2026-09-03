@extends('layouts.app')

@section('title', $code . ' — ' . $heading)
@section('robots', 'noindex, follow')

@section('content')
<section class="relative overflow-hidden py-24 sm:py-32 bg-[#0F172A] text-white">
    <div class="absolute inset-0 bg-grid-pattern opacity-40 pointer-events-none"></div>
    <div class="absolute -top-24 -left-24 w-[28rem] h-[28rem] rounded-full bg-[#007BFF]/10 blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-24 w-[26rem] h-[26rem] rounded-full bg-[#00D2FF]/10 blur-[120px] pointer-events-none"></div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-7">
        <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-[#00D2FF] font-heading">Error {{ $code }}</p>

        <h1 class="text-6xl sm:text-8xl font-black font-heading leading-none text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] to-[#00D2FF]">
            {{ $code }}
        </h1>

        <h2 class="text-2xl sm:text-3xl font-black text-white font-heading">{{ $heading }}</h2>

        <p class="text-sm sm:text-base text-slate-400 max-w-xl mx-auto leading-relaxed">{{ $message }}</p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-2">
            <a href="{{ route('home') }}" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-gradient-to-r from-[#007BFF] to-[#0052cc] hover:from-[#0062cc] hover:to-[#003d99] text-white font-bold text-sm shadow-xl shadow-[#007BFF]/30 transition-all">
                Back to homepage
            </a>
            <a href="{{ route('contact.index') }}" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white font-bold text-sm border border-white/20 backdrop-blur-md transition-all">
                Talk to our team
            </a>
        </div>

        <div class="pt-6 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-xs text-slate-500">
            <a href="{{ route('services.index') }}" class="hover:text-slate-300 transition-colors">Services</a>
            <a href="{{ route('portfolio.index') }}" class="hover:text-slate-300 transition-colors">Work</a>
            <a href="{{ route('blog.index') }}" class="hover:text-slate-300 transition-colors">Insights</a>
            <a href="{{ route('faq.index') }}" class="hover:text-slate-300 transition-colors">FAQ</a>
        </div>
    </div>
</section>
@endsection
