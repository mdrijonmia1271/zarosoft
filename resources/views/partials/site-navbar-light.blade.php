@php
  $navItems = [
    ['Home', route('home'), 'home'],
    ['Services', route('services.index'), 'services.*'],
    ['About', route('about'), 'about'],
    ['Case Studies', route('portfolio.index'), 'portfolio.*'],
    ['Blog', route('blog.index'), 'blog.*'],
  ];
@endphp
<div role="banner" class="navbar">
  <div class="navbar-row">
    <a href="{{ route('home') }}" class="logo">
      <img src="{{ asset('images/logo-1.png') }}" alt="{{ setting('site_name', 'ZaroSoft') }}">
    </a>
    <nav class="nav-links" aria-label="Main">
      @foreach($navItems as [$label, $url, $pattern])
        @if($pattern && request()->routeIs($pattern))
        <a href="{{ $url }}" aria-current="page" class="nav-link is-current">{{ $label }}</a>
        @else
        <a href="{{ $url }}" class="nav-link">{{ $label }}</a>
        @endif
      @endforeach
      <a href="{{ route('contact.index') }}" class="nav-contact-button">Contact</a>
    </nav>
    <button type="button" class="menu-button" id="menuButton" aria-label="Menu" aria-expanded="false">
      <img src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/6a21f6886f531d84b90b4045_menu-lines-dark.svg" loading="lazy" width="24" height="24" alt="">
    </button>
  </div>
  <div class="nav-mobile" id="navMobile">
    @foreach($navItems as [$label, $url])
    <a href="{{ $url }}">{{ $label }}</a>
    @endforeach
    <a href="{{ route('contact.index') }}">Contact</a>
  </div>
</div>
<script>
(function () {
  var menuButton = document.getElementById('menuButton');
  var navMobile = document.getElementById('navMobile');
  menuButton.addEventListener('click', function () {
    var open = navMobile.classList.toggle('is-open');
    menuButton.setAttribute('aria-expanded', String(open));
  });
  navMobile.addEventListener('click', function (e) {
    if (e.target.closest('a')) {
      navMobile.classList.remove('is-open');
      menuButton.setAttribute('aria-expanded', 'false');
    }
  });
})();
</script>
