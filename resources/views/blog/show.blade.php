@extends('layouts.app')

@section('title', $blog->title . ' — ZaroSoft Blog')
@section('meta_description', $blog->excerpt)
@section('og_type', 'article')
@if($blog->cover_image_url)
@section('og_image', $blog->cover_image_url)
@endif

@php
    $structuredData = [
        array_filter([
            '@type' => 'BlogPosting',
            '@id' => url()->current() . '#article',
            'headline' => $blog->title,
            'description' => $blog->excerpt,
            'image' => $blog->cover_image_url,
            'datePublished' => $blog->published_at?->toAtomString(),
            'dateModified' => $blog->updated_at?->toAtomString(),
            'author' => ['@type' => 'Person', 'name' => $blog->author_name],
            'publisher' => ['@id' => url('/') . '#organization'],
            'mainEntityOfPage' => url()->current(),
            'articleSection' => $blog->category?->name,
        ], fn ($value) => !empty($value)),
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Insights', 'item' => route('blog.index')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $blog->title, 'item' => url()->current()],
            ],
        ],
    ];
@endphp

@section('content')
<!-- Header Hero -->
<section class="py-20 relative overflow-hidden bg-[#F8FAFC] border-b border-slate-200/80">
    <div class="absolute inset-0 bg-tech-grid opacity-60"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#007BFF]/10 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10 w-full reveal">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 font-medium">
            <a href="{{ route('home') }}" class="hover:text-[#007BFF]">Home</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-[#007BFF]">Blog</a>
            <span>/</span>
            <span class="text-[#0F172A] truncate">{{ $blog->title }}</span>
        </nav>

        <div class="flex items-center gap-3">
            <span class="px-3 py-0.5 rounded-full bg-[#007BFF]/10 border border-[#007BFF]/25 text-xs font-bold uppercase tracking-wider text-[#007BFF] backdrop-blur-md font-mono">
                {{ $blog->category->name }}
            </span>
            <span class="text-xs text-slate-500 font-mono flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $blog->read_time }}
            </span>
            <span class="text-xs text-slate-500 font-mono flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                {{ $blog->views_count }} views
            </span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-[#0F172A] leading-tight font-heading">
            {{ $blog->title }}
        </h1>

        <!-- Author Info -->
        <div class="flex items-center gap-4 pt-2">
            @if($blog->author_avatar_url)
            <img src="{{ $blog->author_avatar_url }}" class="w-11 h-11 rounded-full object-cover border border-slate-300" alt="{{ $blog->author_name }}">
            @else
            <span class="w-11 h-11 rounded-full border border-slate-300 bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">{{ $blog->author_initials }}</span>
            @endif
            <div>
                <p class="text-sm font-bold text-[#0F172A]">{{ $blog->author_name }}</p>
                <p class="text-xs text-slate-500 font-mono">{{ $blog->published_at ? $blog->published_at->format('F d, Y') : 'Published recently' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Article Body -->
<article class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Cover Image -->
        @if($blog->cover_image_url)
        <div class="rounded-2xl overflow-hidden shadow-xl border border-slate-200/80 bg-slate-900 spotlight-card reveal">
            <x-picture :src="$blog->cover_image" :alt="$blog->title" :lazy="false" width="1200" height="675" class="w-full max-h-[500px] object-cover group-hover:scale-105 transition-transform duration-700" />
        </div>
        @endif

        <!-- Article Content -->
        <div class="prose max-w-none text-slate-700 text-base sm:text-lg leading-relaxed space-y-6 reveal">
            {!! nl2br(e($blog->content)) !!}
        </div>

        <!-- Tags -->
        @if($blog->tags->isNotEmpty())
        <div class="pt-6 border-t border-slate-200/80 flex items-center gap-2 flex-wrap reveal">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 mr-2 font-mono">Tags:</span>
            @foreach($blog->tags as $tag)
            <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="px-3 py-1 rounded-lg bg-slate-100 text-xs font-semibold text-slate-700 hover:bg-[#007BFF] hover:text-white border border-slate-200 transition-all font-mono">
                #{{ $tag->name }}
            </a>
            @endforeach
        </div>
        @endif

        <!-- Author Card -->
        <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 flex flex-col sm:flex-row items-center sm:items-start gap-6 shadow-sm spotlight-card reveal">
            @if($blog->author_avatar_url)
            <img src="{{ $blog->author_avatar_url }}" loading="lazy" class="w-20 h-20 rounded-xl object-cover border border-slate-300 shrink-0" alt="{{ $blog->author_name }}">
            @else
            <span class="w-20 h-20 rounded-xl border border-slate-300 bg-slate-200 shrink-0 flex items-center justify-center text-lg font-bold text-slate-600">{{ $blog->author_initials }}</span>
            @endif
            <div class="space-y-2 text-center sm:text-left">
                <h3 class="text-lg font-bold text-[#0F172A] font-heading">{{ $blog->author_name }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Engineering Lead at ZaroSoft, specializing in high-concurrency Laravel architectures, bespoke enterprise ERP platforms, and AI automation.
                </p>
                <a href="{{ route('contact.index') }}" class="inline-block text-xs font-bold text-[#007BFF] hover:underline pt-1">
                    Connect with our engineering team →
                </a>
            </div>
        </div>

        <!-- Related Blogs -->
        @if($relatedBlogs->isNotEmpty())
        <div class="pt-12 border-t border-slate-200/80 space-y-6">
            <h3 class="text-2xl font-bold text-[#0F172A] font-heading reveal">Related Insights</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedBlogs as $index => $rel)
                <div class="p-6 rounded-xl bg-[#F8FAFC] border border-slate-200/80 space-y-3 flex flex-col justify-between hover:border-[#007BFF]/50 transition-all spotlight-card reveal shadow-sm" data-delay="{{ ($index % 3) * 100 }}">
                    <div>
                        <span class="text-[10px] font-bold uppercase text-[#007BFF] font-mono">{{ $rel->category->name }}</span>
                        <h4 class="text-sm font-bold text-[#0F172A] hover:text-[#007BFF] transition-colors mt-1 font-heading">
                            <a href="{{ route('blog.show', $rel->slug) }}">{{ $rel->title }}</a>
                        </h4>
                    </div>
                    <a href="{{ route('blog.show', $rel->slug) }}" class="text-xs font-bold text-[#007BFF] hover:text-[#0052b3]">
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

