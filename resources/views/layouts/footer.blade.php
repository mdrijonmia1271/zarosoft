<footer class="relative bg-[#111827] text-slate-400 pt-12 pb-6 border-t border-slate-800/80 overflow-hidden">
    <!-- Ambient Blue & Cyan Glows -->
    <div class="absolute -top-24 left-1/4 w-72 h-72 bg-[#007BFF]/10 rounded-full blur-3xl pointer-events-none animate-pulse-glow"></div>
    <div class="absolute -bottom-24 right-1/4 w-72 h-72 bg-[#00D2FF]/10 rounded-full blur-3xl pointer-events-none animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Top Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-7 pb-8 border-b border-slate-800/80 reveal">
            
            <!-- Brand Column -->
            <div class="lg:col-span-2 space-y-3">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-1.png') }}" alt="Zarosoft Logo" class="h-8 brightness-110" style="height:38px; width:auto;">
                </a>

                <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                    We build powerful software, modern websites & digital solutions that help businesses grow, automate, and succeed in the digital world.
                </p>

                <!-- Social Media Icons -->
                <div class="flex items-center gap-2 pt-1">
                    <a href="https://facebook.com" target="_blank" class="w-8 h-8 rounded-full bg-[#1f2937] hover:bg-[#007BFF] text-slate-300 hover:text-white border border-slate-700/80 hover:border-[#007BFF] flex items-center justify-center text-xs transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.356 5 15.564 5H18V0h-3.808C10.595 0 9 1.583 9 4.615V8z"/></svg>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="w-8 h-8 rounded-full bg-[#1f2937] hover:bg-[#007BFF] text-slate-300 hover:text-white border border-slate-700/80 hover:border-[#007BFF] flex items-center justify-center text-xs transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="w-8 h-8 rounded-full bg-[#1f2937] hover:bg-[#007BFF] text-slate-300 hover:text-white border border-slate-700/80 hover:border-[#007BFF] flex items-center justify-center text-xs transition-all">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="w-8 h-8 rounded-full bg-[#1f2937] hover:bg-[#007BFF] text-slate-300 hover:text-white border border-slate-700/80 hover:border-[#007BFF] flex items-center justify-center text-xs transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="w-8 h-8 rounded-full bg-[#1f2937] hover:bg-[#007BFF] text-slate-300 hover:text-white border border-slate-700/80 hover:border-[#007BFF] flex items-center justify-center text-xs transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Services Column -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-2.5">Services</h4>
                <ul class="space-y-1.5 text-xs">
                    <li><a href="{{ route('services.show', 'erp-development') }}" class="hover:text-[#00D2FF] transition-colors">Software Development</a></li>
                    <li><a href="{{ route('services.show', 'website-development') }}" class="hover:text-[#00D2FF] transition-colors">Web Development</a></li>
                    <li><a href="{{ route('services.show', 'mobile-app-development') }}" class="hover:text-[#00D2FF] transition-colors">Mobile App Development</a></li>
                    <li><a href="{{ route('services.show', 'ui-ux-design') }}" class="hover:text-[#00D2FF] transition-colors">UI/UX Design</a></li>
                    <li><a href="{{ route('services.show', 'digital-marketing') }}" class="hover:text-[#00D2FF] transition-colors">Digital Marketing</a></li>
                    <li><a href="{{ route('services.show', 'cloud-solutions') }}" class="hover:text-[#00D2FF] transition-colors">Cloud & DevOps</a></li>
                </ul>
            </div>

            <!-- Solutions Column -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-2.5">Solutions</h4>
                <ul class="space-y-1.5 text-xs">
                    <li><a href="{{ route('solutions.index') }}" class="hover:text-[#00D2FF] transition-colors">ERP Solutions</a></li>
                    <li><a href="{{ route('solutions.index') }}" class="hover:text-[#00D2FF] transition-colors">CRM Solutions</a></li>
                    <li><a href="{{ route('solutions.index') }}" class="hover:text-[#00D2FF] transition-colors">E-commerce Solutions</a></li>
                    <li><a href="{{ route('services.show', 'saas-development') }}" class="hover:text-[#00D2FF] transition-colors">SaaS Development</a></li>
                    <li><a href="{{ route('solutions.index') }}" class="hover:text-[#00D2FF] transition-colors">Business Automation</a></li>
                    <li><a href="{{ route('solutions.index') }}" class="hover:text-[#00D2FF] transition-colors">IT Consulting</a></li>
                </ul>
            </div>

            <!-- Company Column -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-2.5">Company</h4>
                <ul class="space-y-1.5 text-xs">
                    <li><a href="{{ route('about') }}" class="hover:text-[#00D2FF] transition-colors">About Us</a></li>
                    <li><a href="{{ route('about') }}#team" class="hover:text-[#00D2FF] transition-colors">Our Team</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-[#00D2FF] transition-colors">Careers</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-[#00D2FF] transition-colors">Blog</a></li>
                    <li><a href="{{ route('home') }}" class="hover:text-[#00D2FF] transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('faq.index') }}" class="hover:text-[#00D2FF] transition-colors">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Contact Us Column -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-2.5">Contact Us</h4>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li class="flex items-start gap-2">
                        <span class="text-[#00D2FF] shrink-0 mt-0.5">📍</span>
                        <span>House 12, Road 5, Dhanmondi, Dhaka-1205</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-[#00D2FF] shrink-0">📞</span>
                        <a href="tel:+8801712345678" class="hover:text-[#00D2FF] transition-colors">+880 1712 345678</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-[#00D2FF] shrink-0">✉️</span>
                        <a href="mailto:info@zarosoft.com" class="hover:text-[#00D2FF] transition-colors">info@zarosoft.com</a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="pt-5 flex items-center justify-between text-xs text-slate-400">
            <p>© {{ date('Y') }} ZaroSoft. All Rights Reserved.</p>

            <!-- Scroll to Top Button -->
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                    class="w-8 h-8 rounded-full bg-[#007BFF] hover:bg-[#00D2FF] text-white flex items-center justify-center shadow-md shadow-[#007BFF]/30 transition-transform hover:-translate-y-0.5"
                    title="Scroll to top">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                </svg>
            </button>
        </div>
    </div>
</footer>
