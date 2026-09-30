<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>About — {{ setting('site_name', 'ZaroSoft') }}</title>
<meta name="description" content="We help teams simplify complex workflows, reduce manual work, and build structured systems that scale — without adding unnecessary tools or noise.">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="About — {{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:description" content="We help teams simplify complex workflows, reduce manual work, and build structured systems that scale — without adding unnecessary tools or noise.">
<meta property="og:image" content="{{ asset('images/zarosoft-og.jpg') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{-- Manrope for the page; JetBrains Mono for the team section's code-style labels --}}
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
{{-- The team section is the site's Tailwind markup, so the page loads the app build too --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-structured-data :graph="$structuredData ?? []" />
<style>
/* ===========================================================
   DESIGN TOKENS
   =========================================================== */
:root{
  --page:#fff;
  --surface:#e8f1fd;
  --dark:#061233;
  --white:#fff;
  --text-body:#566178;
  --text-heading:#061233;
  --on-dark:#f3f7ff;
  --on-dark-muted:#bcc7da;
  --primary:#055be8;
  --primary-hover:#0449c2;
  --footer-heading:#2c3650;
  --footer-text:#46506a;
  --border-default:#e1ebf8;
  --border-strong:#d3e1f3;

  --h1:56px;
  --h2:40px;
  --h3:32px;
  --h4:24px;
  --h5:20px;
  --body:20px;
  --big-body:24px;
  --small-body:16px;
  --button-text:20px;

  --space-xs:8px;
  --space-12:12px;
  --space-sm:16px;
  --space-20:20px;
  --space-md:24px;
  --space-lg:32px;
  --space-40:40px;
  --space-xl:48px;
  --space-2xl:64px;
  --space-3xl:80px;
  --section-padding:96px;
  --section-padding-h:60px;
  --hero-padding-top:196px;
  --max-width:1400px;

  --r-2xl:24px;
  --r-3xl:32px;
  --r-4xl:40px;
  --r-50:50px;
  --r-full:999px;
}

/* ===========================================================
   BASE
   Element rules live in the base layer so the Tailwind utilities
   in the team section still win over them.
   =========================================================== */
@layer base{
  *,*::before,*::after{box-sizing:border-box}
  html{-webkit-text-size-adjust:100%;scroll-behavior:smooth}
  body{
    margin:0;
    background-color:var(--page);
    color:var(--text-body);
    font-family:'Manrope',sans-serif;
    font-size:var(--body);
    font-weight:400;
    line-height:1.2em;
    -webkit-font-smoothing:antialiased;
    overflow-x:hidden;
  }
  img{display:block;max-width:100%;border:0}
  a{color:inherit;text-decoration:none}

  h1,h2,h3,h4{margin:0 0 var(--space-xs);color:var(--text-heading);font-weight:400}
  h1{font-size:var(--h1);letter-spacing:-1.92px;line-height:1.1em}
  h2{font-size:var(--h2);letter-spacing:-1.4px;line-height:1.1em}
  h3{font-size:var(--h3);letter-spacing:-.96px;line-height:1.2em;margin-bottom:4px}
  p{margin:0 0 10px;font-size:var(--big-body);line-height:1.2em}

  /* inside the team section, fall back to Tailwind's own reset */
  .team-block :where(h1,h2,h3,h4,p){margin:0;font-size:inherit;font-weight:inherit;line-height:inherit;letter-spacing:normal;color:inherit}
}
/* app.css styles body outside any layer, so these three must be unlayered to win */
body{background-color:var(--page);color:var(--text-body);font-family:'Manrope',sans-serif}
.no-margin{margin-top:0;margin-bottom:0}

/* the team section keeps the site's own type, as on the old About page */
.team-block{
  font-family:'Manrope',ui-sans-serif,system-ui,sans-serif;
  font-size:16px;font-weight:400;line-height:1.5;color:#111827;
}

.section{padding:var(--section-padding) var(--section-padding-h);overflow:hidden}
.container{width:100%;max-width:var(--max-width);margin-left:auto;margin-right:auto}

.section-label{
  display:inline-flex;
  margin-bottom:var(--space-12);
  padding:6px 12px;
  border:1.5px solid var(--text-body);
  border-radius:var(--r-50);
  color:var(--text-body);
  font-size:var(--small-body);font-weight:400;line-height:120%;
}
.cs-tag{
  display:inline-flex;
  margin-bottom:0;
  padding:var(--space-xs) var(--space-sm);
  border-radius:100px;
  background-color:var(--primary);
  color:var(--on-dark);
  font-size:var(--small-body);font-weight:500;line-height:120%;
}
.text-small{font-size:var(--body);margin-bottom:0}

/* ===========================================================
   BUTTONS
   =========================================================== */
.button-primary{
  display:inline-flex;align-items:center;justify-content:center;
  padding:var(--space-20) var(--space-md);
  border-radius:var(--r-50);
  background-color:var(--primary);
  color:var(--on-dark);
  font-size:var(--button-text);font-weight:500;
  transition:background-color .2s ease-in-out,transform .2s ease-in-out;
}
.button-primary:hover{background-color:var(--primary-hover);transform:scale(1.02)}

/* ===========================================================
   NAVBAR — light variant, sits over the hero
   =========================================================== */
.navbar{
  position:absolute;inset:0 0 auto;z-index:9;
  width:100%;margin-top:46px;
  padding:0 var(--section-padding-h);
}
.navbar-row{
  display:flex;align-items:center;justify-content:space-between;
  width:100%;max-width:var(--max-width);margin-inline:auto;
}
.logo{display:flex;align-items:center}
.logo img{width:auto;height:55px}
.footer-logo{width:auto;height:55px}
.footer-left .footer-logo{width:auto;height:70px}
.nav-links{
  display:inline-flex;align-items:center;gap:var(--space-sm);
  padding:var(--space-xs);
  border-radius:30px;
  background-color:var(--surface);
}
.nav-link{
  padding:var(--space-12) var(--space-20);
  border-radius:30px;
  color:var(--text-heading);
  font-size:var(--small-body);font-weight:500;line-height:120%;
  white-space:nowrap;
  transition:background-color .2s ease-in-out;
}
.nav-link:hover{background-color:rgba(255,255,255,.55)}
.nav-link.is-current{background-color:#fff}
.nav-contact-button{
  display:inline-flex;align-items:center;justify-content:center;
  padding:var(--space-12) 21px;
  border-radius:var(--r-50);
  background-color:var(--text-heading);
  color:var(--white);
  font-size:var(--small-body);font-weight:500;line-height:1.2;
  white-space:nowrap;
  transition:background-color .2s ease-in-out;
}
.nav-contact-button:hover{background-color:#0b2257}
.menu-button{display:none;padding:12px;background:none;border:0;cursor:pointer}
.menu-button img{width:24px;height:24px}
.nav-mobile{
  position:absolute;top:80px;left:var(--section-padding-h);right:var(--section-padding-h);
  flex-direction:column;gap:4px;
  padding:var(--space-md);
  border-radius:var(--r-2xl);
  background:#fff;
  box-shadow:0 30px 70px -30px rgba(6,18,51,.35);
  display:none;
}
.nav-mobile.is-open{display:flex}
.nav-mobile a{padding:10px 12px;border-radius:12px;font-size:var(--small-body);color:var(--text-heading)}
.nav-mobile a:hover{background:var(--surface)}

/* ===========================================================
   1. HERO
   =========================================================== */
.section-hero{padding-top:var(--hero-padding-top)}
.about-hero-head{
  margin:0 auto var(--space-2xl);
  text-align:center;
}
.about-hero-grid{
  display:grid;
  grid-template-columns:1fr 1fr 1fr;
  grid-template-rows:auto;
  place-items:center stretch;
  gap:var(--space-20);
}
.about-quote-card{
  display:flex;flex-direction:column;justify-content:space-between;
  min-height:500px;
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  background-color:var(--dark);
  text-align:left;
}
.about-quote-text{
  margin-bottom:0;
  color:var(--white);
  font-size:var(--h3);font-weight:400;line-height:120%;letter-spacing:-.96px;
}
.about-quote-author{display:flex;align-items:center;gap:var(--space-md)}
.about-quote-avatar{flex-shrink:0;width:64px;height:64px;border-radius:50%;object-fit:cover}
.about-author-name{margin-bottom:0;color:var(--on-dark);font-size:var(--big-body);font-weight:400;line-height:120%}
.about-author-role{margin-bottom:0;font-size:var(--small-body)}
.about-hero-image{width:100%;height:530px;border-radius:var(--r-4xl);object-fit:cover}
.about-stat-card{
  display:flex;flex-direction:column;justify-content:space-between;
  min-height:500px;
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  background-color:var(--surface);
  text-align:left;
}
.about-stat-big-number{
  margin:0;
  color:var(--primary);
  font-size:120px;font-weight:400;line-height:110%;letter-spacing:-3.6px;
}
.about-stat-card-text{margin-bottom:0;color:var(--text-heading);font-size:var(--big-body);font-weight:400}

/* ===========================================================
   2. OUR PHILOSOPHY
   =========================================================== */
.about-philosophy-text{margin-bottom:var(--space-xs)}
.about-stats-flex{
  display:flex;
  gap:var(--space-20);
  margin-top:var(--space-40);
}
.about-stat-inline{
  display:flex;align-items:center;flex:1;
  gap:var(--space-md);
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  background-color:var(--surface);
}
.cs-cms-stat-number{
  margin:0;
  color:var(--text-heading);
  font-size:var(--h1);font-weight:400;line-height:110%;letter-spacing:-1.44px;
}

/* ===========================================================
   4. PRINCIPLES
   =========================================================== */
.about-principles-layout{
  display:flex;align-items:stretch;
  gap:var(--space-20);
  padding:var(--space-sm);
  border-radius:var(--r-4xl);
  background-color:var(--surface);
}
.about-principles-left{
  display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between;
  max-width:450px;
  padding:56px var(--space-40);
  border-radius:var(--r-3xl);
  background-image:radial-gradient(90% 120% at 92% 8%,rgba(47,213,233,.55) 0%,rgba(47,213,233,0) 55%),radial-gradient(80% 120% at 8% 100%,rgba(5,91,232,.65) 0%,rgba(5,91,232,0) 60%),linear-gradient(115deg,#040c26 0%,#08184a 45%,#0a3a9a 100%);
  background-position:50%;
  background-repeat:no-repeat;
  background-size:cover;
}
.about-principles-heading{margin-bottom:0;color:var(--on-dark)}
.about-principles-right{
  display:flex;flex-direction:column;flex:1;justify-content:center;
  gap:var(--space-40);
  padding:var(--space-40) var(--space-md);
}
.about-principle-item{display:flex;flex-direction:column;gap:4px}

/* ===========================================================
   5. TESTIMONIALS — two marquee rows
   =========================================================== */
.about-testimonials-header{margin-bottom:var(--space-40)}
.marquee-container{
  display:flex;flex-direction:column;align-items:flex-start;justify-content:center;
  gap:var(--space-20);
  width:calc(100% + 80px);
  margin:var(--space-2xl) -40px 0;
  overflow:hidden;
}
.marquee-track,.marquee-track-reverse{
  display:flex;flex-flow:row;align-items:stretch;justify-content:flex-start;
  width:max-content;
}
.marquee-track{animation:marqueeLeft 60s linear infinite}
.marquee-track-reverse{animation:marqueeRight 60s linear infinite}
.marquee-track:hover,.marquee-track-reverse:hover{animation-play-state:paused}
/* Each row holds its cards twice, so translating half the width loops seamlessly. */
@keyframes marqueeLeft{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@keyframes marqueeRight{from{transform:translateX(-50%)}to{transform:translateX(0)}}

.about-testimonial-card{
  display:flex;flex-direction:column;flex-shrink:0;
  align-items:flex-start;justify-content:space-between;
  gap:var(--space-3xl);
  margin-right:var(--space-20);
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  background-color:var(--surface);
}
.about-testimonial-card.card-w-410{max-width:450px}
.about-testimonial-card.card-w-460{max-width:460px}
.about-testimonial-card.card-w-510{max-width:510px}
.about-testimonial-card.card-w-540{max-width:540px}
.testimonial-quote{margin-bottom:0;color:var(--text-heading)}
.about-testimonial-author{display:flex;align-items:center;gap:var(--space-sm)}
.testimonial-avatar{flex-shrink:0;width:48px;height:48px;border-radius:var(--r-full);object-fit:cover}
.testimonial-name{margin-bottom:0;color:var(--text-heading)}
.testimonial-role{margin-bottom:0;color:var(--text-body);font-size:var(--body)}

/* ===========================================================
   6. CTA
   =========================================================== */
.cta-section{padding:var(--space-3xl) var(--section-padding-h);text-align:center}
.cta-content{
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  min-height:460px;
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-2xl);
  text-align:center;
  background-image:radial-gradient(90% 120% at 92% 8%,rgba(47,213,233,.55) 0%,rgba(47,213,233,0) 55%),radial-gradient(80% 120% at 8% 100%,rgba(5,91,232,.65) 0%,rgba(5,91,232,0) 60%),linear-gradient(115deg,#040c26 0%,#08184a 45%,#0a3a9a 100%);
  background-position:50%;
  background-repeat:no-repeat;
  background-size:cover;
}
.cta-heading{color:var(--on-dark);line-height:110%}
.cta-subtitle{max-width:870px;margin-bottom:var(--space-md);color:var(--on-dark-muted)}

/* ===========================================================
   7. FOOTER
   =========================================================== */
.footer-section{padding:var(--space-xl) var(--section-padding-h);background-color:var(--surface)}
.footer-top{display:flex;align-items:flex-start;justify-content:space-between;gap:var(--space-40);max-width:var(--max-width);margin:0 auto}
.footer-left{display:flex;flex-direction:column;gap:var(--space-sm);max-width:300px}
.footer-contact-list,.footer-link-list{display:flex;flex-direction:column;gap:var(--space-12)}
.footer-link-list{gap:6px}
.footer-contact-item{display:flex;align-items:center;gap:var(--space-xs)}
.footer-contact-text{margin:0;color:var(--footer-heading);font-size:var(--small-body);font-weight:400;line-height:120%}
.footer-social{display:flex;align-items:center;gap:var(--space-20);margin-top:var(--space-sm)}
.footer-social-link{width:24px;height:24px;transition:opacity .2s}
.footer-social-link:hover{opacity:.65}
/* link columns join the footer row directly, so logo + 3 columns spread evenly edge to edge */
.footer-links-grid{display:contents}
.footer-link-column{display:flex;flex-direction:column;gap:var(--space-sm)}
.footer-column-title{margin:0;color:var(--footer-heading);font-size:var(--h5);font-weight:400}
.footer-link{display:block;color:var(--footer-text);font-size:var(--small-body);transition:color .2s}
.footer-link:hover{color:var(--text-heading)}
.footer-bottom{
  display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:var(--space-sm);
  max-width:var(--max-width);margin:var(--space-xl) auto 0;
  padding-top:var(--space-lg);
  border-top:1px solid var(--border-strong);
}
.footer-powered{margin:0;color:var(--footer-text);font-size:14px;font-weight:400;line-height:120%}

/* ===========================================================
   ENTRANCE ANIMATIONS
   =========================================================== */
.anim-fade-up,.anim-fade-up-2,.anim-fade-up-3,.anim-img-fade-in{
  opacity:0;transform:translateY(40px);
  transition:opacity .9s cubic-bezier(.22,.61,.36,1),transform .9s cubic-bezier(.22,.61,.36,1);
}
.anim-fade-up-2{transition-delay:.12s}
.anim-fade-up-3{transition-delay:.24s}
.is-in{opacity:1;transform:none}

.anim-children-fade-in > *{
  opacity:0;transform:translateY(40px);
  transition:opacity .8s cubic-bezier(.22,.61,.36,1),transform .8s cubic-bezier(.22,.61,.36,1);
}
.anim-children-fade-in.is-in > *{opacity:1;transform:none}
.anim-children-fade-in.is-in > *:nth-child(2){transition-delay:.1s}
.anim-children-fade-in.is-in > *:nth-child(3){transition-delay:.2s}
.anim-children-fade-in.is-in > *:nth-child(4){transition-delay:.3s}

.anim-hero-fade-up-in,.anim-hero-fade-up-in-2,.anim-hero-fade-up-in-3{
  opacity:0;transform:translateY(40px);
  animation:heroUp 1s cubic-bezier(.22,.61,.36,1) forwards;
}
.anim-hero-fade-up-in-2{animation-delay:.15s}
.anim-hero-fade-up-in-3{animation-delay:.3s}
@keyframes heroUp{to{opacity:1;transform:translateY(0)}}

/* ===========================================================
   TABLET — 991px
   =========================================================== */
@media screen and (max-width:991px){
  :root{
    --h1:44px;--h2:34px;--h3:26px;--big-body:20px;--body:18px;--button-text:18px;
    --section-padding:72px;--section-padding-h:32px;--hero-padding-top:150px;
  }
  .nav-links,.nav-contact-button{display:none}
  .menu-button{display:block}

  .about-hero-grid{grid-template-columns:1fr 1fr}
  .about-hero-image{display:none}
  .about-quote-card,.about-stat-card{min-height:320px}
  .about-stat-big-number{font-size:84px;letter-spacing:-2.4px}

  .about-stats-flex{flex-flow:wrap}
  .about-stat-inline{
    flex-flow:column;align-items:flex-start;justify-content:flex-start;
    flex:1 1 240px;
  }

  .about-principles-layout{flex-flow:wrap}
  .about-principles-left{
    flex:0 auto;width:100%;max-width:none;
    gap:var(--space-2xl);
  }
  .about-principles-right{padding-inline:var(--space-sm)}

  .marquee-container{width:calc(100% + 64px);margin-inline:-32px}
  .footer-top{flex-flow:wrap;gap:var(--space-2xl)}
  .footer-links-grid{flex-wrap:wrap;gap:var(--space-2xl)}
}

/* ===========================================================
   MOBILE — 767 / 479
   =========================================================== */
@media screen and (max-width:767px){
  :root{--h1:38px;--h2:30px;--h3:24px;--section-padding:56px;--section-padding-h:20px;--hero-padding-top:130px}
  h1{letter-spacing:-1px;line-height:1.08em}
  .navbar{margin-top:24px;padding:0 20px}
  .nav-mobile{left:20px;right:20px}
  .logo img{height:40px}
  .footer-logo{height:26px}
  .about-hero-grid{grid-template-columns:1fr}
  .cta-content{min-height:380px}
  .about-testimonial-card{max-width:320px!important}
}
@media screen and (max-width:479px){
  :root{--h1:32px;--h2:26px;--h3:22px;--body:16px;--big-body:18px;--button-text:16px}
  .button-primary{width:100%}
  .about-stat-big-number{font-size:64px;letter-spacing:-1.6px}
  .footer-links-grid{gap:var(--space-lg)}
  .footer-link-column{min-width:44%}
}

@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  *,*::before,*::after{animation-duration:.001ms!important;transition-duration:.001ms!important}
  .anim-fade-up,.anim-fade-up-2,.anim-fade-up-3,.anim-img-fade-in,
  .anim-children-fade-in > *{opacity:1!important;transform:none!important}
  .marquee-track,.marquee-track-reverse{animation:none!important}
}
:focus-visible{outline:2px solid var(--primary);outline-offset:3px;border-radius:8px}

/* Manrope: headings 700 site-wide. !important because several template
   selectors (e.g. ".hero h1") set lighter weights with higher specificity. */
h1,h2,h3,h4,h5,h6{font-weight:700!important}
</style>
</head>
<body>

@php
  $cardWidths = ['card-w-540', 'card-w-460', 'card-w-510', 'card-w-410'];
  // The second marquee row runs the same clients in reverse so the rows differ.
  $marqueeRows = [
    'marquee-track' => $testimonials,
    'marquee-track-reverse' => $testimonials->reverse()->values(),
  ];
@endphp

<!-- ======================= NAVBAR ======================= -->
@include('partials.site-navbar-light')

<!-- ======================= HERO ======================= -->
<section class="section section-hero">
  <div class="container">
    <div class="about-hero-head">
      <h1 class="anim-hero-fade-up-in">Automation, Designed Around Real Operations</h1>
      <p class="anim-hero-fade-up-in-2">We help teams simplify complex workflows, reduce manual work, and build structured systems that scale — without adding unnecessary tools or noise.</p>
    </div>

    <div class="about-hero-grid">
      <div class="about-quote-card">
        <p class="about-quote-text">“Not every workflow should be automated. The real impact comes from knowing which ones should.”</p>
        @if($founder)
        <div class="about-quote-author">
          @if($founder->avatar_url)
          <img src="{{ $founder->avatar_url }}" loading="lazy" alt="{{ $founder->name }}" class="about-quote-avatar">
          @endif
          <div>
            <p class="about-author-name">{{ $founder->name }}</p>
            <p class="about-author-role">{{ $founder->designation }}</p>
          </div>
        </div>
        @endif
      </div>

      <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69acb1978016b691acad0d72_hero-about.webp"
           loading="eager" alt="About hero" class="about-hero-image">

      <div class="about-stat-card">
        <h2 class="about-stat-big-number">100+</h2>
        <p class="about-stat-card-text">Workflows analyzed across client engagements</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================= OUR PHILOSOPHY ======================= -->
<section class="section">
  <div class="container">
    <p class="section-label">Our Philosophy</p>
    <h2 class="anim-fade-up-2">Automation Should Be Intentional</h2>
    <p class="about-philosophy-text anim-fade-up-3">Most teams don’t lack tools — they lack structure. Instead of automating everything, we focus on identifying where automation creates measurable leverage. </p>

    <div class="about-stats-flex anim-children-fade-in">
      <div class="about-stat-inline">
        <div class="cs-cms-stat-number">95%</div>
        <p class="text-small">Client <br>satisfaction</p>
      </div>
      <div class="about-stat-inline">
        <div class="cs-cms-stat-number">&gt;40%</div>
        <p class="text-small">Average reduction in repetitive manual work</p>
      </div>
      <div class="about-stat-inline">
        <div class="cs-cms-stat-number">4x</div>
        <p class="text-small">Increase in cross-team process visibility</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================= TEAM (unchanged from the previous About page) ======================= -->
<div class="team-block">
  @include('about.partials.team')
</div>

<!-- ======================= PRINCIPLES ======================= -->
<section class="section">
  <div class="container">
    <div class="about-principles-layout">
      <div class="about-principles-left">
        <p class="cs-tag">Principles</p>
        <h2 class="about-principles-heading anim-fade-up-2">What Actually Makes the Difference</h2>
      </div>

      <div class="about-principles-right anim-children-fade-in">
        <div class="about-principle-item">
          <h3 class="no-margin">We reduce complexity, not increase it</h3>
          <p class="text-small">If a solution adds operational burden, it’s not a solution.</p>
        </div>
        <div class="about-principle-item">
          <h3 class="no-margin">We think beyond launch</h3>
          <p class="text-small">Every system is built for long-term maintainability.</p>
        </div>
        <div class="about-principle-item">
          <h3 class="no-margin">We don’t automate everything</h3>
          <p class="text-small">We identify where automation creates measurable impact — and where it doesn’t.</p>
        </div>
        <div class="about-principle-item">
          <h3 class="no-margin">We design systems, not workflows in isolation</h3>
          <p class="text-small">Every automation considers dependencies across teams and tools.</p>
        </div>
      </div>
    </div>
  </div>
</section>

@if($testimonials->isNotEmpty())
<!-- ======================= WHAT CLIENTS SAY (marquee) ======================= -->
<section class="section">
  <div class="container">
    <div class="about-testimonials-header">
      <p class="section-label">What Clients Say</p>
      <h2 class="anim-fade-up-2">Measurable Impact, Shared by Our Clients</h2>
    </div>
  </div>

  <div class="marquee-container">
    @foreach($marqueeRows as $rowClass => $rowItems)
    <div class="{{ $rowClass }}">
      {{-- the row repeats so the loop is seamless --}}
      @foreach([false, true] as $isCopy)
        @foreach($rowItems as $i => $testimonial)
        <div class="about-testimonial-card {{ $cardWidths[$i % count($cardWidths)] }}" @if($isCopy) aria-hidden="true" @endif>
          <p class="testimonial-quote">“{{ Str::limit($testimonial->quote, 170) }}”</p>
          <div class="about-testimonial-author">
            @if($testimonial->avatar_url)
            <img src="{{ $testimonial->avatar_url }}" loading="lazy" alt="{{ $isCopy ? '' : $testimonial->client_name }}" class="testimonial-avatar">
            @endif
            <div>
              <p class="testimonial-name">{{ $testimonial->client_name }}</p>
              <p class="testimonial-role">{{ collect([$testimonial->client_position, $testimonial->company])->filter()->implode(', ') }}</p>
            </div>
          </div>
        </div>
        @endforeach
      @endforeach
    </div>
    @endforeach
  </div>
</section>
@endif

<!-- ======================= CTA ======================= -->
<section class="cta-section" id="cta">
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-heading anim-fade-up">Ready to Simplify How Your Team Works?</h2>
      <p class="cta-subtitle anim-fade-up-2">If operational complexity is slowing progress, let’s start with clarity. We design structured automation systems aligned with real business priorities.</p>
      <div class="anim-fade-up-3">
        <a href="{{ route('contact.index') }}" class="button-primary">Schedule a Consultation</a>
      </div>
    </div>
  </div>
</section>

<!-- ======================= FOOTER ======================= -->
@include('partials.site-footer')

<script>
(() => {
  'use strict';
  const reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- scroll reveals ---------- */
  const animated = document.querySelectorAll('.anim-fade-up, .anim-fade-up-2, .anim-fade-up-3, .anim-img-fade-in, .anim-children-fade-in');
  if (reduced || !('IntersectionObserver' in window)) {
    animated.forEach(el => el.classList.add('is-in'));
  } else {
    const io = new IntersectionObserver((entries, obs) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('is-in'); obs.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    animated.forEach(el => io.observe(el));
  }

  /* ---------- Testimonial marquees: match the duration to the
     row's real width, so both rows travel at the same speed
     regardless of how many cards they hold. ---------- */
  if (!reduced) {
    document.querySelectorAll('.marquee-track, .marquee-track-reverse').forEach(row => {
      const seconds = Math.max(30, row.scrollWidth / 2 / 55);
      row.style.animationDuration = seconds.toFixed(1) + 's';
    });
  }
})();
</script>
</body>
</html>
