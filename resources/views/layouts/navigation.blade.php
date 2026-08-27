<header x-data="{ mobileMenuOpen: false, servicesDropdown: false, solutionsDropdown: false, scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="{ 'bg-white/95 dark:bg-[#111827]/95 backdrop-blur-xl border-b border-slate-200/80 dark:border-white/10 shadow-lg shadow-slate-900/5': scrolled, 'bg-white/80 dark:bg-[#111827]/80 backdrop-blur-md': !scrolled }"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo-1.png') }}" alt="Zarosoft Logo" class="h-10" style="height:50px; width:auto;">
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                <a href="{{ route('home') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('home') ? 'text-[#007BFF] font-bold' : 'text-[#111827] dark:text-slate-200 hover:text-[#007BFF] dark:hover:text-[#00D2FF]' }}">
                    Home
                </a>

                <a href="{{ route('about') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('about') ? 'text-[#007BFF] font-bold' : 'text-[#111827] dark:text-slate-200 hover:text-[#007BFF] dark:hover:text-[#00D2FF]' }}">
                    About Us
                </a>

                <!-- Services Dropdown -->
                <div class="relative" @mouseenter="servicesDropdown = true" @mouseleave="servicesDropdown = false">
                    <a href="{{ route('services.index') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg inline-flex items-center gap-1.5 transition-colors {{ request()->routeIs('services.*') ? 'text-[#007BFF] font-bold' : 'text-[#111827] dark:text-slate-200 hover:text-[#007BFF] dark:hover:text-[#00D2FF]' }}">
                        <span>Services</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': servicesDropdown }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>

                    <!-- Mega Dropdown Menu -->
                    <div x-show="servicesDropdown" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-[600px] bg-white dark:bg-[#111827] border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl p-5 grid grid-cols-2 gap-4 z-50">
                        <!-- Dev Column -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 pb-2 border-b border-slate-100 dark:border-slate-800">
                                <span class="p-1.5 rounded-lg bg-[#007BFF]/10 text-[#007BFF]">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </span>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-[#111827] dark:text-white">Development & Cloud</h4>
                            </div>
                            <div class="space-y-1">
                                <a href="{{ route('services.show', 'website-development') }}" class="group flex items-start p-2 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition-colors">
                                    <div>
                                        <p class="text-xs font-bold text-slate-800 dark:text-slate-200 group-hover:text-[#007BFF]">Web Development</p>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400">High-performance modern web apps</p>
                                    </div>
                                </a>
                                <a href="{{ route('services.show', 'mobile-app-development') }}" class="group flex items-start p-2 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition-colors">
                                    <div>
                                        <p class="text-xs font-bold text-slate-800 dark:text-slate-200 group-hover:text-[#007BFF]">Mobile App Development</p>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400">Android, iOS & Flutter apps</p>
                                    </div>
                                </a>
                                <a href="{{ route('services.show', 'erp-development') }}" class="group flex items-start p-2 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition-colors">
                                    <div>
                                        <p class="text-xs font-bold text-slate-800 dark:text-slate-200 group-hover:text-[#007BFF]">Software & ERP</p>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400">Custom enterprise business software</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Design & Marketing Column -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 pb-2 border-b border-slate-100 dark:border-slate-800">
                                <span class="p-1.5 rounded-lg bg-[#00D2FF]/15 text-[#007BFF] dark:text-[#00D2FF]">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                                </span>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-[#111827] dark:text-white">Design & Growth</h4>
                            </div>
                            <div class="space-y-1">
                                <a href="{{ route('services.show', 'ui-ux-design') }}" class="group flex items-start p-2 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition-colors">
                                    <div>
                                        <p class="text-xs font-bold text-slate-800 dark:text-slate-200 group-hover:text-[#007BFF]">UI/UX Design</p>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400">Intuitive interface designs that convert</p>
                                    </div>
                                </a>
                                <a href="{{ route('services.show', 'digital-marketing') }}" class="group flex items-start p-2 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition-colors">
                                    <div>
                                        <p class="text-xs font-bold text-slate-800 dark:text-slate-200 group-hover:text-[#007BFF]">Digital Marketing</p>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400">SEO, ads and content growth</p>
                                    </div>
                                </a>
                                <div class="pt-2">
                                    <a href="{{ route('services.index') }}" class="block text-center py-2 px-3 rounded-lg bg-[#007BFF]/10 text-xs font-bold text-[#007BFF] hover:bg-[#007BFF] hover:text-white transition-colors">
                                        View All Services →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solutions Dropdown -->
                <div class="relative" @mouseenter="solutionsDropdown = true" @mouseleave="solutionsDropdown = false">
                    <a href="{{ route('solutions.index') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg inline-flex items-center gap-1.5 transition-colors {{ request()->routeIs('solutions.*') ? 'text-[#007BFF] font-bold' : 'text-[#111827] dark:text-slate-200 hover:text-[#007BFF] dark:hover:text-[#00D2FF]' }}">
                        <span>Solutions</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': solutionsDropdown }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>

                    <div x-show="solutionsDropdown" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute top-full left-0 mt-2 w-56 bg-white dark:bg-[#111827] border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl p-3 space-y-1 z-50">
                        <a href="{{ route('solutions.index') }}" class="block px-3 py-2 text-xs font-bold text-slate-800 dark:text-slate-200 hover:text-[#007BFF] hover:bg-slate-50 dark:hover:bg-slate-800/60 rounded-lg">ERP Solutions</a>
                        <a href="{{ route('solutions.index') }}" class="block px-3 py-2 text-xs font-bold text-slate-800 dark:text-slate-200 hover:text-[#007BFF] hover:bg-slate-50 dark:hover:bg-slate-800/60 rounded-lg">CRM Solutions</a>
                        <a href="{{ route('solutions.index') }}" class="block px-3 py-2 text-xs font-bold text-slate-800 dark:text-slate-200 hover:text-[#007BFF] hover:bg-slate-50 dark:hover:bg-slate-800/60 rounded-lg">E-Commerce Platforms</a>
                        <a href="{{ route('ai.index') }}" class="block px-3 py-2 text-xs font-bold text-[#007BFF] dark:text-[#00D2FF] hover:bg-slate-50 dark:hover:bg-slate-800/60 rounded-lg">AI & Innovation ✨</a>
                    </div>
                </div>

                <a href="{{ route('portfolio.index') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('portfolio.*') ? 'text-[#007BFF] font-bold' : 'text-[#111827] dark:text-slate-200 hover:text-[#007BFF] dark:hover:text-[#00D2FF]' }}">
                    Portfolio
                </a>

                <a href="{{ route('blog.index') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('blog.*') ? 'text-[#007BFF] font-bold' : 'text-[#111827] dark:text-slate-200 hover:text-[#007BFF] dark:hover:text-[#00D2FF]' }}">
                    Blog
                </a>

                <a href="{{ route('contact.index') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('contact.*') ? 'text-[#007BFF] font-bold' : 'text-[#111827] dark:text-slate-200 hover:text-[#007BFF] dark:hover:text-[#00D2FF]' }}">
                    Contact
                </a>
            </nav>

            <!-- Right Controls: Get A Quote Button + Mobile Hamburger -->
            <div class="flex items-center gap-2.5 sm:gap-3">
                <!-- Get A Quote Button (Primary Color #007BFF) -->
                <a href="{{ route('contact.index') }}" 
                   class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold tracking-wide text-white bg-[#007BFF] hover:bg-[#0062cc] shadow-md shadow-[#007BFF]/25 hover:shadow-lg hover:shadow-[#007BFF]/40 hover:-translate-y-0.5 transition-all duration-300 group">
                    <span>Get A Quote</span>
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-xl text-[#111827] dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors lg:hidden">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden bg-white/98 dark:bg-[#111827]/98 backdrop-blur-2xl border-b border-slate-200 dark:border-slate-800 px-6 py-6 space-y-3">
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-bold text-[#111827] dark:text-white hover:text-[#007BFF]">Home</a>
        <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-base font-bold text-slate-700 dark:text-slate-200 hover:text-[#007BFF]">About Us</a>
        <a href="{{ route('services.index') }}" class="block px-3 py-2 rounded-lg text-base font-bold text-slate-700 dark:text-slate-200 hover:text-[#007BFF]">Services</a>
        <a href="{{ route('solutions.index') }}" class="block px-3 py-2 rounded-lg text-base font-bold text-slate-700 dark:text-slate-200 hover:text-[#007BFF]">Solutions</a>
        <a href="{{ route('portfolio.index') }}" class="block px-3 py-2 rounded-lg text-base font-bold text-slate-700 dark:text-slate-200 hover:text-[#007BFF]">Portfolio</a>
        <a href="{{ route('blog.index') }}" class="block px-3 py-2 rounded-lg text-base font-bold text-slate-700 dark:text-slate-200 hover:text-[#007BFF]">Blog</a>
        <a href="{{ route('contact.index') }}" class="block px-3 py-2 rounded-lg text-base font-bold text-slate-700 dark:text-slate-200 hover:text-[#007BFF]">Contact</a>
        <div class="pt-4 border-t border-slate-200 dark:border-slate-800 space-y-3">
            <a href="{{ route('contact.index') }}" class="w-full text-center block py-3 px-4 rounded-full bg-[#007BFF] hover:bg-[#0062cc] text-white font-bold shadow-lg shadow-[#007BFF]/30">
                Get A Quote →
            </a>
        </div>
    </div>
</header>
