<footer class="site-footer bg-[#0B132B] text-slate-300 border-t border-slate-800">
    <div class="site-footer__inner max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="site-footer__grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
            
            <!-- Column 1: Brand, Mission & Status (Spans 2 cols on desktop) -->
            <div class="site-footer__brand lg:col-span-2 space-y-4">
                <a href="{{ route('home') }}" aria-label="ZaroSoft home" class="inline-block">
                    <img src="{{ asset('images/logo-1.png') }}" alt="ZaroSoft" class="h-9 w-auto brightness-0 invert opacity-95">
                </a>
                <p class="text-xs text-slate-400 max-w-sm leading-relaxed">
                    We design and engineer bespoke software, high-concurrency cloud applications, and automated digital workflows that help ambitious teams grow with confidence.
                </p>

                {{-- A stated SLA commitment, not a live status feed. --}}
                <div class="pt-1">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-mono">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3 5 6v6c0 4.4 3 8.2 7 9 4-.8 7-4.6 7-9V6l-7-3Z"/><path d="m9 12 2 2 4-4"/></svg>
                        <span>{{ setting('stat_uptime', '99.9%') }} uptime SLA on managed systems</span>
                    </span>
                </div>

                <!-- Social Icons (managed in Admin → Settings) -->
                @php
                    $socials = array_filter([
                        'Facebook' => setting('social_facebook'),
                        'LinkedIn' => setting('social_linkedin'),
                        'GitHub'   => setting('social_github'),
                        'Twitter'  => setting('social_twitter'),
                    ]);
                @endphp
                @if($socials)
                <div class="site-socials flex items-center gap-2.5 pt-2" aria-label="Social links">
                    @foreach($socials as $network => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ setting('site_name', 'ZaroSoft') }} on {{ $network }}" class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-[#007BFF] hover:border-[#007BFF] transition-all">
                        @switch($network)
                            @case('Facebook')
                                <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M14 8h3.5L18 4H14c-3.1 0-5 1.9-5 5v3H6v4h3v8h4v-8h3.5l.5-4H13V9c0-.7.3-1 1-1Z"/></svg>
                                @break
                            @case('LinkedIn')
                                <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M6.5 8.5H3V21h3.5V8.5ZM4.75 3A2.05 2.05 0 1 0 4.75 7.1 2.05 2.05 0 0 0 4.75 3ZM21 13.8c0-3.8-2-5.6-4.7-5.6-2.2 0-3.2 1.2-3.7 2v-1.7H9.1V21h3.5v-6.2c0-1.6.3-3.1 2.3-3.1 2 0 2 1.8 2 3.2V21H21v-7.2Z"/></svg>
                                @break
                            @case('GitHub')
                                <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                                @break
                            @default
                                <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M18.9 2H22l-6.8 7.8L23 22h-6.3l-4.9-6.4L6.2 22H3l7.3-8.3L2.4 2h6.4l4.4 5.9L18.9 2Zm-1.1 18h1.7L8.3 3.8H6.5L17.8 20Z"/></svg>
                        @endswitch
                    </a>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Column 2: Capabilities -->
            <div class="space-y-3">
                <h3 class="text-xs font-bold uppercase tracking-wider text-white font-heading">Capabilities</h3>
                <ul class="space-y-2 text-xs">
                    @foreach($navServices->flatten()->take(5) as $service)
                    <li><a href="{{ route('services.show', $service->slug) }}" class="text-slate-400 hover:text-white transition-colors">{{ $service->title }}</a></li>
                    @endforeach
                    <li><a href="{{ route('services.index') }}" class="text-[#38BDF8] font-bold hover:underline">All {{ $activeServiceCount }} Services →</a></li>
                </ul>
            </div>

            <!-- Column 3: Explore -->
            <div class="space-y-3">
                <h3 class="text-xs font-bold uppercase tracking-wider text-white font-heading">Explore</h3>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('solutions.index') }}" class="text-slate-400 hover:text-white transition-colors">Industry Solutions</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-slate-400 hover:text-white transition-colors">Product Suite</a></li>
                    <li><a href="{{ route('portfolio.index') }}" class="text-slate-400 hover:text-white transition-colors">Work & Case Studies</a></li>
                    <li><a href="{{ route('ai.index') }}" class="text-slate-400 hover:text-white transition-colors">AI & Automation</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-slate-400 hover:text-white transition-colors">Engineering Insights</a></li>
                    <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-white transition-colors">About {{ setting('site_name', 'ZaroSoft') }}</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact & Location -->
            <div class="space-y-3">
                <h3 class="text-xs font-bold uppercase tracking-wider text-white font-heading">Get in Touch</h3>
                <ul class="space-y-2.5 text-xs text-slate-400">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-[#38BDF8] shrink-0 mt-0.5" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M20 10.5C20 16 12 21 12 21S4 16 4 10.5A8 8 0 1 1 20 10.5Z" stroke-width="1.8"/><circle cx="12" cy="10" r="2.5" stroke-width="1.8"/></svg>
                        <span>{{ setting('company_address', 'Dhaka, Bangladesh') }}</span>
                    </li>
                    @if($phone = setting('company_phone'))
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#38BDF8] shrink-0" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 4h3l1.5 4-2 1.5a15 15 0 0 0 7 7l1.5-2 4 1.5v3c0 1.1-.9 2-2 2C10.3 21 3 13.7 3 6c0-1.1.9-2 2-2Z" stroke-width="1.8"/></svg>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" class="hover:text-white transition-colors">{{ $phone }}</a>
                    </li>
                    @endif
                    @if($email = setting('company_email'))
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#38BDF8] shrink-0" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="5" width="18" height="14" rx="2" stroke-width="1.8"/><path d="m4 7 8 6 8-6" stroke-width="1.8"/></svg>
                        <a href="mailto:{{ $email }}" class="hover:text-white transition-colors">{{ $email }}</a>
                    </li>
                    @endif
                    @if($hours = setting('working_hours'))
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-[#38BDF8] shrink-0 mt-0.5" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="9" stroke-width="1.8"/><path d="M12 7v5l3 2" stroke-width="1.8" stroke-linecap="round"/></svg>
                        <span>{{ $hours }}</span>
                    </li>
                    @endif
                </ul>
                <div class="pt-2">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#38BDF8] hover:text-white transition-colors">
                        <span>Book an Architecture Call</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Footer Bottom Bar -->
        <div class="site-footer__bottom mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>© {{ date('Y') }} {{ setting('site_name', 'ZaroSoft') }}. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('faq.index') }}" class="hover:text-slate-300 transition-colors">FAQ</a>
                <a href="{{ route('contact.index') }}" class="hover:text-slate-300 transition-colors">Start a Project</a>
                <button type="button" 
                        onclick="window.scrollTo({top: 0, behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'})" 
                        class="p-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-slate-700 transition-all flex items-center gap-1 text-[11px]" 
                        aria-label="Back to top">
                    <span>Top</span>
                    <svg class="w-3.5 h-3.5" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m6 11 6-6 6 6M12 5v14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>
    </div>
</footer>

