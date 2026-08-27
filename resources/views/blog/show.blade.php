@extends('layouts.app')

@section('title', $blog->title . ' — ZaroSoft Blog')
@section('meta_description', $blog->excerpt)

@section('content')
<!-- Header Hero -->
<section class="py-20 relative overflow-hidden bg-[#F8FAFC] border-b border-slate-200/80">
    <div class="absolute inset-0 bg-grid-pattern opacity-60"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#007BFF]/10 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 w-full reveal">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 font-medium">
            <a href="{{ route('home') }}" class="hover:text-[#007BFF]">Home</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-[#007BFF]">Blog</a>
            <span>/</span>
            <span class="text-[#111827] truncate">{{ $blog->title }}</span>
        </nav>

        <div class="flex items-center gap-3">
            <span class="px-3.5 py-1 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-wider text-[#007BFF] backdrop-blur-md">
                {{ $blog->category->name }}
            </span>
            <span class="text-xs text-slate-500 font-medium">⏱️ {{ $blog->read_time }}</span>
            <span class="text-xs text-slate-500 font-medium">👁️ {{ $blog->views_count }} views</span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-[#111827] leading-tight font-heading">
            {{ $blog->title }}
        </h1>

        <!-- Author Info -->
        <div class="flex items-center gap-4 pt-2">
            <img src="{{ $blog->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100' }}" class="w-11 h-11 rounded-full object-cover border border-slate-300">
            <div>
                <p class="text-sm font-bold text-[#111827]">{{ $blog->author_name }}</p>
                <p class="text-xs text-slate-500">{{ $blog->published_at ? $blog->published_at->format('F d, Y') : 'Published recently' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Article Body -->
<article class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Cover Image -->
        @if($blog->cover_image)
        <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200/80 bg-slate-900 spotlight-card reveal">
            <img src="{{ $blog->cover_image }}" alt="{{ $blog->title }}" class="w-full max-h-[500px] object-cover group-hover:scale-105 transition-transform duration-700">
        </div>
        @endif

        <!-- Article Content -->
        <div class="prose max-w-none text-slate-700 text-base sm:text-lg leading-relaxed space-y-6 reveal">
            {!! nl2br(e($blog->content)) !!}
        </div>

        <!-- Tags -->
        @if($blog->tags->isNotEmpty())
        <div class="pt-6 border-t border-slate-200/80 flex items-center gap-2 flex-wrap reveal">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 mr-2">Tags:</span>
            @foreach($blog->tags as $tag)
            <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="px-3.5 py-1.5 rounded-full bg-slate-100 text-xs font-semibold text-slate-700 hover:bg-[#007BFF] hover:text-white border border-slate-200 transition-all">
                #{{ $tag->name }}
            </a>
            @endforeach
        </div>
        @endif

        <!-- Author Card -->
        <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-slate-200/80 flex flex-col sm:flex-row items-center sm:items-start gap-6 shadow-md spotlight-card reveal">
            <img src="{{ $blog->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=200' }}" class="w-20 h-20 rounded-2xl object-cover border border-slate-300 shrink-0">
            <div class="space-y-2 text-center sm:text-left">
                <h3 class="text-lg font-bold text-[#111827]">{{ $blog->author_name }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Senior Engineering Lead at ZaroSoft, specializing in high-concurrency Laravel architectures, bespoke enterprise ERP platforms, and AI automation.
                </p>
                <a href="{{ route('contact.index') }}" class="inline-block text-xs font-bold text-[#007BFF] hover:underline pt-1">
                    Connect with our engineering team →
                </a>
            </div>
        </div>

        <!-- Related Blogs -->
        @if($relatedBlogs->isNotEmpty())
        <div class="pt-12 border-t border-slate-200/80 space-y-6">
            <h3 class="text-2xl font-extrabold text-[#111827] font-heading reveal">Related Insights</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedBlogs as $index => $rel)
                <div class="p-6 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 space-y-3 flex flex-col justify-between hover:border-[#007BFF]/50 transition-all spotlight-card reveal shadow-sm" data-delay="{{ ($index % 3) * 100 }}">
                    <div>
                        <span class="text-[10px] font-bold uppercase text-[#007BFF]">{{ $rel->category->name }}</span>
                        <h4 class="text-sm font-bold text-[#111827] hover:text-[#007BFF] transition-colors mt-1 font-heading">
                            <a href="{{ route('blog.show', $rel->slug) }}">{{ $rel->title }}</a>
                        </h4>
                    </div>
                    <a href="{{ route('blog.show', $rel->slug) }}" class="text-xs font-bold text-[#007BFF] hover:text-[#00D2FF]">
                        Read →
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</article>
@endsection
