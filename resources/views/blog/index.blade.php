<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Insights &amp; Blog | {{ setting('site_name', 'ZaroSoft') }}</title>
<meta name="description" content="Stay ahead with practical insights, case studies, and expert perspectives on business automation, integration design, and operational strategy.">
<link rel="canonical" href="{{ url()->current() }}">
@if($filtered)
<meta name="robots" content="noindex, follow">
@endif
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Insights &amp; Blog | {{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:image" content="{{ $featuredPost?->cover_image_url ?? asset('images/zarosoft-og.jpg') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<x-structured-data :graph="$structuredData ?? []" />
<style>
:root{
  --ink:#061233;
  --ink-soft:#566178;
  --muted:#67728a;
  --blue:#055be8;
  --blue-dark:#0449c2;
  --navy:#061233;
  --deep:#061233;
  --page:#f6faff;
  --card:#e8f1fd;
  --white:#fff;
  --line:#e1ebf8;
  --radius-lg:26px;
  --radius-xl:34px;
  --shell:1180px;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{
  font-family:'Manrope',system-ui,-apple-system,'Segoe UI',sans-serif;
  background:var(--page);
  color:var(--ink);
  -webkit-font-smoothing:antialiased;
  line-height:1.5;
}
img{display:block;max-width:100%}
a{color:inherit;text-decoration:none}
.shell{width:100%;max-width:var(--shell);margin:0 auto;padding:0 24px}

/* ---------- Navbar (same pill navbar as the Services page) ---------- */
.navbar{
  position:relative;z-index:9;
  padding:46px 60px 0;
  font-family:'Manrope',sans-serif;
}
.navbar-row{
  display:flex;align-items:center;justify-content:space-between;
  width:100%;max-width:1400px;margin-inline:auto;
}
.logo{display:flex;align-items:center}
.logo img{width:auto;height:55px}
.footer .logo img{height:70px}
.nav-links{
  display:inline-flex;align-items:center;gap:16px;
  padding:8px;
  border-radius:30px;
  background-color:#e8f1fd;
}
.nav-link{
  padding:12px 20px;
  border-radius:30px;
  color:#061233;
  font-size:16px;font-weight:500;line-height:120%;
  white-space:nowrap;
  transition:background-color .2s ease-in-out;
}
.nav-link:hover{background-color:rgba(255,255,255,.55)}
.nav-link.is-current{background-color:#fff}
.nav-contact-button{
  display:inline-flex;align-items:center;justify-content:center;
  padding:12px 21px;
  border-radius:50px;
  background-color:#061233;
  color:#fff;
  font-size:16px;font-weight:500;line-height:1.2;
  white-space:nowrap;
  transition:background-color .2s ease-in-out;
}
.nav-contact-button:hover{background-color:#0b2257}
.menu-button{display:none;padding:12px;background:none;border:0;cursor:pointer}
.menu-button img{width:24px;height:24px}
.nav-mobile{
  position:absolute;top:120px;left:60px;right:60px;
  flex-direction:column;align-items:stretch;gap:4px;
  padding:24px;
  border-radius:24px;
  background:#fff;
  box-shadow:0 30px 70px -30px rgba(6,18,51,.35);
  display:none;
}
.nav-mobile.is-open{display:flex}
.nav-mobile a{padding:10px 12px;border-radius:12px;font-size:16px;color:#061233}
.nav-mobile a:hover{background:#e8f1fd}

/* ---------- Hero ---------- */
.hero{padding:58px 0 40px;text-align:center}
.hero h1{font-size:60px;font-weight:500;letter-spacing:-.025em;line-height:1.1;color:var(--ink)}
.hero p{
  margin:18px auto 0;max-width:720px;font-size:19px;font-weight:400;
  color:var(--ink-soft);line-height:1.55;
}
.hero .filter-note{margin-top:14px;font-size:16px}
.hero .filter-note a{color:var(--blue);text-decoration:underline}

/* ---------- Featured post ---------- */
.featured-post{
  position:relative;display:block;height:673px;border-radius:var(--radius-lg);overflow:hidden;
  margin-bottom:96px;background:var(--deep);
}
.featured-photo{
  position:absolute;inset:0;
  background-position:center top;background-size:cover;background-repeat:no-repeat;
}
.featured-post::after{
  content:"";position:absolute;inset:0;
  background:linear-gradient(to bottom,
    rgba(6,18,51,0) 0%,
    rgba(6,18,51,.10) 40%,
    rgba(6,18,51,.62) 58%,
    var(--deep) 76%,
    var(--deep) 100%);
}
.featured-body{
  position:absolute;z-index:2;left:45px;right:45px;bottom:44px;color:#fff;
}
.post-date{font-size:15px;font-weight:400;color:rgba(255,255,255,.72)}
.featured-body h2{
  margin-top:10px;font-size:34px;font-weight:400;letter-spacing:-.015em;line-height:1.25;
}
.featured-body > p{
  margin-top:12px;max-width:880px;font-size:17.5px;font-weight:400;
  line-height:1.6;color:rgba(255,255,255,.78);
}
.btn-read{
  margin-top:26px;align-self:flex-start;display:inline-flex;align-items:center;gap:18px;
  border:1px solid #a9c8f5;border-radius:999px;padding:7px 7px 7px 26px;
  font-size:17px;color:#1f2f55;background:#f3f8ff;
  transition:border-color .2s ease,background .2s ease;
}
.btn-read .arrow{
  width:40px;height:40px;border-radius:50%;background:var(--blue);
  display:grid;place-items:center;transition:transform .2s ease;
}
.btn-read:hover .arrow{transform:translateX(3px)}
.featured-body .btn-read{
  color:#fff;background:transparent;border-color:rgba(255,255,255,.55);
}
.featured-post:hover .btn-read{border-color:#fff}

/* ---------- Post grid ---------- */
.posts{
  display:grid;grid-template-columns:repeat(2,1fr);gap:30px 24px;
  padding-bottom:96px;
}
.post-card{
  background:var(--card);border-radius:var(--radius-lg);padding:15px 15px 32px;
  display:flex;flex-direction:column;
  transition:background .2s ease;
}
.post-card:hover{background:#dde9fa}
.post-media{border-radius:20px;overflow:hidden;aspect-ratio:536/336;background:#d5e4f8}
.post-media img{width:100%;height:100%;object-fit:cover}
.post-body{padding:22px 8px 0;display:flex;flex-direction:column;flex:1}
.post-body .post-date{color:var(--muted)}
.post-body h3{
  margin-top:10px;font-size:27px;font-weight:400;letter-spacing:-.015em;line-height:1.3;
}
.post-body > p{
  margin-top:12px;font-size:16.5px;font-weight:400;color:var(--muted);line-height:1.6;
}
/* button always sits on the card's baseline, whatever the copy length */
.post-body .btn-read{margin-top:auto;padding:34px 0 0;border:0;background:none}
.post-body .btn-read > span.pill{
  display:inline-flex;align-items:center;gap:18px;
  border:1px solid #a9c8f5;border-radius:999px;padding:7px 7px 7px 26px;
  background:#f3f8ff;transition:border-color .2s ease,background .2s ease;
}
.post-card:hover .btn-read > span.pill{border-color:var(--blue);background:#fff}

.empty{padding:0 0 96px;text-align:center;font-size:17px;font-weight:400;color:var(--muted)}

/* ---------- Pagination ---------- */
.pager{display:flex;justify-content:center;gap:12px;margin:-48px 0 96px}
.pager a,.pager span{
  display:inline-flex;align-items:center;padding:12px 26px;border-radius:999px;
  border:1px solid #a9c8f5;background:#f3f8ff;font-size:15px;color:#1f2f55;
}
.pager a:hover{border-color:var(--blue);background:#fff}
.pager span{opacity:.45}

/* ---------- Footer ---------- */
.footer{background:#e8f1fd;padding:64px 0 28px}
/* four columns spread evenly edge to edge */
.footer-grid{display:grid;grid-template-columns:repeat(4,auto);justify-content:space-between;gap:40px}
.footer .logo{margin-bottom:22px}
.contact-list{list-style:none;display:flex;flex-direction:column;gap:14px}
.contact-list li{display:flex;align-items:center;gap:12px;font-size:15px;font-weight:400;color:#3a4560}
.contact-list svg{flex:0 0 18px;color:var(--blue)}
.socials{display:flex;gap:12px;margin-top:26px}
.socials a{
  width:34px;height:34px;border-radius:50%;background:#dbe9fb;
  display:grid;place-items:center;color:#1f2f55;transition:background .2s ease,color .2s ease;
}
.socials a:hover{background:var(--blue);color:#fff}
.footer-col h4{font-size:18px;font-weight:500;margin-bottom:20px}
.footer-col ul{list-style:none;display:flex;flex-direction:column;gap:14px}
.footer-col a{font-size:15px;font-weight:400;color:#3a4560;transition:color .18s ease}
.footer-col a:hover{color:var(--blue)}
.footer-bottom{
  margin-top:56px;display:flex;justify-content:space-between;
  align-items:center;gap:16px;flex-wrap:wrap;
  font-size:14px;font-weight:400;color:#8590a6;
}

/* ---------- Scroll reveal ---------- */
/* Animations (not transitions) so each element keeps its own hover transition */
.reveal,.reveal-fade{opacity:0}
.reveal.in{animation:revealUp .75s cubic-bezier(.22,.61,.36,1) var(--d,0ms) both}
.reveal-fade.in{animation:revealFade .85s cubic-bezier(.22,.61,.36,1) var(--d,0ms) both}
@keyframes revealUp{
  from{opacity:0;transform:translateY(20px)}
  to{opacity:1;transform:none}
}
@keyframes revealFade{
  from{opacity:0}
  to{opacity:1}
}
@media (prefers-reduced-motion:reduce){
  .reveal,.reveal-fade{opacity:1}
  .reveal.in,.reveal-fade.in{animation:none}
}

/* ---------- Responsive ---------- */
@media (max-width:1040px){
  .nav-links{display:none}
  .menu-button{display:block}
  .hero h1{font-size:46px}
  .featured-post{height:auto;min-height:520px;padding-top:240px}
  .featured-body{position:relative;left:auto;right:auto;bottom:auto;padding:0 30px 34px}
  .featured-body h2{font-size:27px}
  .posts{grid-template-columns:1fr}
  .footer-grid{grid-template-columns:1fr 1fr 1fr}
}
@media (max-width:640px){
  .shell{padding:0 16px}
  .navbar{padding:24px 20px 0}
  .nav-mobile{top:90px;left:20px;right:20px}
  .logo img{height:40px}
  .hero{padding:36px 0 28px}
  .hero h1{font-size:34px}
  .hero p{font-size:16px}
  .featured-post{min-height:440px;padding-top:180px}
  .featured-body{padding:0 22px 26px}
  .featured-body h2{font-size:23px}
  .featured-body > p{font-size:15.5px}
  .post-body h3{font-size:22px}
  .footer-grid{grid-template-columns:1fr 1fr}
}

/* Manrope: headings 700 site-wide. !important because several template
   selectors (e.g. ".hero h1") set lighter weights with higher specificity. */
h1,h2,h3,h4,h5,h6{font-weight:700!important}
</style>
</head>
<body>

@php
  $siteName = setting('site_name', 'ZaroSoft');
  $arrow = '<span class="arrow"><svg width="18" height="18" viewBox="0 0 20 20" fill="none"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></span>';
@endphp

<!-- ================= NAV ================= -->
@include('partials.site-navbar-light')

<!-- ================= HERO ================= -->
<section class="hero">
  <div class="shell">
    <h1>Insights &amp; Ideas</h1>
    <p>Stay ahead with practical insights, case studies, and expert perspectives on business automation, integration design, and operational strategy.</p>
    @if($filtered)
    <p class="filter-note">
      Showing posts
      @if(request('tag')) tagged “{{ request('tag') }}”
      @elseif(request('category')) in “{{ request('category') }}”
      @elseif(request('search')) matching “{{ request('search') }}”
      @endif
      · <a href="{{ route('blog.index') }}">View all</a>
    </p>
    @endif
  </div>
</section>

@if($featuredPost)
<!-- ============ FEATURED POST ============ -->
<section class="shell">
  <a href="{{ route('blog.show', $featuredPost->slug) }}" class="featured-post">
    <div class="featured-photo" @if($featuredPost->cover_image_url) style="background-image:url('{{ $featuredPost->cover_image_url }}')" @endif></div>
    <div class="featured-body">
      @if($featuredPost->published_at)
      <p class="post-date">{{ $featuredPost->published_at->format('F j, Y') }}</p>
      @endif
      <h2>{{ $featuredPost->title }}</h2>
      @if($featuredPost->excerpt)
      <p>{{ Str::limit($featuredPost->excerpt, 200) }}</p>
      @endif
      <span class="btn-read">Read Blog
        {!! $arrow !!}
      </span>
    </div>
  </a>
</section>
@endif

<!-- ============== POST GRID ============== -->
<section class="shell">
  @if($blogs->isNotEmpty())
  <div class="posts">
    @foreach($blogs as $blog)
    <article class="post-card">
      <a href="{{ route('blog.show', $blog->slug) }}" class="post-media">
        @if($blog->cover_image_url)
        <img src="{{ $blog->cover_image_url }}" alt="{{ $blog->title }}" loading="lazy">
        @endif
      </a>
      <div class="post-body">
        @if($blog->published_at)
        <p class="post-date">{{ $blog->published_at->format('F j, Y') }}</p>
        @endif
        <h3><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
        @if($blog->excerpt)
        <p>{{ Str::limit($blog->excerpt, 180) }}</p>
        @endif
        <a href="{{ route('blog.show', $blog->slug) }}" class="btn-read"><span class="pill">Read Blog
          {!! $arrow !!}
        </span></a>
      </div>
    </article>
    @endforeach
  </div>

  @if($blogs->hasPages())
  <nav class="pager" aria-label="Blog pages">
    @if($blogs->onFirstPage())<span>&larr; Newer</span>@else<a href="{{ $blogs->previousPageUrl() }}" rel="prev">&larr; Newer</a>@endif
    @if($blogs->hasMorePages())<a href="{{ $blogs->nextPageUrl() }}" rel="next">Older &rarr;</a>@else<span>Older &rarr;</span>@endif
  </nav>
  @endif
  @elseif(!$featuredPost)
  <p class="empty">No posts found.</p>
  @endif
</section>

<!-- ================= FOOTER ================= -->
@include('partials.site-footer-light')

<script>
/* ============ Scroll reveal (staggered fade-up) ============ */
(function () {
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Each entry: [container selector, child selectors revealed in order, step in ms]
  var groups = [
    ['.hero',          ['h1', 'p'], 140],
    ['.featured-post', ['.featured-photo', '.post-date', 'h2', '.featured-body > p', '.btn-read'], 130],
    ['.post-card',     ['.post-media', '.post-date', 'h3', '.post-body > p', '.btn-read'], 120],
    ['.footer-grid',   [':scope > div'], 110]
  ];

  // these fade in place instead of sliding up
  var fadeOnly = ['.featured-photo', '.post-media'];

  groups.forEach(function (g) {
    var container = g[0], children = g[1], step = g[2];
    document.querySelectorAll(container).forEach(function (box) {
      var i = 0;
      children.forEach(function (sel) {
        box.querySelectorAll(sel).forEach(function (el) {
          el.classList.add(fadeOnly.indexOf(sel) > -1 ? 'reveal-fade' : 'reveal');
          el.style.setProperty('--d', (i * step) + 'ms');
          i++;
        });
      });
    });
  });

  var targets = document.querySelectorAll('.reveal, .reveal-fade');

  if (reduce || !('IntersectionObserver' in window)) {
    targets.forEach(function (el) { el.classList.add('in'); });
    return;
  }

  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

  targets.forEach(function (el) { io.observe(el); });

  // Hero reveals straight away on load rather than waiting for a scroll tick
  requestAnimationFrame(function () {
    document.querySelectorAll('.hero .reveal').forEach(function (el) { el.classList.add('in'); });
  });
})();
</script>

</body>
</html>
