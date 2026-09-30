<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Services — {{ setting('site_name', 'ZaroSoft') }}</title>
<meta name="description" content="We design and implement structured automation systems that eliminate repetitive work, reduce operational friction, and scale with your business.">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Services — {{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:description" content="We design and implement structured automation systems that eliminate repetitive work, reduce operational friction, and scale with your business.">
<meta property="og:image" content="{{ asset('images/zarosoft-og.jpg') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<x-structured-data :graph="$structuredData ?? []" />
<style>
/* ===========================================================
   DESIGN TOKENS
   =========================================================== */
:root{
  --page:#f6faff;
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
   =========================================================== */
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

.section{padding:var(--section-padding) var(--section-padding-h);overflow:hidden}
.container{width:100%;max-width:var(--max-width);margin-left:auto;margin-right:auto}

.section-label{
  display:inline-flex;
  margin-bottom:var(--space-12);
  padding:6px 12px;
  border:1.5px solid var(--text-body);
  border-radius:var(--r-50);
  color:var(--text-body);
  font-size:var(--small-body);
  font-weight:400;
  line-height:120%;
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

.button-secondary{
  display:inline-flex;align-items:center;justify-content:center;
  gap:var(--space-md);
  padding:6.5px 6.5px 6.5px 22.5px;
  border:1.5px solid var(--primary);
  border-radius:var(--r-full);
  background-color:transparent;
  font-size:var(--button-text);font-weight:500;
  transition:gap .3s ease-in-out,padding .3s ease-in-out,background-color .3s ease-in-out;
}
.button-secondary:hover{gap:34px;padding-left:12.5px}
.secondary-button-text{color:var(--primary);font-size:var(--button-text);font-weight:400;line-height:normal;margin-bottom:0;white-space:nowrap}
.secondary-button-text-light{color:var(--on-dark);font-size:var(--button-text);margin-bottom:0;white-space:nowrap}
.arrow-circle{
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
  width:48px;height:48px;border-radius:50%;
  background-color:var(--primary);color:var(--white);
  font-size:var(--body);
}
.arrow-circle p{margin:0;line-height:1}

/* ===========================================================
   NAVBAR — light variant: dark text over the light page
   =========================================================== */
.navbar{
  position:absolute;inset:0 0 auto;z-index:9;
  width:100%;margin-top:46px;
  padding:0 var(--section-padding-h);
  background-color:transparent;
}
.navbar-row{
  display:flex;align-items:center;justify-content:space-between;
  width:100%;max-width:var(--max-width);margin-inline:auto;
}
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
  flex-direction:column;align-items:stretch;gap:4px;
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
.row-centered{
  display:flex;align-items:center;justify-content:flex-start;
  gap:var(--section-padding-h);
}
.content{display:flex;flex-flow:column;align-items:flex-start;justify-content:flex-start;max-width:1000px}
.hero-subtitle{max-width:1000px;margin-bottom:var(--space-40)}
.services-hero-image{
  flex-shrink:0;width:53%;
  border-radius:var(--r-4xl);
  object-fit:cover;
}

/* ===========================================================
   2. OUR APPROACH + STATS
   =========================================================== */
.approach-top{
  display:flex;align-items:center;justify-content:space-between;
  gap:var(--space-40);
  margin-bottom:var(--space-xl);
}
.approach-top-left{display:flex;flex-direction:column;flex:none;align-items:flex-start;gap:var(--space-xs)}
.approach-heading{
  max-width:550px;margin:0;
  font-size:var(--h2);letter-spacing:-1.44px;font-weight:400;line-height:110%;
  color:var(--text-heading);
}
.approach-text{max-width:710px;margin-bottom:0}

.stats-bar{
  display:flex;align-items:center;justify-content:space-between;
  gap:148px;
  padding:72px var(--space-40);
  border-radius:var(--r-4xl);
  background-color:var(--surface);
}
.stat-block{display:flex;flex-direction:column;gap:4px;width:30%}
.stat-block.wider{width:37%}
.stat-number-large{
  margin:0;
  color:var(--text-heading);
  font-size:60px;font-weight:400;line-height:110%;letter-spacing:-1.92px;
}

/* ===========================================================
   3. CORE SERVICES — pinned horizontal slider
   =========================================================== */
/* No padding on the section itself: the pin must lock at the same scroll
   position the JS starts sliding from, or the first card moves off early. */
.section-services-pin{min-height:200vh;position:relative;overflow:visible}
.services-pin{
  position:sticky;top:0;
  display:flex;flex-flow:column;justify-content:center;
  height:100vh;
  padding-block:48px;
  overflow:hidden;
}
.services-pin .container{padding-inline:var(--section-padding-h)}
.services-header{
  display:flex;align-items:flex-end;justify-content:space-between;
  max-width:calc(100% - 132px);
  margin-bottom:var(--space-lg);
}
.services-header-left{display:flex;flex-direction:column;align-items:flex-start}
.services-heading{
  margin:0;
  color:var(--text-heading);
  font-size:var(--h2);letter-spacing:-1.44px;font-weight:400;line-height:110%;
}
.services-track{overflow:hidden}
.services-cards{
  display:flex;align-items:center;justify-content:flex-start;
  gap:var(--space-20);
  /* same left edge as the heading above, and a matching gutter after the last card */
  padding-inline:calc(max(0px, (100% - var(--max-width)) / 2) + var(--section-padding-h));
  will-change:transform;
  transition:transform .12s linear;
}
.service-slide-card{
  position:relative;overflow:hidden;
  display:flex;align-items:center;flex:none;
  gap:36px;
  width:100vw;max-width:800px;
  padding:12px 12px 12px 32px;
  /* same soft blue surface as the stats bar above */
  border:0;
  border-radius:var(--r-4xl);
  background-color:var(--surface);
  transition:background-color .35s ease;
}
.service-slide-card:hover{background-color:#e2edfc}
.service-slide-content{display:flex;flex-direction:column;align-items:flex-start;gap:16px;flex:1;min-width:0}
.service-slide-text{display:flex;flex-direction:column;gap:10px}
.service-slide-headline{display:flex;flex-direction:column;gap:8px;color:var(--text-heading)}
/* type scale, largest to smallest: service name 30 > tagline 16 > description 14 > checklist 13.5 */
.service-slide-highlight{
  align-self:flex-start;
  margin:0;
  font-size:30px;line-height:1.12;letter-spacing:-.7px;
  background:linear-gradient(90deg,#055be8 0%,#1a8cec 55%,#17b8d4 100%);
  -webkit-background-clip:text;background-clip:text;color:transparent;
}
/* logo palette cascade: blue→cyan title > deep navy tagline > blue-slate description > navy checklist */
.service-slide-h3{
  margin:0;
  font-size:16px;font-weight:600;line-height:1.45;letter-spacing:-.1px;color:#0b1f4d;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.service-slide-description{
  margin-bottom:0;
  font-size:14px;line-height:1.65;color:#51607f;
  display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;
}
.service-checklist{display:flex;flex-direction:column;gap:8px;padding-top:14px;border-top:1px solid transparent;border-image:linear-gradient(90deg,rgba(5,91,232,.28),rgba(47,213,233,.22),rgba(47,213,233,0)) 1;width:100%}
.service-checklist-item{display:flex;align-items:flex-start;justify-content:flex-start;gap:10px}
.service-checklist-item .text-small{font-size:13.5px;font-weight:500;line-height:1.45;color:#0b2a66}
.service-checklist-icon{flex-shrink:0;width:17px;height:17px;margin-top:1px}
.service-slide-image{
  flex-shrink:0;width:290px;height:330px;
  border-radius:var(--r-3xl);
  object-fit:cover;
}

/* ===========================================================
   4. HOW WE WORK — pinned timeline
   =========================================================== */
.process-scroll-wrapper{height:200vh;position:relative}
.process-sticky{
  position:sticky;top:0;
  display:flex;flex-direction:column;justify-content:center;
  min-height:100vh;
  padding:var(--section-padding) var(--section-padding-h);
}
.process-header{display:flex;flex-direction:column;align-items:flex-start;gap:var(--space-xs);margin-bottom:var(--space-xl)}
.process-timeline{display:flex;justify-content:space-between;gap:0;position:relative}
.process-timeline-line{
  position:absolute;top:20px;left:20px;right:20%;z-index:0;
  height:2px;max-height:2px;
  background-color:var(--on-dark-muted);
  pointer-events:none;
}
.process-timeline-line-active{
  position:absolute;top:20px;left:20px;right:20%;z-index:0;
  height:2px;max-height:2px;
  background:linear-gradient(90deg,#055be8,#2fd5e9);
  transform:scaleX(0);transform-origin:0 50%;
  transition:transform .25s linear;
  pointer-events:none;
}
.process-step-item{
  position:relative;z-index:1;
  display:flex;flex-direction:column;flex:1;align-items:flex-start;
  gap:var(--space-sm);
}
.process-circle{
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
  width:40px;height:40px;border-radius:50%;
  background-color:var(--surface);
  transition:background-color .35s ease;
}
.process-circle-number{
  margin:0;
  color:var(--on-dark-muted);
  font-size:var(--small-body);font-weight:400;line-height:120%;
  transition:color .35s ease;
}
.process-step-label{
  display:flex;flex-direction:column;gap:8px;
  margin:0;max-width:210px;padding-right:16px;
  opacity:.2;
  transition:opacity .35s ease;
}
.process-intro{max-width:620px;margin:0;font-size:17px;line-height:1.6;color:#51607f}
.process-step-title{margin:0;font-size:19px;font-weight:700;line-height:1.3;letter-spacing:-.2px;color:#0b1f4d}
.process-step-text{margin:0;font-size:14px;line-height:1.6;color:#51607f}
.process-step-item.is-active .process-circle{background-color:var(--primary)}
.process-step-item.is-active .process-circle-number{color:#fff}
.process-step-item.is-active .process-step-label{opacity:1}

/* ===========================================================
   5. FAQ
   =========================================================== */
.faq-layout{display:flex;align-items:center;justify-content:flex-start;gap:var(--section-padding-h)}
.faq-left{display:flex;flex-direction:column;flex:1;gap:0;min-width:0}
.faq-left h2{margin-bottom:var(--space-md)}
.faq-item{
  display:flex;flex-flow:column;align-items:flex-start;justify-content:space-between;
  width:100%;
  padding-block:var(--space-md);
}
.faq-item-header{
  display:flex;align-items:center;justify-content:space-between;
  width:100%;padding:0;
  background:none;border:0;
  font-family:inherit;text-align:left;cursor:pointer;
}
.faq-question{
  max-width:90%;margin:0;
  color:var(--text-heading);
  font-size:var(--big-body);font-weight:400;line-height:120%;letter-spacing:-.72px;
}
.faq-toggle{
  position:relative;display:flex;align-items:center;justify-content:center;flex-shrink:0;
  width:24px;height:24px;
  transition:transform .3s ease;
}
.faq-toggle-line{position:absolute;width:12px;height:1.7px;background-color:var(--text-heading);transition:opacity .25s ease}
.faq-toggle-line-v{transform:rotate(90deg)}
.faq-item.is-open .faq-toggle{transform:rotate(90deg)}
.faq-item.is-open .faq-toggle-line-v{opacity:0}
.faq-answer{
  max-width:650px;
  overflow:hidden;
  max-height:0;
  transition:max-height .4s cubic-bezier(.22,.61,.36,1),padding-top .4s ease;
}
.faq-item.is-open .faq-answer{max-height:340px;padding-top:var(--space-12)}
.faq-answer-text{margin:0;font-size:var(--body);color:var(--text-body);line-height:120%}
.faq-right{flex-shrink:0}
.faq-image{
  flex-shrink:0;width:538px;height:599px;
  border-radius:var(--r-4xl);
  object-fit:cover;
}

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
.cta-buttons-block{display:flex;align-items:center;justify-content:center;gap:var(--space-12);flex-wrap:wrap}

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
.anim-fade-up,.anim-fade-up-2,.anim-fade-up-3,.anim-img-fade-in,.anim-children-fade-in{
  opacity:0;transform:translateY(40px);
  transition:opacity .9s cubic-bezier(.22,.61,.36,1),transform .9s cubic-bezier(.22,.61,.36,1);
}
.anim-fade-up-2{transition-delay:.12s}
.anim-fade-up-3{transition-delay:.24s}
.anim-img-fade-in{transform:translateY(24px)}
.is-in{opacity:1;transform:none}

.anim-children-fade-in{opacity:1;transform:none}
.anim-children-fade-in > *{
  opacity:0;transform:translateY(40px);
  transition:opacity .8s cubic-bezier(.22,.61,.36,1),transform .8s cubic-bezier(.22,.61,.36,1);
}
.anim-children-fade-in.is-in > *{opacity:1;transform:none}
.anim-children-fade-in.is-in > *:nth-child(2){transition-delay:.1s}
.anim-children-fade-in.is-in > *:nth-child(3){transition-delay:.2s}

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
  .nav-links{display:none}
  .nav-contact-button{display:none}
  .menu-button{display:block}
  .arrow-circle{width:40px;height:40px}

  .row-centered{flex-flow:column;align-items:flex-start;gap:var(--space-xl)}
  .services-hero-image{width:100%}

  .approach-top{flex-flow:column;align-items:flex-start}
  .stats-bar{flex-flow:column;align-items:flex-start;gap:48px;padding:48px var(--space-md)}
  .stat-block,.stat-block.wider{width:100%}
  .stat-number-large{font-size:40px}

  /* Horizontal pinning is off below 992px: the cards become a column. */
  .section-services-pin{min-height:0;height:auto!important}
  .services-pin{position:static;height:auto;padding-block:var(--section-padding);overflow:visible}
  .services-header{max-width:100%}
  .services-track{overflow:visible}
  .services-cards{flex-flow:column;align-items:flex-start;transform:none!important}
  .service-slide-card{
    flex-flow:column;align-items:flex-start;gap:var(--space-lg);
    width:100%;max-width:100%;min-width:0;
    padding:var(--space-md);
  }
  .service-slide-image{width:100%;height:280px}

  .process-scroll-wrapper{height:auto}
  .process-sticky{position:static;min-height:0}
  .process-timeline{flex-flow:column;gap:var(--space-lg)}
  .process-timeline-line,.process-timeline-line-active{display:none}
  .process-step-item{flex-flow:row;align-items:center;gap:var(--space-sm)}
  .process-step-label{max-width:none}

  .faq-layout{flex-flow:column;align-items:flex-start}
  .faq-image{width:100%;height:380px}
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
  .footer-logo{height:26px}
  .cta-content{min-height:380px}
}
@media screen and (max-width:479px){
  :root{--h1:32px;--h2:26px;--h3:22px;--body:16px;--big-body:18px;--button-text:16px}
  .button-primary,.button-secondary{width:100%}
  .button-secondary{justify-content:space-between}
  .cta-buttons-block{flex-direction:column;width:100%}
  .footer-links-grid{gap:var(--space-lg)}
  .footer-link-column{min-width:44%}
}

@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  *,*::before,*::after{animation-duration:.001ms!important;transition-duration:.001ms!important}
  .anim-fade-up,.anim-fade-up-2,.anim-fade-up-3,.anim-img-fade-in,
  .anim-children-fade-in > *{opacity:1!important;transform:none!important}
}
:focus-visible{outline:2px solid var(--primary);outline-offset:3px;border-radius:8px}

/* Manrope: headings 700 site-wide. !important because several template
   selectors (e.g. ".hero h1") set lighter weights with higher specificity. */
h1,h2,h3,h4,h5,h6{font-weight:700!important}
</style>
</head>
<body>

<!-- ======================= NAVBAR ======================= -->
<div role="banner" class="navbar">
  <div class="navbar-row">
    <a href="{{ route('home') }}" class="brand">
      <img src="{{ asset('images/logo-1.png') }}" alt="{{ setting('site_name', 'ZaroSoft') }} Logo" class="footer-logo">
    </a>
    <nav class="nav-links" aria-label="Main">
      <a href="{{ route('home') }}" class="nav-link">Home</a>
      <a href="{{ route('services.index') }}" aria-current="page" class="nav-link is-current">Services</a>
      <a href="{{ route('about') }}" class="nav-link">About</a>
      <a href="{{ route('portfolio.index') }}" class="nav-link">Case Studies</a>
      <a href="{{ route('blog.index') }}" class="nav-link">Blog</a>
      <a href="{{ route('contact.index') }}" class="nav-contact-button">Contact</a>
    </nav>
    <button type="button" class="menu-button" id="menuButton" aria-label="Menu" aria-expanded="false">
      <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a21f6886f531d84b90b4045_menu-lines-dark.svg" loading="lazy" width="24" height="24" alt="">
    </button>
  </div>
  <div class="nav-mobile" id="navMobile">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('services.index') }}">Services</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('portfolio.index') }}">Case Studies</a>
    <a href="{{ route('blog.index') }}">Blog</a>
    <a href="{{ route('contact.index') }}">Contact</a>
  </div>
</div>

<!-- ======================= HERO ======================= -->
<section class="section section-hero">
  <div class="container">
    <section class="row-centered">
      <div class="content">
        <h1 class="anim-hero-fade-up-in">Practical Automation. Built for How You Actually Work.</h1>
        <p class="hero-subtitle anim-hero-fade-up-in-2">We design and implement structured automation systems that eliminate repetitive work, reduce operational friction, and scale with your business — without adding unnecessary complexity.</p>
        <div class="anim-hero-fade-up-in-3">
          <a href="#cta" class="button-primary">Discuss Your Project</a>
        </div>
      </div>
      <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69acb1972612e0a6affb28f0_hero-services.webp"
           loading="eager" alt="Services hero image" class="services-hero-image">
    </section>
  </div>
</section>

<!-- ======================= OUR APPROACH ======================= -->
<section class="section">
  <div class="container">
    <p class="section-label">Our Approach</p>
    <div class="approach-top">
      <div class="approach-top-left">
        <h2 class="approach-heading anim-fade-up-2">Automation should create clarity, not confusion</h2>
      </div>
      <p class="approach-text anim-fade-up-3">We design and implement structured automation systems that eliminate repetitive work, reduce operational friction, and scale with your business — without adding unnecessary complexity.</p>
    </div>

    <div class="stats-bar anim-children-fade-in">
      <div class="stat-block">
        <div class="stat-number-large">30–50%</div>
        <p class="text-small">Reduction in repetitive manual tasks</p>
      </div>
      <div class="stat-block wider">
        <div class="stat-number-large">Up to 40%</div>
        <p class="text-small">Fewer operational errors caused by manual handling</p>
      </div>
      <div class="stat-block">
        <div class="stat-number-large">25%</div>
        <p class="text-small">Faster process execution across core workflows</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================= CORE SERVICES (pinned horizontal) ======================= -->
<section class="section-services-pin" id="servicesPin">
  <div class="services-pin">
    <div class="container">
      <div class="services-header">
        <div class="services-header-left">
          <p class="section-label">Core Services</p>
          <h2 class="services-heading anim-fade-up-2">Complete Digital Solutions for Your Business</h2>
        </div>
      </div>
    </div>

    <div class="services-track">
      <div class="services-cards" id="servicesCards">

        @foreach($services as $service)
        <div class="service-slide-card anim-fade-up-2">
          <div class="service-slide-content">
            <div class="service-slide-text">
              <div class="service-slide-headline">
                <h3 class="service-slide-highlight">{{ $service->title }}</h3>
                <p class="service-slide-h3">{{ $service->short_description }}</p>
              </div>
              @if($service->description)
              <p class="service-slide-description">{{ Str::limit(strip_tags($service->description), 200) }}</p>
              @endif
            </div>
            @if(!empty($service->features))
            <div class="service-checklist">
              @foreach(array_slice($service->features, 0, 3) as $feature)
              <div class="service-checklist-item"><img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69ca36e93cf59676123a5f4b_tick-circle-blue.svg" loading="lazy" alt="Checkmark" class="service-checklist-icon"><p class="text-small">{{ $feature }}</p></div>
              @endforeach
            </div>
            @endif
          </div>
          @if($service->image_url)
          <img src="{{ $service->image_url }}" loading="lazy" alt="{{ $service->title }} service" class="service-slide-image">
          @endif
        </div>
        @endforeach

      </div>
    </div>
  </div>
</section>

<!-- ======================= HOW WE WORK (pinned timeline) ======================= -->
<section class="process-scroll-wrapper" id="processWrapper">
  <div class="process-sticky">
    <div class="container">
      <div class="process-header">
        <p class="section-label">How We Work</p>
        <h2 class="services-heading anim-fade-up-2">From Vision to Impact, We Build What’s Next.</h2>
        <p class="process-intro anim-fade-up-3">A clear, strategic, and technology-driven process that transforms ideas into scalable digital solutions and measurable business value.</p>
      </div>

      @php
        $processSteps = [
          ['Discover & Strategize', 'Understand the vision, define objectives, and identify the right opportunities.'],
          ['Plan & Design', 'Shape the strategy, experience, architecture, and roadmap for execution.'],
          ['Build & Validate', 'Develop, integrate, test, and refine every solution with precision.'],
          ['Launch & Optimize', 'Deploy, monitor, and optimize for performance, reliability, and growth.'],
          ['Support & Scale', 'Continuously improve, maintain, and scale solutions as your business evolves.'],
        ];
      @endphp
      <div class="process-timeline anim-fade-up-3" id="processTimeline">
        <div class="process-timeline-line"></div>
        <div class="process-timeline-line-active" id="processActiveLine"></div>

        @foreach($processSteps as $i => [$stepTitle, $stepText])
        <div class="process-step-item{{ $i === 0 ? ' is-active' : '' }}">
          <div class="process-circle"><p class="process-circle-number">{{ sprintf('%02d', $i + 1) }}</p></div>
          <div class="process-step-label">
            <h3 class="process-step-title">{{ $stepTitle }}</h3>
            <p class="process-step-text">{{ $stepText }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- ======================= FAQ ======================= -->
@if($faqs->isNotEmpty())
<section class="section">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-left anim-children-fade-in">
        <h2>Frequently Asked Questions</h2>

        @foreach($faqs as $faq)
        <div class="faq-item">
          <button type="button" class="faq-item-header">
            <p class="faq-question">{{ $faq->question }}</p>
            <span class="faq-toggle"><span class="faq-toggle-line"></span><span class="faq-toggle-line faq-toggle-line-v"></span></span>
          </button>
          <div class="faq-answer"><p class="faq-answer-text">{{ $faq->answer }}</p></div>
        </div>
        @endforeach
      </div>

      <div class="faq-right">
        <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69ca31dbbd8fcaa5cb200e0b_how%20it%20works.webp"
             loading="lazy" alt="FAQ decorative image" class="faq-image anim-img-fade-in">
      </div>
    </div>
  </div>
</section>
@endif

<!-- ======================= CTA ======================= -->
<section class="cta-section" id="cta">
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-heading anim-fade-up">Ready to Build Systems That Work for You?</h2>
      <p class="cta-subtitle anim-fade-up-2">Whether you need a focused project or long-term support, we’ll design an automation strategy that fits your current stage.</p>
      <div class="cta-buttons-block anim-fade-up-3">
        <a href="{{ route('contact.index') }}" class="button-primary">Schedule a Consultation</a>
        <a href="{{ route('contact.index') }}" class="button-secondary">
          <p class="secondary-button-text-light">Book a Strategy Call</p>
          <div class="arrow-circle"><p>&rarr;</p></div>
        </a>
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
  const desktop = () => matchMedia('(min-width: 992px)').matches;

  /* ---------- mobile menu ---------- */
  const menuButton = document.getElementById('menuButton');
  const navMobile = document.getElementById('navMobile');
  menuButton.addEventListener('click', () => {
    const open = navMobile.classList.toggle('is-open');
    menuButton.setAttribute('aria-expanded', String(open));
  });
  navMobile.addEventListener('click', e => {
    if (e.target.closest('a')) {
      navMobile.classList.remove('is-open');
      menuButton.setAttribute('aria-expanded', 'false');
    }
  });

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

  /* ---------- FAQ accordion (one open at a time) ---------- */
  document.querySelectorAll('.faq-item').forEach(item => {
    item.querySelector('.faq-item-header').addEventListener('click', () => {
      const open = item.classList.contains('is-open');
      document.querySelectorAll('.faq-item.is-open').forEach(other => other.classList.remove('is-open'));
      if (!open) item.classList.add('is-open');
    });
  });

  /* ---------- Core Services: pinned horizontal scroll ------------------
     The inner block is sticky, so scrolling through the section slides the
     card row sideways instead of down. The section's height is set from the
     row's width, so every service gets the same scroll distance however
     many there are.
     -------------------------------------------------------------------- */
  const pinSection = document.getElementById('servicesPin');
  const cards = document.getElementById('servicesCards');

  // How far the row has to move for its last card to sit on screen.
  // scrollWidth leaves out the row's right padding, so add it back for the end gutter.
  const distance = () => Math.max(0, cards.scrollWidth + parseFloat(getComputedStyle(cards).paddingRight) - cards.parentElement.clientWidth);

  const sizeCards = () => {
    pinSection.style.height = desktop() ? (distance() + innerHeight) + 'px' : '';
  };

  const paintCards = () => {
    if (!desktop()) { cards.style.transform = ''; return; }

    const rect = pinSection.getBoundingClientRect();
    const travel = rect.height - innerHeight;
    const p = travel > 0 ? Math.min(1, Math.max(0, -rect.top / travel)) : 0;

    cards.style.transform = 'translate3d(' + (-p * distance()).toFixed(1) + 'px,0,0)';
  };

  /* ---------- How We Work: timeline advances with the pinned scroll ---------- */
  const processWrapper = document.getElementById('processWrapper');
  const steps = [...document.querySelectorAll('.process-step-item')];
  const activeLine = document.getElementById('processActiveLine');

  const paintProcess = () => {
    if (!desktop()) {
      steps.forEach(s => s.classList.add('is-active'));
      return;
    }

    const rect = processWrapper.getBoundingClientRect();
    const travel = rect.height - innerHeight;
    const p = travel > 0 ? Math.min(1, Math.max(0, -rect.top / travel)) : 0;

    // Step 1 is lit from the start; the rest light up in turn.
    const reached = Math.min(steps.length, 1 + Math.floor(p * steps.length));
    steps.forEach((s, i) => s.classList.toggle('is-active', i < reached));
    activeLine.style.transform = 'scaleX(' + (p * ((reached - 1) / (steps.length - 1) || p)).toFixed(3) + ')';
  };

  let ticking = false;
  const onScroll = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(() => { paintCards(); paintProcess(); ticking = false; });
  };
  addEventListener('scroll', onScroll, { passive: true });
  addEventListener('resize', () => { sizeCards(); onScroll(); });
  sizeCards();
  onScroll();
})();
</script>
</body>
</html>
