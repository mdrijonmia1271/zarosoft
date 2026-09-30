<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Home page — {{ setting('site_name', 'ZaroSoft') }}</title>
<meta name="description" content="We build scalable software, intelligent solutions, and seamless digital experiences that help modern businesses innovate, operate smarter, and accelerate growth.">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Home page — {{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:description" content="We build scalable software, intelligent solutions, and seamless digital experiences that help modern businesses innovate, operate smarter, and accelerate growth.">
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
  /* colours */
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

  /* type */
  --h1:56px;
  --h2:40px;
  --h3:32px;
  --h4:24px;
  --h5:20px;
  --h6:18px;
  --body:20px;
  --big-body:24px;
  --small-body:16px;
  --button-text:20px;

  /* space */
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
  --space-4xl:120px;
  --section-padding:96px;
  --section-padding-h:60px;
  --max-width:1400px;
  --max-width-pad:1480px;

  /* radius */
  --r-sm:4px;
  --r-md:8px;
  --r-lg:12px;
  --r-xl:16px;
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
ul{margin:0;padding:0;list-style:none}

h1,h2,h3,h4,h5,h6{margin:0 0 var(--space-xs);color:var(--text-heading);font-weight:400}
h1{font-size:var(--h1);letter-spacing:-1.92px;line-height:1.1em}
h2{font-size:var(--h2);letter-spacing:-1.4px;line-height:1.1em}
h3{font-size:var(--h3);letter-spacing:-.96px;line-height:1.2em;margin-bottom:4px}
h4{font-size:var(--h4);line-height:1.2em;margin-bottom:0}
p{margin:0 0 10px;font-size:var(--big-body);line-height:1.2em}

/* ===========================================================
   LAYOUT
   =========================================================== */
.section{padding:var(--section-padding) var(--section-padding-h);overflow:hidden}
.section.section-wide{padding:20px;overflow:visible}
.container{width:100%;max-width:var(--max-width);margin-left:auto;margin-right:auto}
.container.centered{text-align:center}

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
.text-small{font-size:var(--body);margin-bottom:0;transition:color .2s}
.text-small.light{color:var(--on-dark-muted)}
h3.light{color:var(--on-dark)}

/* ===========================================================
   BUTTONS
   =========================================================== */
.button-primary{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  padding:var(--space-20) var(--space-md);
  border-radius:var(--r-50);
  background-color:var(--primary);
  color:var(--on-dark);
  font-size:var(--button-text);
  font-weight:500;
  transition:background-color .2s ease-in-out,transform .2s ease-in-out;
}
.button-primary:hover{background-color:var(--primary-hover);transform:scale(1.02)}

.button-secondary{
  display:inline-flex;
  flex-flow:row;
  align-items:center;
  justify-content:center;
  gap:var(--space-md);
  padding:6.5px 6.5px 6.5px 22.5px;
  border:1.5px solid var(--primary);
  border-radius:var(--r-full);
  background-color:transparent;
  color:var(--on-dark);
  font-size:var(--button-text);
  font-weight:500;
  transition:background-color .3s ease-in-out,gap .3s ease-in-out,padding .3s ease-in-out;
}
.button-secondary:hover{gap:34px;padding-left:12.5px}
.secondary-button-text{color:var(--primary);font-size:var(--button-text);font-weight:400;line-height:normal;margin-bottom:0;white-space:nowrap}
.secondary-button-text-light{color:var(--on-dark);font-size:var(--button-text);margin-bottom:0;white-space:nowrap}
.arrow-circle{
  display:flex;
  align-items:center;
  justify-content:center;
  flex-shrink:0;
  width:48px;height:48px;
  border-radius:50%;
  background-color:var(--primary);
  color:var(--white);
  font-size:var(--body);
}
.arrow-circle p{margin:0;line-height:1}
.button-wrapper{display:flex;flex-wrap:wrap;align-items:center;gap:var(--space-sm)}
.button-wrapper.centered{justify-content:center}

/* ===========================================================
   1. NAVBAR  (absolute over the hero, not sticky)
   =========================================================== */
.navbar{
  position:absolute;
  inset:0 0 auto;
  z-index:9;
  width:100%;
  margin-top:46px;
  padding:0 var(--section-padding-h);
  background-color:transparent;
}
.navbar-row{
  display:flex;
  align-items:center;
  justify-content:space-between;
  width:100%;
  max-width:var(--max-width);
  margin-left:auto;margin-right:auto;
}
.brand{display:inline-block;padding-left:0}
.footer-logo{width:auto;height:55px}
.nav-links{
  display:inline-flex;
  align-items:center;
  gap:var(--space-sm);
  padding:var(--space-xs);
  border-radius:30px;
  background-color:rgba(255,255,255,.4);
  backdrop-filter:blur(2px);
}
.nav-link{
  padding:var(--space-12) var(--space-20);
  border-radius:30px;
  color:var(--text-heading);
  font-size:var(--small-body);
  font-weight:500;
  line-height:120%;
  white-space:nowrap;
  transition:background-color .2s ease-in-out;
}
.nav-link:hover{background-color:rgba(255,255,255,.1)}
.nav-link.w--current{background-color:rgba(255,255,255,.7)}
.nav-contact-button{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  padding:var(--space-12) 21px;
  border-radius:var(--r-50);
  background-color:var(--text-heading);
  color:var(--white);
  font-size:var(--small-body);
  font-weight:500;
  line-height:1.2;
  white-space:nowrap;
  transition:background-color .2s ease-in-out;
}
.nav-contact-button:hover{background-color:#0b2257}
.menu-button{display:none;padding:12px;cursor:pointer}
.menu-button-icon{width:24px;height:24px}

/* ===========================================================
   2. HERO
   =========================================================== */
.hero-gradient{
  position:relative;
  display:flex;
  align-items:center;
  justify-content:flex-start;
  max-width:var(--max-width-pad);
  min-height:800px;
  margin-left:auto;margin-right:auto;
  padding:var(--space-40);
  border-radius:var(--r-4xl);
  color:var(--on-dark);
  overflow:hidden;
}
.hero-image,.hero-background-video,.hero-background-overlay{
  position:absolute;top:0;left:0;
  width:100%;height:100%;
}
/* base field under the video, in the logo's navy / blue / cyan (was a purple template image) */
.hero-image{
  z-index:0;
  background-image:
    radial-gradient(70% 80% at 85% 20%,rgba(47,213,233,.35) 0%,rgba(47,213,233,0) 60%),
    radial-gradient(70% 80% at 10% 90%,rgba(5,91,232,.55) 0%,rgba(5,91,232,0) 65%),
    linear-gradient(120deg,#040c26 0%,#08184a 50%,#0a3a9a 100%);
}
.hero-background-video{z-index:1}
.hero-background-video video{width:100%;height:100%;object-fit:cover;display:block}
/* Deep blue-navy shade, tuned to the logo mark's blue so the copy stays legible */
.hero-background-overlay{z-index:2;background-image:linear-gradient(180deg,rgba(3,10,38,.5) 0%,rgba(3,10,38,.72) 100%)}
/* Recolours the video's light streaks and dots to the logo mark's two
   colours — blue #055be8 into cyan #2fd5e9 — keeping its brightness. */
.hero-background-tint{
  position:absolute;inset:0;z-index:2;
  background-image:linear-gradient(115deg,#055be8 0%,#1a8cec 50%,#2fd5e9 100%);
  mix-blend-mode:color;
  opacity:1;
  pointer-events:none;
}
/* Two soft light pools in the logo colours for depth */
.hero-background-glow{
  position:absolute;inset:0;z-index:2;
  background-image:
    radial-gradient(55% 50% at 12% 18%,rgba(5,91,232,.38) 0%,rgba(5,91,232,0) 70%),
    radial-gradient(50% 45% at 88% 88%,rgba(47,213,233,.3) 0%,rgba(47,213,233,0) 70%);
  mix-blend-mode:screen;
  pointer-events:none;
}
.hero-content{position:relative;z-index:3;max-width:870px;color:var(--on-dark-muted)}
.hero-content.centered{margin-left:auto;margin-right:auto;text-align:center}
.hero-heading{max-width:1024px;color:var(--on-dark)}
.hero-subtitle{max-width:1000px;margin-bottom:var(--space-40)}

/* ===========================================================
   3. VALUE CARDS  (hover accordion, width transition)
   =========================================================== */
.value-cards-flex{
  display:flex;
  gap:var(--space-sm);
  margin-top:var(--space-40);
  text-align:left;
}
.value-card{
  display:flex;
  flex-flow:row;
  align-items:center;
  justify-content:space-between;
  gap:var(--space-40);
  width:25%;
  height:352px;
  min-height:320px;
  padding:var(--space-sm) var(--space-md);
  border-radius:var(--r-4xl);
  background-color:var(--surface);
  transition:width .4s;
  overflow:hidden;
}
.value-card.opened{width:50%}
.value-card-content{
  display:flex;
  flex-flow:column;
  align-items:stretch;
  justify-content:space-between;
  gap:64px;
  width:100%;height:100%;
  padding-top:var(--space-sm);
  padding-bottom:var(--space-sm);
}
.value-card-icon{width:56px;height:56px;margin-bottom:0;flex-shrink:0}
.value-card-text{display:flex;flex-flow:column;gap:4px;width:100%;max-width:250px}
.value-card-image{
  width:0%;
  max-width:55%;
  height:100%;
  max-height:320px;
  border-radius:var(--r-3xl);
  object-fit:cover;
  transition:width .4s;
}
.value-card-image.opened{width:55%}

/* ===========================================================
   4. PROCESS
   =========================================================== */
.process-card{
  display:flex;
  flex-flow:row;
  align-items:center;
  justify-content:space-between;
  gap:var(--space-40);
}
.process-image{
  flex-shrink:0;
  width:446px;height:580px;
  border-radius:var(--r-3xl);
  object-fit:cover;
}
.process-right{display:flex;flex-direction:column;flex:1;align-items:flex-start;justify-content:flex-start;gap:0}
.process-label-heading{margin-bottom:var(--space-md)}
.process-steps{display:flex;flex-flow:column;gap:var(--space-md)}
.methodology-step{display:flex;align-items:flex-start;gap:52px}
.methodology-step-number{
  flex-shrink:0;min-width:40px;
  color:var(--text-heading);
  font-size:var(--h3);font-weight:400;line-height:120%;
  margin-bottom:0;
}
.methodology-step-content{display:flex;flex-direction:column}
.methodology-step-title{
  color:var(--text-heading);
  font-size:var(--h3);letter-spacing:-.96px;
  font-weight:400;line-height:120%;
  margin:0;
}
.cs-result-text{color:var(--text-body);font-size:var(--body);font-weight:400;line-height:120%;margin-bottom:0}

/* ===========================================================
   5. SERVICES  (sticky stacking cards)
   =========================================================== */
.section.section-services-cards{height:340vh;position:relative;overflow:visible}
.container.container-sticky{position:sticky;top:var(--section-padding)}
.services-container{
  position:relative;
  display:block;
  height:66vh;
  min-height:620px;
  margin-top:var(--space-lg);
}
.service-card{
  position:absolute;
  left:0;right:0;
  display:flex;
  flex-flow:row;
  align-items:flex-start;
  justify-content:flex-start;
  gap:var(--space-md);
  max-height:352px;
  margin-bottom:var(--space-sm);
  padding:var(--space-sm) var(--space-sm) var(--space-sm) var(--space-40);
  border-radius:var(--r-4xl);
  background-color:var(--white);
  opacity:0;
  transform:translateY(80px);
  transition:opacity .7s cubic-bezier(.22,.61,.36,1),transform .7s cubic-bezier(.22,.61,.36,1);
}
.service-card.is-in{opacity:1;transform:translateY(0)}
.service-card.card-1{top:0;background-color:var(--surface)}
.service-card.card-2{top:80px;background-color:var(--white)}
.service-card.card-3{top:160px;background-color:var(--surface)}
.service-card.card-4{top:240px;background-color:var(--text-heading)}
.service-card-content{
  display:flex;flex-flow:column;align-items:flex-start;
  gap:4px;width:100%;
  padding-top:var(--space-sm);padding-bottom:var(--space-sm);
}
.service-card-content-info{margin-bottom:var(--space-2xl)}
.service-card-image{
  width:100%;max-width:500px;
  height:394px;max-height:320px;
  border-radius:var(--r-3xl);
  object-fit:cover;
}

/* ===========================================================
   6. ENGAGEMENT OPTIONS
   =========================================================== */
.engagement-layout{
  display:grid;
  grid-template-columns:1fr 1fr 1fr;
  grid-template-rows:auto;
  place-items:start stretch;
  gap:var(--space-sm);
  margin-top:var(--space-lg);
  text-align:left;
}
.engagement-card,.monthly-card{
  display:flex;
  flex-flow:column;
  align-items:flex-start;
  gap:var(--space-40);
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  height:100%;
}
.engagement-card{background-color:var(--surface)}
.monthly-card{border:2px solid var(--primary);background-color:var(--white);justify-content:flex-start}
.engagement-card-header,.monthly-card-header{display:flex;flex-flow:column;gap:4px}
.engagement-card-text,.monthly-card-text,.list-text,.monthly-list-text{font-size:var(--body);margin-bottom:0}
.engagement-list{display:flex;flex-direction:column;gap:var(--space-12)}
.engagement-list-item{display:flex;align-items:center;gap:var(--space-12)}
.list-bullet{
  flex-shrink:0;width:4px;height:4px;
  border-radius:50%;
  background-color:var(--primary);
  font-size:0;line-height:0;margin-bottom:0;overflow:hidden;
}
.monthly-list-bullet{width:24px;height:24px;flex-shrink:0}

/* ===========================================================
   7. TESTIMONIALS
   =========================================================== */
.testimonials-grid{
  display:grid;
  grid-template-columns:1fr 1fr 1fr;
  grid-template-rows:1fr 1fr;
  gap:var(--space-20);
  margin-top:var(--space-xl);
  text-align:left;
}
.testimonial-featured{
  position:relative;
  display:flex;
  flex-direction:column;
  justify-content:flex-end;
  grid-row:span 2;
  min-height:600px;
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  overflow:hidden;
}
.testimonial-featured > img{
  position:absolute;inset:0;
  width:100%;height:100%;
  object-fit:cover;object-position:50% 20%;
}
.testimonial-featured-overlay{
  position:absolute;inset:0;
  border-radius:var(--r-4xl);
  background-image:linear-gradient(#06123300 25%,#061233 86%);
  color:var(--on-dark);
}
.testimonial-featured-content,.testimonial-featured-content-stretched{
  position:relative;z-index:2;
  display:flex;flex-direction:column;
  gap:var(--space-lg);
  height:100%;
  color:var(--on-dark);
}
.testimonial-featured-content{justify-content:flex-end;font-size:var(--h3)}
.testimonial-featured-content-stretched{justify-content:space-between}
.testimonial-card{
  display:flex;flex-direction:column;justify-content:space-between;
  gap:var(--space-lg);
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  background-color:var(--surface);
  color:var(--text-heading);
}
.testimonial-image-card{
  position:relative;
  display:flex;flex-direction:column;justify-content:flex-start;
  min-height:370px;
  padding:var(--space-40) var(--space-md);
  border-radius:var(--r-4xl);
  background-image:linear-gradient(135deg,#061233,#0a2a78 50%,#055be8);
  overflow:hidden;
}
.testimonial-quote{color:var(--text-heading);margin-bottom:0}
.testimonial-quote-light{
  font-size:var(--h3);letter-spacing:-.96px;
  font-weight:400;line-height:120%;margin-bottom:0;
}
.testimonial-author{display:flex;align-items:center;gap:var(--space-sm)}
.testimonial-avatar{width:48px;height:48px;border-radius:var(--r-full);object-fit:cover;flex-shrink:0}
.testimonial-author-info{display:flex;flex-direction:column}
.testimonial-name{color:var(--text-heading);margin-bottom:0}
.testimonial-name-light{color:var(--white);font-size:var(--big-body);font-weight:400;line-height:120%;margin-bottom:0}
.testimonial-role{color:var(--text-body);font-size:var(--body);margin-bottom:0}
.testimonial-role-light{color:var(--on-dark-muted);font-size:var(--body);font-weight:400;line-height:120%;margin-bottom:0}

/* ===========================================================
   8. FINAL CTA
   =========================================================== */
.cta-content{
  display:flex;flex-direction:column;
  align-items:center;justify-content:center;
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
   9. FOOTER
   =========================================================== */
.footer-section{padding:var(--space-xl) var(--section-padding-h);background-color:var(--surface)}
.footer-top{display:flex;align-items:flex-start;justify-content:space-between;gap:var(--space-40);max-width:var(--max-width);margin:0 auto}
.footer-left{display:flex;flex-direction:column;gap:var(--space-sm);max-width:300px}
.footer-left .footer-logo{width:auto;height:70px}
.footer-contact-list,.footer-link-list{display:flex;flex-direction:column;gap:var(--space-12)}
.footer-link-list{gap:6px}
.footer-contact-item{display:flex;align-items:center;gap:var(--space-xs)}
.footer-contact-text{color:var(--footer-heading);font-size:var(--small-body);font-weight:400;line-height:120%;margin-bottom:0}
.footer-social{display:flex;align-items:center;gap:var(--space-20);margin-top:var(--space-sm)}
.footer-social-link{width:24px;height:24px;transition:opacity .2s}
.footer-social-link:hover{opacity:.65}
/* link columns join the footer row directly, so logo + 3 columns spread evenly edge to edge */
.footer-links-grid{display:contents}
.footer-link-column{display:flex;flex-direction:column;gap:var(--space-sm)}
.footer-column-title{color:var(--footer-heading);font-size:var(--h5);font-weight:400;margin-bottom:0}
.footer-link{display:block;color:var(--footer-text);font-size:var(--small-body);margin-bottom:0;transition:color .2s}
.footer-link:hover{color:var(--text-heading)}
.footer-bottom{
  display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;
  gap:var(--space-sm);
  max-width:var(--max-width);margin:var(--space-xl) auto 0;
  padding-top:var(--space-lg);
  border-top:1px solid var(--border-strong);
}
.footer-powered{color:var(--footer-text);font-size:14px;font-weight:400;line-height:120%;margin-bottom:0}

/* ===========================================================
   ENTRANCE ANIMATIONS
   =========================================================== */
.anim-fade-up,.anim-fade-up-2,.anim-fade-up-3,.anim-img-fade-in{
  opacity:0;transform:translateY(40px);
  transition:opacity .9s cubic-bezier(.22,.61,.36,1),transform .9s cubic-bezier(.22,.61,.36,1);
}
.anim-fade-up-2{transition-delay:.12s}
.anim-fade-up-3{transition-delay:.24s}
.anim-img-fade-in{transform:translateY(24px)}
.is-in{opacity:1!important;transform:none!important}

.anim-children-fade-in > *{
  opacity:0;transform:translateY(40px);
  transition:opacity .8s cubic-bezier(.22,.61,.36,1),transform .8s cubic-bezier(.22,.61,.36,1);
}
.anim-children-fade-in.is-in > *{opacity:1;transform:none}
.anim-children-fade-in.is-in > *:nth-child(2){transition-delay:.1s}
.anim-children-fade-in.is-in > *:nth-child(3){transition-delay:.2s}
.anim-children-fade-in.is-in > *:nth-child(4){transition-delay:.3s}

/* hero loads in on its own, no scroll needed */
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
    --section-padding:72px;--section-padding-h:32px;
  }
  .nav-links{
    position:absolute;top:80px;left:0;right:0;
    width:100%;
    flex-flow:column;align-items:flex-start;justify-content:flex-start;
    padding:var(--space-md);
    border-radius:var(--r-2xl);
    background-color:rgba(6,18,51,.96);
    backdrop-filter:blur(14px);
    display:none;
  }
  .nav-links.is-open{display:flex}
  .nav-link{width:100%;color:var(--on-dark)}
  .nav-link.w--current{background-color:rgba(255,255,255,.14)}
  .nav-contact-button{width:100%;background-color:var(--primary)}
  .menu-button{display:block}
  .hero-gradient{min-height:640px;padding:var(--space-md)}
  .arrow-circle{width:40px;height:40px}

  .value-cards-flex{flex-flow:column}
  .value-card,.value-card.opened{width:100%;height:auto;min-height:0;flex-flow:row}
  .value-card-content{gap:var(--space-lg)}
  .value-card-image,.value-card-image.opened{width:0%}

  .process-card{flex-flow:column}
  .process-image{width:100%;height:420px}

  .section.section-services-cards{height:auto;overflow:hidden}
  .container.container-sticky{position:static}
  .services-container{height:auto;min-height:0;display:flex;flex-flow:column;gap:var(--space-sm)}
  .service-card,.service-card.card-1,.service-card.card-2,.service-card.card-3,.service-card.card-4{
    position:relative;top:auto;max-height:none;flex-flow:column;
    padding-left:var(--space-md);padding-right:var(--space-md);
    opacity:0;transform:translateY(40px);
  }
  .service-card-image{max-width:100%;height:240px;max-height:240px}
  .service-card-content-info{margin-bottom:var(--space-lg)}

  .engagement-layout{grid-template-columns:1fr}
  .testimonials-grid{grid-template-columns:1fr 1fr}
  .testimonial-featured{min-height:400px;grid-row:span 1}
  .footer-top{flex-flow:wrap;gap:var(--space-2xl)}
  .footer-links-grid{gap:var(--space-2xl);flex-wrap:wrap}
}

/* ===========================================================
   MOBILE — 767px
   =========================================================== */
@media screen and (max-width:767px){
  :root{--h1:38px;--h2:30px;--h3:24px;--section-padding:56px;--section-padding-h:20px}
  h1{letter-spacing:-1px;line-height:1.08em}
  h2{letter-spacing:-.8px}
  .section.section-wide{padding:12px}
  .hero-gradient{min-height:560px;border-radius:var(--r-3xl)}
  .navbar{margin-top:24px;padding:0 20px}
  .footer-logo{height:26px}
  .value-card{flex-flow:column;height:auto;padding:var(--space-md)}
  .value-card-content{gap:var(--space-md)}
  .value-card-text{max-width:none}
  .process-image{height:320px}
  .testimonials-grid{grid-template-columns:1fr}
  .testimonial-image-card{min-height:300px}
  .button-wrapper{gap:12px}
  .footer-section{padding:40px 20px}
}

/* ===========================================================
   SMALL MOBILE — 479px
   =========================================================== */
@media screen and (max-width:479px){
  :root{--h1:32px;--h2:26px;--h3:22px;--body:16px;--big-body:18px;--button-text:16px}
  .button-primary,.button-secondary{width:100%}
  .button-secondary{justify-content:space-between}
  .hero-gradient{padding:var(--space-sm)}
  .footer-links-grid{gap:var(--space-lg)}
  .footer-link-column{min-width:44%}
}

/* respect the visitor's motion preference */
@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  *,*::before,*::after{animation-duration:.001ms!important;transition-duration:.001ms!important}
  .anim-fade-up,.anim-fade-up-2,.anim-fade-up-3,.anim-img-fade-in,
  .anim-children-fade-in > *,.service-card{opacity:1!important;transform:none!important}
}
:focus-visible{outline:2px solid var(--primary);outline-offset:3px;border-radius:8px}

/* Manrope: headings 700 site-wide. !important because several template
   selectors (e.g. ".hero h1") set lighter weights with higher specificity. */
h1,h2,h3,h4,h5,h6{font-weight:700!important}
/* ---------- Trusted by: greyscale client logo marquee ---------- */
.clients-section{padding-block:72px}
.clients-label{
  display:table;margin:0 auto 64px;text-align:center;
  font-size:20px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
  background:linear-gradient(90deg,#055be8 0%,#1a8cec 55%,#17b8d4 100%);
  -webkit-background-clip:text;background-clip:text;color:transparent;
}
.clients-marquee{overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 10%,#000 90%,transparent);mask-image:linear-gradient(90deg,transparent,#000 10%,#000 90%,transparent)}
.clients-track{display:flex;align-items:center;gap:88px;width:max-content;animation:clients-scroll 40s linear infinite}
.clients-marquee:hover .clients-track{animation-play-state:paused}
.client-logo{flex:none;display:flex;align-items:center;justify-content:center;height:56px}
.client-logo img{max-height:100%;max-width:150px;width:auto;object-fit:contain;filter:grayscale(1);opacity:.75;transition:filter .35s ease,opacity .35s ease}
.client-logo img:hover{filter:grayscale(0);opacity:1}
@keyframes clients-scroll{to{transform:translateX(calc(-50% - 44px))}}
@media (max-width:767px){.clients-section{padding-block:48px}.clients-label{margin-bottom:40px;font-size:15px;letter-spacing:.1em}.clients-track{gap:48px}.client-logo{height:44px}@keyframes clients-scroll{to{transform:translateX(calc(-50% - 24px))}}}
@media (prefers-reduced-motion:reduce){.clients-track{animation:none;flex-wrap:wrap;justify-content:center;width:auto}}
</style>
</head>
<body>

<!-- ======================= NAVBAR ======================= -->
<div>
  <div role="banner" class="navbar">
    <div class="navbar-row">
      <a href="{{ route('home') }}" class="brand">
        <img src="{{ asset('images/logo-premium.png') }}" alt="{{ setting('site_name', 'ZaroSoft') }} Logo" class="footer-logo">
      </a>
      <nav role="navigation" class="nav-links-container">
        <div class="nav-links" id="navLinks">
          <a href="{{ route('home') }}" aria-current="page" class="nav-link w--current">Home</a>
          <a href="{{ route('services.index') }}" class="nav-link">Services</a>
          <a href="{{ route('about') }}" class="nav-link">About</a>
          <a href="{{ route('portfolio.index') }}" class="nav-link">Case Studies</a>
          <a href="{{ route('blog.index') }}" class="nav-link">Blog</a>
          <a href="{{ route('contact.index') }}" class="nav-contact-button">Contact</a>
        </div>
      </nav>
      <div class="menu-button" id="menuButton" role="button" tabindex="0" aria-label="Menu" aria-expanded="false">
        <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a21f6882f559d7f80545dd4_menu-lines-white.svg" loading="lazy" width="24" height="24" alt="" class="menu-button-icon">
      </div>
    </div>
  </div>
</div>

<!-- ======================= HERO ======================= -->
<section class="section section-wide">
  <section class="hero-gradient centered">
    <div class="hero-image" aria-hidden="true"></div>
    <div class="hero-background-video">
      <video autoplay loop muted playsinline
             poster="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a4a50a0b221c183c39baa8b_hero-background-video_poster.0000000.jpg">
        <source src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a4a50a0b221c183c39baa8b_hero-background-video_mp4.mp4" type="video/mp4">
        <source src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a4a50a0b221c183c39baa8b_hero-background-video_webm.webm" type="video/webm">
      </video>
    </div>
    <div class="hero-background-tint" aria-hidden="true"></div>
    <div class="hero-background-overlay"></div>
    <div class="hero-background-glow" aria-hidden="true"></div>
    <div class="hero-content centered">
      <h1 class="hero-heading anim-hero-fade-up-in">Transforming Ideas Into Digital Excellence</h1>
      <p class="hero-subtitle anim-hero-fade-up-in-2">We build scalable software, intelligent solutions, and seamless digital experiences that help modern businesses innovate, operate smarter, and accelerate growth.</p>
      <div class="button-wrapper centered anim-hero-fade-up-in-3">
        <a href="{{ route('services.index') }}" class="button-primary">Explore Our Services</a>
        <a href="{{ route('contact.index') }}" class="button-secondary">
          <p class="secondary-button-text-light">Talk to Our Team</p>
          <div class="arrow-circle"><p>&rarr;</p></div>
        </a>
      </div>
    </div>
  </section>
</section>

<!-- ======================= PRACTICAL APPROACH ======================= -->
<section class="section" id="about">
  <div class="container centered">
    <p class="section-label">Practical Approach</p>
    <h2 class="anim-fade-up">Automation should simplify operations — not <br>introduce new layers of tools and maintenance</h2>
    <div class="value-cards-flex" id="valueCards">
      <div class="value-card opened anim-fade-up">
        <div class="value-card-content">
          <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a4509fc534026b477480aad_processes.svg" loading="lazy" alt="AI-Assisted Processes icon" class="value-card-icon">
          <div class="value-card-text">
            <h3>AI-Assisted Processes</h3>
            <p class="text-small">Apply AI selectively to speed up operations where it adds real value.</p>
          </div>
        </div>
        <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a450afbbcf100263dedda99_ai-assisted-process.webp" loading="lazy" alt="processes" class="value-card-image opened">
      </div>
      <div class="value-card anim-fade-up">
        <div class="value-card-content">
          <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69acb1c057de1eac599f7004_icon-workflow.svg" loading="lazy" alt="Workflow Automation icon" class="value-card-icon">
          <div class="value-card-text">
            <h3 class="value-card-title">Workflow Automation</h3>
            <p class="text-small">Design and implement workflows that replace repetitive manual tasks.</p>
          </div>
        </div>
        <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a450afb3d7c4d1e0d5a3eeb_workflow-automation.webp" loading="lazy" alt="automation" class="value-card-image">
      </div>
      <div class="value-card anim-fade-up">
        <div class="value-card-content">
          <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69acb1c06eb73ddd5a169228_icon-integration.svg" loading="lazy" alt="System Integration icon" class="value-card-icon">
          <div class="value-card-text">
            <h3 class="value-card-title">System Integration</h3>
            <p class="text-small">Connect CRM, sales, support, finance, and internal tools into one flow.</p>
          </div>
        </div>
        <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a450afbf8cea21f618a9983_system-integration.webp" loading="lazy" alt="integration" class="value-card-image">
      </div>
    </div>
  </div>
</section>

<!-- ======================= HOW IT WORKS ======================= -->
<section class="section" id="case-studies">
  <div class="container">
    <div class="process-card">
      <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69ca31dbbd8fcaa5cb200e0b_how%20it%20works.webp"
           loading="lazy" alt="How it works" class="process-image anim-img-fade-in">
      <div class="process-right">
        <div class="process-label-heading">
          <p class="section-label">How It Works</p>
          <h2 class="anim-fade-up">A Simple, Proven Process</h2>
        </div>
        <div class="process-steps anim-children-fade-in">
          <div class="methodology-step">
            <p class="methodology-step-number">01</p>
            <div class="methodology-step-content">
              <h3 class="methodology-step-title">Workflow Audit</h3>
              <p class="cs-result-text">Design and implement workflows that replace repetitive manual tasks.</p>
            </div>
          </div>
          <div class="methodology-step">
            <p class="methodology-step-number">02</p>
            <div class="methodology-step-content">
              <h3 class="methodology-step-title">Automation Opportunities</h3>
              <p class="cs-result-text">We identify where automation brings the biggest impact.</p>
            </div>
          </div>
          <div class="methodology-step">
            <p class="methodology-step-number">03</p>
            <div class="methodology-step-content">
              <h3 class="methodology-step-title">Build &amp; Testing</h3>
              <p class="cs-result-text">Automations are built, tested, and documented.</p>
            </div>
          </div>
          <div class="methodology-step">
            <p class="methodology-step-number">04</p>
            <div class="methodology-step-content">
              <h3 class="methodology-step-title">Optimization</h3>
              <p class="cs-result-text">Workflows are monitored and improved as your business evolves.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================= AUTOMATION SERVICES (sticky stack) ======================= -->
<section class="section section-services-cards" id="services">
  <div class="container container-sticky">
    <p class="section-label">Automation Services</p>
    <h2 class="anim-fade-up">Clear, focused services designed for real business needs</h2>
    <div class="services-container" id="servicesStack">

      <div class="service-card card-1">
        <div class="service-card-content">
          <div class="service-card-content-info">
            <h3>Automation Audit</h3>
            <p class="text-small">Before building anything, we assess your workflows to determine where automation will genuinely improve efficiency — and where it won’t.</p>
          </div>
          <a href="{{ route('services.index') }}" class="button-secondary">
            <p class="secondary-button-text">View Service</p>
            <div class="arrow-circle"><p>&rarr;</p></div>
          </a>
        </div>
        <img src="https://cdn.prod.website-files.com/69acb1ff114ed1d28662b56c/6a9c82facc8b73c59dee4d29_automation%20audit.png" loading="lazy" alt="Automation Audit service" class="service-card-image">
      </div>

      <div class="service-card card-2">
        <div class="service-card-content">
          <div class="service-card-content-info">
            <h3>AI Integration</h3>
            <p class="text-small">Bring practical AI into support, operations, and internal workflows. {{ setting('site_name', 'ZaroSoft') }} integrates AI tools that deliver real efficiency without added complexity.</p>
          </div>
          <a href="{{ route('ai.index') }}" class="button-secondary">
            <p class="secondary-button-text">View Service</p>
            <div class="arrow-circle"><p>&rarr;</p></div>
          </a>
        </div>
        <img src="https://cdn.prod.website-files.com/69acb1ff114ed1d28662b56c/6a9c82db419d58e6bb0abe6d_ai%20integration.png" loading="lazy" alt="AI Integration service" class="service-card-image">
      </div>

      <div class="service-card card-3">
        <div class="service-card-content">
          <div class="service-card-content-info">
            <h3>Workflow Design &amp; Setup</h3>
            <p class="text-small">End-to-end workflow automation built with tools like Zapier and Make. {{ setting('site_name', 'ZaroSoft') }} designs reliable systems that remove manual work across your operations.</p>
          </div>
          <a href="{{ route('services.index') }}" class="button-secondary">
            <p class="secondary-button-text">View Service</p>
            <div class="arrow-circle"><p>&rarr;</p></div>
          </a>
        </div>
        <img src="https://cdn.prod.website-files.com/69acb1ff114ed1d28662b56c/6a9c82ed5cc473228226ea7d_workflow%20design.png" loading="lazy" alt="Workflow Design service" class="service-card-image">
      </div>

      <div class="service-card card-4">
        <div class="service-card-content">
          <div class="service-card-content-info">
            <h3 class="light">Ongoing Optimization</h3>
            <p class="text-small light">Keep automations effective as your business evolves. {{ setting('site_name', 'ZaroSoft') }} provides continuous optimization and support so your workflows scale as your processes change.</p>
          </div>
          <a href="{{ route('services.index') }}" class="button-secondary">
            <p class="secondary-button-text-light">View Service</p>
            <div class="arrow-circle"><p>&rarr;</p></div>
          </a>
        </div>
        <img src="https://cdn.prod.website-files.com/69acb1ff114ed1d28662b56c/6a9c82d1fc43ef7770a955a5_ongoing%20optimisation.png" loading="lazy" alt="Ongoing Optimization service" class="service-card-image">
      </div>

    </div>
  </div>
</section>


<!-- ======================= TRUSTED BY ======================= -->
@if($clientLogos->isNotEmpty())
<section class="section clients-section" id="clients">
  <p class="clients-label">Trusted by Industry Leaders</p>
  {{-- logos repeated once so the marquee loops without a seam --}}
  <div class="clients-marquee">
    <div class="clients-track">
      @foreach($clientLogos->concat($clientLogos) as $i => $client)
      <div class="client-logo" @if($i >= $clientLogos->count()) aria-hidden="true" @endif>
        <img src="{{ $client->logo_url }}" alt="{{ $i < $clientLogos->count() ? $client->name : '' }}" loading="lazy" decoding="async">
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ======================= FINAL CTA ======================= -->
<section class="section" id="contact">
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-heading anim-fade-up">Ready to Simplify Your Operations?</h2>
      <p class="cta-subtitle anim-fade-up-2">Let’s review your current workflows and identify where automation can save time and reduce friction.</p>
      <div class="cta-buttons-block anim-fade-up-3">
        <a href="{{ route('contact.index') }}" class="button-primary">Schedule a Call</a>
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

  /* ---------- mobile menu ---------- */
  const menuButton = document.getElementById('menuButton');
  const navLinks = document.getElementById('navLinks');
  const toggleMenu = () => {
    const open = navLinks.classList.toggle('is-open');
    menuButton.setAttribute('aria-expanded', String(open));
  };
  menuButton.addEventListener('click', toggleMenu);
  menuButton.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleMenu(); }
  });
  navLinks.addEventListener('click', e => {
    if (e.target.closest('a')) {
      navLinks.classList.remove('is-open');
      menuButton.setAttribute('aria-expanded', 'false');
    }
  });

  /* ---------- value cards: hover accordion ---------- */
  const cards = [...document.querySelectorAll('#valueCards .value-card')];
  const openCard = card => {
    cards.forEach(c => {
      const on = c === card;
      c.classList.toggle('opened', on);
      const img = c.querySelector('.value-card-image');
      if (img) img.classList.toggle('opened', on);
    });
  };
  cards.forEach(card => {
    card.addEventListener('mouseenter', () => openCard(card));
    card.addEventListener('focusin', () => openCard(card));
  });

  /* ---------- scroll-in animations ---------- */
  const animated = document.querySelectorAll('.anim-fade-up, .anim-fade-up-2, .anim-fade-up-3, .anim-img-fade-in, .anim-children-fade-in');
  if (reduced || !('IntersectionObserver' in window)) {
    animated.forEach(el => el.classList.add('is-in'));
  } else {
    const io = new IntersectionObserver((entries, obs) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('is-in'); obs.unobserve(e.target); }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -6% 0px' });
    animated.forEach(el => io.observe(el));
  }

  /* ---------- services: sticky stacking cards -----------------------
     The section is 340vh tall and its container is sticky, so the
     heading stays pinned while each card slides up onto the stack at
     its own resting offset (0 / 80 / 160 / 240px).
     ------------------------------------------------------------------ */
  const stackSection = document.querySelector('.section-services-cards');
  const stackCards = [...document.querySelectorAll('#servicesStack .service-card')];

  if (stackCards.length) {
    const desktop = () => matchMedia('(min-width: 992px)').matches;

    const paint = () => {
      if (reduced) { stackCards.forEach(c => c.classList.add('is-in')); return; }

      if (!desktop()) {
        // Stacking is off below 992px: cards are a normal column, revealed on scroll.
        stackCards.forEach(card => {
          const r = card.getBoundingClientRect();
          if (r.top < innerHeight * 0.88) card.classList.add('is-in');
        });
        return;
      }

      const rect = stackSection.getBoundingClientRect();
      const travel = rect.height - innerHeight;
      // 0 → 1 across the pinned scroll of the section
      const p = travel > 0 ? Math.min(1, Math.max(0, -rect.top / travel)) : 0;

      stackCards.forEach((card, i) => {
        // card 1 is present from the start; the rest land at even steps
        const trigger = i === 0 ? 0 : (i - 0.35) / stackCards.length;
        card.classList.toggle('is-in', p >= trigger);
      });
    };

    let ticking = false;
    const onScroll = () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => { paint(); ticking = false; });
    };
    addEventListener('scroll', onScroll, { passive: true });
    addEventListener('resize', onScroll);
    paint();
  }
})();
</script>
</body>
</html>
