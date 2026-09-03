<header x-data="{ mobileMenuOpen: false, servicesDropdown: false, solutionsDropdown: false, scrolled: false }"
        @scroll.window="scrolled = window.scrollY > 16"
        @keydown.escape.window="mobileMenuOpen = servicesDropdown = solutionsDropdown = false"
        :class="scrolled ? 'site-header site-header--scrolled' : 'site-header'">
    <div class="site-header__inner">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="site-brand" aria-label="ZaroSoft home">
            <img src="{{ asset('images/logo-1.png') }}" alt="ZaroSoft" class="site-brand__logo">
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="site-nav" aria-label="Primary navigation">
            <a href="{{ route('home') }}" @class(['site-nav__link', 'is-active' => request()->routeIs('home')])>Home</a>
            <a href="{{ route('about') }}" @class(['site-nav__link', 'is-active' => request()->routeIs('about')])>About</a>

            <!-- Services Mega Menu -->
            <div class="site-nav__menu" @mouseenter="servicesDropdown = true" @mouseleave="servicesDropdown = false">
                <button type="button" class="site-nav__link site-nav__trigger" @click="servicesDropdown = !servicesDropdown" :aria-expanded="servicesDropdown.toString()" aria-controls="services-menu">
                    <span>Services</span>
                    <svg aria-hidden="true" class="site-nav__chevron" :class="{ 'rotate-180 text-[#007BFF]': servicesDropdown }" viewBox="0 0 20 20" fill="none" stroke="currentColor"><path d="m5 7.5 5 5 5-5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <div id="services-menu" x-cloak x-show="servicesDropdown" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-98"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-2 scale-98"
                     class="site-mega-menu shadow-2xl">
                    @foreach($navServices as $categoryName => $services)
                    <div>
                        <p class="site-mega-menu__label">{{ $categoryName }}</p>
                        @foreach($services as $service)
                        <a href="{{ route('services.show', $service->slug) }}">
                            <div class="w-8 h-8 rounded-lg bg-[#007BFF]/10 text-[#007BFF] flex items-center justify-center shrink-0 mt-0.5 border border-[#007BFF]/20">
                                <x-icon :name="$service->icon" class="w-4 h-4" />
                            </div>
                            <div>
                                <span>{{ $service->title }}</span>
                                <span class="menu-desc">{{ Str::limit($service->short_description, 52) }}</span>
                            </div>
                        </a>
                        @endforeach

                        @if($loop->last)
                        <div class="pt-2 px-3">
                            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#007BFF] hover:text-[#0052b3] !p-0">
                                <span>View all {{ $activeServiceCount }} capabilities</span>
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Solutions Dropdown -->
            <div class="site-nav__menu" @mouseenter="solutionsDropdown = true" @mouseleave="solutionsDropdown = false">
                <button type="button" class="site-nav__link site-nav__trigger" @click="solutionsDropdown = !solutionsDropdown" :aria-expanded="solutionsDropdown.toString()" aria-controls="solutions-menu">
                    <span>Solutions</span>
                    <svg aria-hidden="true" class="site-nav__chevron" :class="{ 'rotate-180 text-[#007BFF]': solutionsDropdown }" viewBox="0 0 20 20" fill="none" stroke="currentColor"><path d="m5 7.5 5 5 5-5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <div id="solutions-menu" x-cloak x-show="solutionsDropdown" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-98"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-2 scale-98"
                     class="site-dropdown shadow-xl">
                    <a href="{{ route('solutions.index') }}">Industry Solutions</a>
                    <a href="{{ route('products.index') }}">Product Suite</a>
                    <a href="{{ route('ai.index') }}" class="flex items-center justify-between">
                        <span>AI & Innovation</span>
                        <span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-[#007BFF]/10 text-[#007BFF]">New</span>
                    </a>
                </div>
            </div>

            <a href="{{ route('portfolio.index') }}" @class(['site-nav__link', 'is-active' => request()->routeIs('portfolio.*')])>Work</a>
            <a href="{{ route('blog.index') }}" @class(['site-nav__link', 'is-active' => request()->routeIs('blog.*')])>Insights</a>
        </nav>

        <!-- Right Actions: CTA & Mobile Hamburger -->
        <div class="site-header__actions">
            <a href="{{ route('contact.index') }}" class="site-button site-button--small group">
                <span>Start a Project</span>
                <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <button type="button" class="site-menu-button" @click="mobileMenuOpen = !mobileMenuOpen" :aria-expanded="mobileMenuOpen.toString()" aria-controls="mobile-menu" aria-label="Toggle navigation menu">
                <svg x-show="!mobileMenuOpen" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 7h16M4 12h16M4 17h16" stroke-width="2" stroke-linecap="round"/></svg>
                <svg x-cloak x-show="mobileMenuOpen" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m6 6 12 12M18 6 6 18" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobile-menu" x-cloak x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="site-mobile-menu">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('services.index') }}">Services</a>
        <a href="{{ route('solutions.index') }}">Solutions</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('portfolio.index') }}">Work & Case Studies</a>
        <a href="{{ route('blog.index') }}">Insights</a>
        <a href="{{ route('faq.index') }}">FAQ</a>
        <a href="{{ route('contact.index') }}" class="site-button">Start a project →</a>
    </div>
</header>

