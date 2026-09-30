<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Case Studies &amp; Results | {{ setting('site_name', 'ZaroSoft') }}</title>
<meta name="description" content="Real-world examples of how structured automation improves efficiency, reduces operational friction, and scales with growing teams.">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Case Studies &amp; Results | {{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:image" content="{{ $featured?->hero_url ?? asset('images/zarosoft-og.jpg') }}">
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
  --page:#f6faff;
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
  margin:18px auto 0;max-width:660px;font-size:19px;font-weight:400;
  color:var(--ink-soft);line-height:1.55;
}

/* ---------- Featured case ---------- */
.featured{
  position:relative;display:block;border-radius:var(--radius-xl);overflow:hidden;
  min-height:650px;margin-bottom:96px;
  background:linear-gradient(112deg,#3d6fb8 0%,#5d8fd6 34%,#86b0e6 58%,#b5d0f2 80%,#d8e7fa 100%);
}
/* photo sits on the left and melts into the field */
.featured-photo{
  position:absolute;inset:0;z-index:1;
  background-position:left center;background-size:auto 100%;background-repeat:no-repeat;
  -webkit-mask-image:linear-gradient(to right,#000 24%,rgba(0,0,0,0) 43%);
  mask-image:linear-gradient(to right,#000 24%,rgba(0,0,0,0) 43%);
}
.featured-grid{position:relative;z-index:2;height:650px}
.featured-card{
  position:absolute;left:41.3%;top:48px;width:34.2%;
  background:rgba(6,28,78,.82);backdrop-filter:blur(14px);
  -webkit-backdrop-filter:blur(14px);
  border-radius:var(--radius-lg);padding:36px 38px;color:#fff;
}
.tag{
  display:inline-block;background:var(--blue);color:#fff;font-size:13.5px;font-weight:500;
  padding:8px 18px;border-radius:999px;margin-bottom:20px;
}
.featured-card h2{font-size:30px;font-weight:400;line-height:1.28;letter-spacing:-.015em}
.featured-card p{
  /* kept clear of the stats card that overlaps this card's right edge */
  margin-top:16px;max-width:92%;
  font-size:15px;font-weight:400;line-height:1.62;color:rgba(255,255,255,.76);
}
.stats{
  position:absolute;right:3%;bottom:27px;width:25.6%;
  background:linear-gradient(160deg,#055be8 0%,#1a8cec 55%,#2fb8e9 100%);
  border-radius:var(--radius-lg);padding:34px 32px;color:#fff;
  box-shadow:0 22px 50px rgba(5,50,140,.28);
}
.stat + .stat{margin-top:30px}
.stat b{display:block;font-size:38px;font-weight:500;line-height:1.05;letter-spacing:-.02em}
.stat span{display:block;margin-top:6px;font-size:15px;font-weight:400;color:rgba(255,255,255,.82)}
.brand-pill{
  position:absolute;z-index:3;left:53.8%;bottom:33px;max-width:40%;
  display:flex;align-items:center;gap:10px;
  background:linear-gradient(120deg,rgba(5,70,190,.85),rgba(30,150,220,.8));
  backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
  border-radius:20px;padding:18px 34px;color:#fff;font-size:24px;font-weight:600;
  letter-spacing:-.01em;
}

/* ---------- Explore ---------- */
.explore-head h2{font-size:38px;font-weight:400;letter-spacing:-.02em}
.filters{display:flex;flex-wrap:wrap;gap:10px;margin-top:22px}
.filters button{
  font-family:inherit;font-size:14.5px;color:#3a4560;cursor:pointer;
  background:var(--white);border:1px solid var(--line);border-radius:999px;
  padding:10px 22px;transition:all .18s ease;
}
.filters button:hover{border-color:#c3d6ee}
.filters button.active{background:var(--blue);border-color:var(--blue);color:#fff;font-weight:500}

.cards{
  display:grid;grid-template-columns:repeat(2,1fr);gap:28px;
  margin-top:34px;padding-bottom:96px;
}
.card{
  background:var(--white);border-radius:var(--radius-xl);padding:14px 14px 34px;
  display:flex;flex-direction:column;
  box-shadow:0 2px 14px rgba(6,28,70,.05);
}
.card-media{position:relative;border-radius:22px;overflow:hidden;aspect-ratio:536/329;background:#e4eefc}
.card-media img{width:100%;height:100%;object-fit:cover}
.card-brand{
  position:absolute;top:22px;right:22px;max-width:calc(100% - 44px);
  display:flex;align-items:center;gap:10px;
  background:linear-gradient(120deg,rgba(5,70,190,.82),rgba(30,150,220,.78));
  backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
  border-radius:16px;padding:12px 24px;color:#fff;font-size:20px;font-weight:600;
  letter-spacing:-.01em;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
}
.card-body{padding:26px 24px 0;display:flex;flex-direction:column;flex:1}
.card-body h3{font-size:25px;font-weight:400;line-height:1.3;letter-spacing:-.015em}
.card-body > p{margin-top:12px;font-size:15.5px;font-weight:400;color:var(--muted);line-height:1.6}
.card-body > p.results-label{margin-top:28px;font-size:19px;font-weight:400;color:var(--ink)}
.results{list-style:none;margin-top:16px;display:flex;flex-direction:column;gap:14px}
.results li{display:flex;align-items:flex-start;gap:12px;font-size:15.5px;font-weight:400;color:#3a4560}
.results svg{flex:0 0 19px;margin-top:2px}
.btn-details{
  margin-top:30px;align-self:flex-start;display:flex;align-items:center;gap:16px;
  border:1px solid #d3e1f3;border-radius:999px;padding:7px 7px 7px 26px;
  font-size:16px;color:var(--ink);transition:border-color .2s ease,background .2s ease;
}
.btn-details:hover{border-color:var(--blue);background:#f3f8ff}
.btn-details .arrow{
  width:36px;height:36px;border-radius:50%;background:var(--blue);
  display:grid;place-items:center;transition:transform .2s ease;
}
.btn-details:hover .arrow{transform:translateX(3px)}

/* ---------- CTA ---------- */
.cta{
  border-radius:var(--radius-xl);padding:88px 40px;text-align:center;color:#fff;
  background:
    radial-gradient(120% 130% at 92% 8%, #2fd5e9 0%, rgba(47,213,233,0) 46%),
    radial-gradient(110% 120% at 60% 100%, #055be8 0%, rgba(5,91,232,0) 58%),
    radial-gradient(90% 110% at 4% 4%, #061233 0%, rgba(6,18,51,0) 60%),
    linear-gradient(115deg,#040c26 0%,#08184a 34%,#0a3a9a 62%,#1596c9 100%);
  margin-bottom:96px;
}
.cta h2{font-size:40px;font-weight:400;letter-spacing:-.02em;line-height:1.2}
.cta p{
  margin:16px auto 0;max-width:640px;font-size:17px;font-weight:400;
  color:rgba(255,255,255,.8);line-height:1.6;
}
.cta-actions{display:flex;flex-wrap:wrap;justify-content:center;gap:16px;margin-top:34px}
.btn-primary{
  background:var(--blue);color:#fff;border-radius:999px;padding:17px 36px;
  font-size:16px;font-weight:500;transition:background .2s ease;
}
.btn-primary:hover{background:var(--blue-dark)}
.btn-ghost{
  display:flex;align-items:center;gap:16px;color:#fff;font-size:16px;
  border:1px solid rgba(255,255,255,.4);border-radius:999px;padding:7px 7px 7px 28px;
  transition:border-color .2s ease;
}
.btn-ghost:hover{border-color:#fff}
.btn-ghost .arrow{
  width:36px;height:36px;border-radius:50%;background:var(--blue);
  display:grid;place-items:center;transition:transform .2s ease;
}
.btn-ghost:hover .arrow{transform:translateX(3px)}

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
.reveal.in{
  animation:revealUp .75s cubic-bezier(.22,.61,.36,1) var(--d,0ms) both;
}
/* media panels fade without moving */
.reveal-fade.in{
  animation:revealFade .85s cubic-bezier(.22,.61,.36,1) var(--d,0ms) both;
}
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
  .featured{min-height:0}
  .featured-photo{
    -webkit-mask-image:linear-gradient(to bottom,#000 30%,rgba(0,0,0,0) 72%);
    mask-image:linear-gradient(to bottom,#000 30%,rgba(0,0,0,0) 72%);
    background-size:cover;background-position:left top;
  }
  .featured-grid{
    height:auto;display:flex;flex-direction:column;gap:22px;
    padding:220px 30px 30px;
  }
  .featured-card,.stats{position:static;width:auto;left:auto;right:auto;top:auto;bottom:auto}
  .brand-pill{position:static;display:inline-flex;align-self:flex-start;max-width:none;margin:0 30px 30px}
  .cards{grid-template-columns:1fr}
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
  .featured-card{padding:26px 22px}
  .featured-card h2{font-size:23px}
  .stats{padding:26px 22px}
  .brand-pill{font-size:18px;padding:14px 22px}
  .explore-head h2{font-size:28px}
  .card-body h3{font-size:21px}
  .card-brand{font-size:16px;padding:10px 18px}
  .cta{padding:56px 22px}
  .cta h2{font-size:27px}
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
  $check = '<svg width="19" height="19" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="10" fill="#055be8"/><path d="m6 10.2 2.7 2.7L14.2 7.4" stroke="#fff" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  $arrow = '<span class="arrow"><svg width="17" height="17" viewBox="0 0 20 20" fill="none"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></span>';
@endphp

<!-- ================= NAV ================= -->
@include('partials.site-navbar-light')

<!-- ================= HERO ================= -->
<section class="hero">
  <div class="shell">
    <h1>Case Studies</h1>
    <p>Real-world examples of how structured automation improves efficiency, reduces operational friction, and scales with growing teams.</p>
  </div>
</section>

@if($featured)
<!-- ============ FEATURED CASE ============ -->
<section class="shell">
  <a href="{{ route('portfolio.show', $featured->slug) }}" class="featured">
    <div class="featured-photo" style="background-image:url('{{ $featured->hero_url }}')"></div>
    <div class="featured-grid">
      <article class="featured-card">
        @if($featured->category)
        <span class="tag">{{ $featured->category->name }}</span>
        @endif
        <h2>{{ $featured->title }}</h2>
        <p>{{ Str::limit($featured->tagline ?: $featured->overview, 160) }}</p>
      </article>
      @if($featured->highlight_stats->isNotEmpty())
      <aside class="stats">
        @foreach($featured->highlight_stats as $stat)
        <div class="stat"><b>{{ $stat['value'] }}</b><span>{{ $stat['label'] }}</span></div>
        @endforeach
      </aside>
      @endif
    </div>
    @if($featured->client_name)
    <div class="brand-pill">{{ $featured->client_name }}</div>
    @endif
  </a>
</section>
@endif

@if($projects->isNotEmpty())
<!-- ============ EXPLORE OUR WORK ============ -->
<section class="shell">
  <div class="explore-head">
    <h2>Explore Our Work</h2>
    @if($categories->count() > 1)
    <div class="filters">
      <button class="active" data-filter="all">All</button>
      @foreach($categories as $category)
      <button data-filter="{{ $category->slug }}">{{ $category->name }}</button>
      @endforeach
    </div>
    @endif
  </div>

  <div class="cards">
    @foreach($projects as $project)
    <article class="card" data-cat="{{ $project->category?->slug }}">
      <div class="card-media">
        @if($project->thumbnail_url)
        <img src="{{ $project->thumbnail_url }}" alt="{{ $project->title }}" loading="lazy">
        @endif
        @if($project->client_name)
        <div class="card-brand">{{ $project->client_name }}</div>
        @endif
      </div>
      <div class="card-body">
        <h3>{{ $project->title }}</h3>
        <p>{{ Str::limit($project->tagline ?: $project->overview, 140) }}</p>
        @if(!empty($project->results))
        <p class="results-label">Results</p>
        <ul class="results">
          @foreach(array_slice($project->results, 0, 3) as $result)
          <li>{!! $check !!}{{ $result }}</li>
          @endforeach
        </ul>
        @endif
        <a href="{{ route('portfolio.show', $project->slug) }}" class="btn-details">View Details
          {!! $arrow !!}
        </a>
      </div>
    </article>
    @endforeach
  </div>
</section>
@endif

<!-- ================= CTA ================= -->
<section class="shell">
  <div class="cta">
    <h2>Ready to Simplify Your Operations?</h2>
    <p>Whether you need a focused automation project or long-term support, we design structured systems built for measurable impact.</p>
    <div class="cta-actions">
      <a href="{{ route('contact.index') }}" class="btn-primary">Schedule a Consultation</a>
      <a href="{{ route('services.index') }}" class="btn-ghost">Explore Our Services
        {!! $arrow !!}
      </a>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
@include('partials.site-footer-light')

<script>
/* ============ Scroll reveal (staggered fade-up) ============ */
(function () {
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Each entry: [container selector, child selectors revealed in order, step in ms]
  var groups = [
    ['.hero',           ['h1', 'p'], 140],
    ['.featured',       ['.featured-card .tag', '.featured-card h2', '.featured-card p', '.stats .stat', '.brand-pill'], 130],
    ['.explore-head',   ['h2', '.filters button'], 90],
    ['.card',           ['.card-media', '.card-body h3', '.card-body > p:not(.results-label)', '.results-label', '.results li', '.btn-details'], 120],
    ['.cta',            ['h2', 'p', '.cta-actions > *'], 140],
    ['.footer-grid',    [':scope > div'], 110]
  ];

  var mediaSelectors = ['.card-media', '.brand-pill'];

  groups.forEach(function (g) {
    var container = g[0], children = g[1], step = g[2];
    document.querySelectorAll(container).forEach(function (box) {
      var i = 0;
      children.forEach(function (sel) {
        box.querySelectorAll(sel).forEach(function (el) {
          el.classList.add(mediaSelectors.indexOf(sel) > -1 ? 'reveal-fade' : 'reveal');
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

/* Re-run reveal for cards brought back by a filter change */
function revealNow(scope) {
  scope.querySelectorAll('.reveal, .reveal-fade').forEach(function (el) { el.classList.add('in'); });
}

// Filter pills
document.querySelectorAll('.filters button').forEach(function (btn) {
  btn.addEventListener('click', function () {
    document.querySelectorAll('.filters button').forEach(function (b) { b.classList.remove('active'); });
    btn.classList.add('active');
    var f = btn.dataset.filter;
    document.querySelectorAll('.card').forEach(function (card) {
      var show = (f === 'all' || card.dataset.cat === f);
      card.style.display = show ? '' : 'none';
      if (show) revealNow(card);
    });
  });
});
</script>

</body>
</html>
