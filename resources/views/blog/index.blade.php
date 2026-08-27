@extends('layouts.app')

@section('title', 'Engineering Insights & Tech Blog — ZaroSoft')
@section('meta_description', 'In-depth articles and tutorials on Laravel architecture, custom ERP systems, AI OCR integrations, and modern UI/UX design.')

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
            ZaroSoft Engineering Insights
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#111827] leading-tight font-heading">
            Architecture, Code & <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00B4FF] to-[#00D2FF]">Innovation</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            Practical strategies on ERP engineering, AI automation, high-performance database scaling, and product design.
        </p>

        <!-- Search Bar -->
        <div class="pt-2 max-w-xl mx-auto">
            <form action="{{ route('blog.index') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles by topic, framework, or AI..." class="w-full pl-12 pr-28 py-4 rounded-full bg-white border border-slate-200 text-sm text-[#111827] shadow-lg focus:outline-none focus:border-[#007BFF] placeholder-slate-400">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-6 py-2.5 rounded-full bg-gradient-to-r from-[#007BFF] to-[#00D2FF] text-white font-bold text-xs hover:from-[#0062cc] hover:to-[#00b8e6] transition-all shadow-md shadow-[#007BFF]/25">
                    Search
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Blog Grid & Categories -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
        
        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center justify-center gap-2 reveal">
            <a href="{{ route('blog.index') }}" class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ empty(request('category')) ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#111827] hover:bg-slate-200 border border-slate-200' }}">
                All Articles
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('blog.index', ['category' => $cat->slug]) }}" class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ request('category') === $cat->slug ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#111827] hover:bg-slate-200 border border-slate-200' }}">
                {{ $cat->name }} ({{ $cat->blogs_count }})
            </a>
            @endforeach
        </div>

        <!-- Featured Post (if on first page without search) -->
        @if($featuredPost && !request('search') && !request('category') && (!request('page') || request('page') == 1))
        <div class="rounded-3xl overflow-hidden bg-[#F8FAFC] border border-slate-200/80 shadow-md grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-6 sm:p-10 spotlight-card reveal">
            <div class="lg:col-span-6 rounded-2xl overflow-hidden bg-slate-900 h-72 lg:h-96 shadow-md">
                <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="lg:col-span-6 space-y-4">
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#007BFF]/10 text-[#007BFF] border border-[#007BFF]/25">
                        Featured Article
                    </span>
                    <span class="text-xs text-slate-500">{{ $featuredPost->read_time }}</span>
                </div>

                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#111827] leading-tight font-heading">
                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="hover:text-[#007BFF] transition-colors">
                        {{ $featuredPost->title }}
                    </a>
                </h2>

                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ $featuredPost->excerpt }}
                </p>

                <div class="pt-4 flex items-center justify-between border-t border-slate-200/80">
                    <div class="flex items-center gap-3">
                        <img src="{{ $featuredPost->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100' }}" class="w-9 h-9 rounded-full object-cover border border-slate-300">
                        <div>
                            <p class="text-xs font-bold text-[#111827]">{{ $featuredPost->author_name }}</p>
                            <p class="text-[10px] text-slate-500">{{ $featuredPost->published_at ? $featuredPost->published_at->format('M d, Y') : '' }}</p>
                        </div>
                    </div>

                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#00D2FF]">
                        <span>Read Article</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $index => $blog)
            <div class="rounded-3xl overflow-hidden bg-white border border-slate-200/80 shadow-md group hover:border-[#007BFF]/50 hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between spotlight-card reveal" data-delay="{{ ($index % 3) * 120 }}">
                <div>
                    <div class="relative h-48 overflow-hidden bg-slate-900">
                        <img src="{{ $blog->cover_image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-3 left-3">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/95 text-[#007BFF] border border-slate-200 shadow-sm">
                                {{ $blog->category->name }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 space-y-3">
                        <div class="flex items-center justify-between text-[11px] text-slate-500">
                            <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Recent' }}</span>
                            <span>⏱️ {{ $blog->read_time }}</span>
                        </div>

                        <h3 class="text-lg font-bold text-[#111827] group-hover:text-[#007BFF] transition-colors line-clamp-2 font-heading">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>

                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4 pt-4">
                    <span class="text-xs text-slate-500">{{ $blog->author_name }}</span>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-xs font-bold text-[#007BFF] hover:text-[#00D2FF] inline-flex items-center gap-1">
                        <span>Read More</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center text-slate-400 space-y-2">
                <p class="text-2xl">📝</p>
                <p class="text-sm font-semibold">No blog articles match your search query.</p>
                <a href="{{ route('blog.index') }}" class="text-xs text-[#007BFF] underline">Clear search filter</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pt-6">
            {{ $blogs->links() }}
        </div>

    </div>
</section>
@endsection
