@extends('layouts.app')

@section('title', 'Engineering Insights & Tech Blog — ZaroSoft')
@section('meta_description', 'In-depth articles and tutorials on Laravel architecture, custom ERP systems, AI OCR integrations, and modern UI/UX design.')

@section('content')
<!-- Header Hero -->
<section class="relative overflow-hidden py-16 sm:py-20 bg-[#F8FAFC] border-b border-slate-200/80 text-center">
    <!-- Ambient Tech Background -->
    <div class="absolute inset-0 bg-tech-grid opacity-70 pointer-events-none"></div>
    <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-[#007BFF]/10 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-glow"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-[#00D2FF]/15 rounded-full blur-[110px] pointer-events-none -z-10 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 reveal">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-[0.18em] text-[#007BFF] font-heading">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            ENGINEERING & ARCHITECTURE LOGS
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
            Architecture, Code & <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#007BFF] via-[#00A3FF] to-[#00D2FF]">Innovation.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl mx-auto">
            Practical strategies on ERP engineering, AI automation, high-performance database scaling, and product design.
        </p>

        <!-- Search Bar -->
        <div class="pt-2 max-w-xl mx-auto">
            <form action="{{ route('blog.index') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles by topic, framework, or AI..." class="w-full pl-12 pr-28 py-3.5 rounded-xl bg-white border border-slate-200 text-sm text-[#0F172A] shadow-md focus:outline-none focus:border-[#007BFF] placeholder-slate-400">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-5 py-2 rounded-lg bg-gradient-to-r from-[#007BFF] to-[#0062cc] text-white font-bold text-xs hover:from-[#0062cc] hover:to-[#004bb5] transition-all shadow-md shadow-[#007BFF]/25">
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
            <a href="{{ route('blog.index') }}" class="px-4 py-2 rounded-lg text-xs font-bold font-mono transition-all {{ empty(request('category')) ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#0F172A] hover:bg-slate-200 border border-slate-200' }}">
                ALL ARTICLES
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('blog.index', ['category' => $cat->slug]) }}" class="px-4 py-2 rounded-lg text-xs font-bold font-mono transition-all {{ request('category') === $cat->slug ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/30' : 'bg-slate-100 text-slate-700 hover:text-[#0F172A] hover:bg-slate-200 border border-slate-200' }}">
                {{ strtoupper($cat->name) }} ({{ $cat->blogs_count }})
            </a>
            @endforeach
        </div>

        <!-- Featured Post (if on first page without search) -->
        @if($featuredPost && !request('search') && !request('category') && (!request('page') || request('page') == 1))
        <div class="rounded-2xl overflow-hidden bg-[#F8FAFC] border border-slate-200/80 shadow-md grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-6 sm:p-10 spotlight-card reveal">
            <div class="lg:col-span-6 rounded-xl overflow-hidden bg-slate-900 h-72 lg:h-96 shadow-md">
                @if($featuredPost->cover_image_url)
                <x-picture :src="$featuredPost->cover_image" :alt="$featuredPost->title" width="1200" height="675" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                @else
                <div class="w-full h-full bg-gradient-to-br from-[#132139] to-[#0B132B]" aria-hidden="true"></div>
                @endif
            </div>
            <div class="lg:col-span-6 space-y-4">
                <div class="flex items-center gap-3">
                    <span class="px-3 py-0.5 rounded-full text-xs font-bold bg-[#007BFF]/10 text-[#007BFF] border border-[#007BFF]/25 font-mono">
                        FEATURED ARTICLE
                    </span>
                    <span class="text-xs text-slate-500 font-mono flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $featuredPost->read_time }}
                    </span>
                </div>

                <h2 class="text-2xl sm:text-3xl font-bold text-[#0F172A] leading-tight font-heading">
                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="hover:text-[#007BFF] transition-colors">
                        {{ $featuredPost->title }}
                    </a>
                </h2>

                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    {{ $featuredPost->excerpt }}
                </p>

                <div class="pt-4 flex items-center justify-between border-t border-slate-200/80">
                    <div class="flex items-center gap-3">
                        @if($featuredPost->author_avatar_url)
                        <img src="{{ $featuredPost->author_avatar_url }}" loading="lazy" class="w-9 h-9 rounded-full object-cover border border-slate-300" alt="{{ $featuredPost->author_name }}">
                        @else
                        <span class="w-9 h-9 rounded-full border border-slate-300 bg-slate-200 flex items-center justify-center text-[11px] font-bold text-slate-600">{{ $featuredPost->author_initials }}</span>
                        @endif
                        <div>
                            <p class="text-xs font-bold text-[#0F172A]">{{ $featuredPost->author_name }}</p>
                            <p class="text-[10px] text-slate-500 font-mono">{{ $featuredPost->published_at ? $featuredPost->published_at->format('M d, Y') : '' }}</p>
                        </div>
                    </div>

                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#0052b3]">
                        <span>Read Article</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $index => $blog)
            <div class="rounded-2xl overflow-hidden bg-white border border-slate-200/80 shadow-sm group hover:border-[#007BFF]/50 hover:shadow-xl hover:shadow-[#007BFF]/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between spotlight-card reveal" data-delay="{{ ($index % 3) * 100 }}">
                <div>
                    <div class="relative h-48 overflow-hidden bg-slate-900">
                        @if($blog->cover_image_url)
                        <x-picture :src="$blog->cover_image" :alt="$blog->title" width="1200" height="675" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-[#132139] to-[#0B132B]" aria-hidden="true"></div>
                        @endif
                        <div class="absolute top-3 left-3">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/95 text-[#007BFF] border border-slate-200 shadow-sm font-mono">
                                {{ $blog->category->name }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 space-y-3">
                        <div class="flex items-center justify-between text-[11px] text-slate-500 font-mono">
                            <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Recent' }}</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $blog->read_time }}
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-[#0F172A] group-hover:text-[#007BFF] transition-colors line-clamp-2 font-heading">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>

                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4 pt-4">
                    <span class="text-xs text-slate-500 font-medium">{{ $blog->author_name }}</span>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-xs font-bold text-[#007BFF] hover:text-[#0052b3] inline-flex items-center gap-1">
                        <span>Read More</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center text-slate-400 space-y-3">
                <svg class="w-12 h-12 mx-auto text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <p class="text-sm font-semibold text-slate-600">No blog articles match your search criteria.</p>
                <a href="{{ route('blog.index') }}" class="inline-block text-xs font-bold text-[#007BFF] underline">Reset filters</a>
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

