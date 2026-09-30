<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Contact {{ setting('site_name', 'ZaroSoft') }} - Start Your Project</title>
<meta name="description" content="Tell us about your operations, and we'll determine the right next step.">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ setting('site_name', 'ZaroSoft') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Contact {{ setting('site_name', 'ZaroSoft') }} - Start Your Project">
<meta property="og:image" content="{{ asset('images/zarosoft-og.jpg') }}">
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
  --card:#e8f1fd;
  --white:#fff;
  --radius-lg:26px;
  --radius-xl:30px;
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

/* ---------- Hero (left aligned on this page) ---------- */
.hero{padding:56px 0 42px}
.hero h1{font-size:46px;font-weight:400;letter-spacing:-.02em;line-height:1.16;color:var(--ink)}
.hero p{margin-top:14px;font-size:19px;font-weight:400;color:var(--ink-soft);line-height:1.55}

/* ---------- Form status ---------- */
.notice{
  margin-bottom:24px;padding:18px 24px;border-radius:22px;
  font-size:15.5px;font-weight:400;line-height:1.6;
}
.notice strong{font-weight:500}
.notice.success{background:#e6f6ee;color:#16603c}
.notice.error{background:#fdecef;color:#8f1f35}
.notice ul{margin:6px 0 0 18px}

/* ---------- Contact card ---------- */
.contact-card{
  display:flex;gap:53px;
  background:var(--card);border-radius:var(--radius-xl);padding:16px;
  margin-bottom:104px;
}
.contact-photo{
  flex:0 0 365px;border-radius:24px;overflow:hidden;
  background-position:center;background-size:cover;background-repeat:no-repeat;
  min-height:703px;
}
.contact-form{flex:1;padding:14px 1px 0 0}
.form-grid{display:grid;grid-template-columns:1fr 1fr;column-gap:39px;row-gap:36px}
.field{display:flex;flex-direction:column}
.field.full{grid-column:1 / -1}
.field label{margin-bottom:12px;font-size:16px;font-weight:400;color:#1f2f55}
.field input,
.field select,
.field textarea{
  font-family:inherit;font-size:16px;font-weight:400;color:var(--ink);
  background:var(--white);border:0;border-radius:999px;
  height:57px;padding:0 26px;outline:none;
  transition:box-shadow .2s ease;
}
.field textarea{
  height:160px;border-radius:28px;padding:18px 26px;resize:vertical;line-height:1.6;
}
.field input::placeholder,
.field textarea::placeholder{color:#98a6bf}
.field input:focus,
.field select:focus,
.field textarea:focus{box-shadow:0 0 0 2px rgba(5,91,232,.35)}
.field.has-error input,
.field.has-error select,
.field.has-error textarea{box-shadow:0 0 0 2px rgba(214,48,80,.45)}
.field-error{margin-top:8px;padding-left:10px;font-size:13.5px;font-weight:400;color:#b3223f}
.field select{
  color:#98a6bf;cursor:pointer;
  -webkit-appearance:none;appearance:none;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 20 20' fill='none'%3E%3Cpath d='m5 8 5 5 5-5' stroke='%234a4866' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
  background-repeat:no-repeat;background-position:right 26px center;
  padding-right:56px;
}
.field select:valid{color:var(--ink)}
.btn-submit{
  margin-top:36px;
  font-family:inherit;font-size:17px;font-weight:500;color:#fff;cursor:pointer;
  background:var(--blue);border:0;border-radius:999px;padding:15px 34px;
  transition:background .2s ease;
}
.btn-submit:hover{background:var(--blue-dark)}
.btn-submit:disabled{opacity:.6;cursor:wait}

/* ---------- Alternative contact options ---------- */
.alt-head{font-size:34px;font-weight:400;letter-spacing:-.02em;margin-bottom:22px}
/* cards size to their content and wrap */
.alt-list{display:flex;flex-wrap:wrap;gap:18px 20px;padding-bottom:104px}
.alt-card{
  display:block;
  background:var(--card);border-radius:22px;padding:28px 24px 30px;
  transition:background .2s ease;
}
.alt-card:hover{background:#dde9fa}
.alt-card span{display:block;font-size:17px;font-weight:400;color:var(--muted)}
.alt-card strong{display:block;margin-top:6px;font-size:26px;font-weight:400;color:var(--ink);letter-spacing:-.01em}

/* ---------- Footer ---------- */
.footer{background:var(--card);padding:64px 0 28px}
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
  .hero h1{font-size:36px}
  .contact-card{flex-direction:column;gap:26px}
  .contact-photo{flex:none;width:100%;min-height:300px}
  .contact-form{padding:0}
  .footer-grid{grid-template-columns:1fr 1fr 1fr}
}
@media (max-width:640px){
  .shell{padding:0 16px}
  .navbar{padding:24px 20px 0}
  .nav-mobile{top:90px;left:20px;right:20px}
  .logo img{height:40px}
  .hero{padding:36px 0 28px}
  .hero h1{font-size:30px}
  .hero p{font-size:16px}
  .contact-card{padding:12px;margin-bottom:64px}
  .form-grid{grid-template-columns:1fr;row-gap:24px}
  .alt-head{font-size:27px}
  .alt-list{padding-bottom:64px}
  .alt-card strong{font-size:21px}
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

  // Other pages link here with ?service=… ; keep that choice even when it is
  // not one of the listed services (e.g. "Case Study Inquiry: …").
  $selectedService = old('service_interest', $preselectedService);
  $serviceOptions = $services->pluck('title');
  if (filled($selectedService) && ! $serviceOptions->contains($selectedService)) {
      $serviceOptions->prepend($selectedService);
  }
  $serviceOptions->push('Other');
@endphp

<!-- ================= NAV ================= -->
@include('partials.site-navbar-light')

<!-- ================= HERO ================= -->
<section class="hero">
  <div class="shell">
    <h1>Let&rsquo;s Bring Structure to Your Operations</h1>
    <p>Tell us about your operations, and we&rsquo;ll determine the right next step.</p>
  </div>
</section>

<!-- ============ CONTACT FORM CARD ============ -->
<section class="shell">
  @if(session('success'))
  <div class="notice success" role="status">{{ session('success') }}</div>
  @endif
  @if(session('error'))
  <div class="notice error" role="alert">{{ session('error') }}</div>
  @endif

  <div class="contact-card" id="contact-form">
    <div class="contact-photo" style="background-image:url('{{ asset('images/team-collaboration.jpg') }}')"></div>

    <form class="contact-form" action="{{ route('contact.submit') }}" method="POST">
      @csrf
      <div class="form-grid">
        <div @class(['field', 'has-error' => $errors->has('name')])>
          <label for="fullname">Full Name</label>
          <input id="fullname" name="name" type="text" value="{{ old('name') }}" placeholder="Example Text" required maxlength="100" autocomplete="name">
          @error('name')<p class="field-error">{{ $message }}</p>@enderror
        </div>
        <div @class(['field', 'has-error' => $errors->has('company')])>
          <label for="company">Company</label>
          <input id="company" name="company" type="text" value="{{ old('company') }}" placeholder="Your Company" maxlength="150" autocomplete="organization">
          @error('company')<p class="field-error">{{ $message }}</p>@enderror
        </div>

        <div @class(['field', 'has-error' => $errors->has('email')])>
          <label for="email">Work Email</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="email@company.com" required maxlength="150" autocomplete="email">
          @error('email')<p class="field-error">{{ $message }}</p>@enderror
        </div>
        <div @class(['field', 'has-error' => $errors->has('phone')])>
          <label for="phone">Phone (Optional)</label>
          <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="+12345" maxlength="30" autocomplete="tel">
          @error('phone')<p class="field-error">{{ $message }}</p>@enderror
        </div>

        <div @class(['field', 'has-error' => $errors->has('role')])>
          <label for="role">Role</label>
          <input id="role" name="role" type="text" value="{{ old('role') }}" placeholder="Your Role" maxlength="100" autocomplete="organization-title">
          @error('role')<p class="field-error">{{ $message }}</p>@enderror
        </div>
        <div @class(['field', 'has-error' => $errors->has('service_interest')])>
          <label for="engagement">Engagement Type</label>
          <select id="engagement" name="service_interest" required>
            <option value="" disabled @selected(blank($selectedService))>Select one...</option>
            @foreach($serviceOptions as $option)
            <option value="{{ $option }}" @selected($option === $selectedService)>{{ $option }}</option>
            @endforeach
          </select>
          @error('service_interest')<p class="field-error">{{ $message }}</p>@enderror
        </div>

        <div @class(['field', 'full', 'has-error' => $errors->has('message')])>
          <label for="overview">Project Overview</label>
          <textarea id="overview" name="message" placeholder="Tell us everything" required minlength="10" maxlength="5000">{{ old('message') }}</textarea>
          @error('message')<p class="field-error">{{ $message }}</p>@enderror
        </div>
      </div>

      <button class="btn-submit" type="submit">Request Consultation</button>
    </form>
  </div>
</section>

<!-- ======= ALTERNATIVE CONTACT OPTIONS ======= -->
<section class="shell">
  <h2 class="alt-head">Alternative Contact Options</h2>
  <div class="alt-list">
    @if($email = setting('company_email'))
    <a href="mailto:{{ $email }}" class="alt-card">
      <span>Email Us</span>
      <strong>{{ $email }}</strong>
    </a>
    @endif
    @if($phone = setting('company_phone'))
    <a href="tel:{{ preg_replace('/[^\d+]/', '', $phone) }}" class="alt-card">
      <span>Call Us</span>
      <strong>{{ $phone }}</strong>
    </a>
    @endif
    <div class="alt-card">
      <span>Come to Our Office</span>
      <strong>{{ setting('company_address', 'Dhaka, Bangladesh') }}</strong>
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
    ['.hero',          ['h1', 'p'], 140],
    ['.contact-card',  ['.contact-photo', '.field', '.btn-submit'], 90],
    ['.alt-list',      ['.alt-card'], 130],
    ['.footer-grid',   [':scope > div'], 110]
  ];

  // these fade in place instead of sliding up
  var fadeOnly = ['.contact-photo'];

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

  // the section heading reveals on its own
  var altHead = document.querySelector('.alt-head');
  if (altHead) altHead.classList.add('reveal');

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

// Stop double submissions while the request is in flight
document.querySelector('.contact-form').addEventListener('submit', function () {
  this.querySelector('.btn-submit').disabled = true;
});
</script>

</body>
</html>
