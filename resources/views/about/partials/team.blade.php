    <!-- 4 Team (founders first, then core team) -->
    <section class="py-24 bg-white relative overflow-hidden" id="team">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-20 sm:space-y-24">
            @php
                $executives = $team->where('is_founder', true);
                $advisors = $team->where('is_founder', false)->where('is_advisor', true);
                $engineers = $team->where('is_founder', false)->where('is_advisor', false);
            @endphp

            <!-- ========================================================================= -->
            <!-- 4.1 EXECUTIVE LEADERSHIP -->
            <!-- ========================================================================= -->
            <div class="space-y-10 sm:space-y-12">
                <!-- Executive Header -->
                <div
                    class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 border-b border-slate-200 pb-6 sm:pb-8">
                    <div class="space-y-3 max-w-2xl reveal">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0F172A] font-heading leading-tight">
                            Executive <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-[#055be8] to-[#2fd5e9]">Leadership</span>
                        </h2>
                    </div>
                    <p class="text-slate-600 text-sm sm:text-base max-w-md lg:text-right reveal" data-delay="100">
                        The minds shaping our vision, strategy, and future.
                    </p>
                </div>

                <!-- Executive Grid (Founder, CEO, CMO, CTO) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-6 lg:gap-7 items-stretch">
                    @foreach($executives as $index => $founder)
                        <!-- @php
                                    $rolePill = 'Executive';
                                    if (str_contains(strtoupper($founder->role_title), 'CEO')) {
                                        $rolePill = 'CEO';
                                    } elseif (str_contains(strtoupper($founder->role_title), 'CTO')) {
                                        $rolePill = 'CTO';
                                    } elseif (str_contains(strtoupper($founder->role_title), 'CMO')) {
                                        $rolePill = 'CMO';
                                    } elseif (str_contains(strtoupper($founder->role_title), 'MD')){
                                        $rolePill = 'MD';
                                    } elseif ($founder->is_founder) {
                                        $rolePill = 'Co-Founder';
                                    }
                                @endphp -->

                        <article class="group reveal" data-delay="{{ $index * 110 }}">
                            <div
                                class="relative h-[380px] sm:h-[400px] lg:h-[415px] rounded-2xl overflow-hidden bg-[#0B132B] border border-white/10 transition-all duration-500 ease-out group-hover:-translate-y-2 group-hover:shadow-[0_28px_60px_-24px_rgba(5,91,232,0.55)] flex flex-col justify-end">

                                <!-- Portrait (monochrome by default, full colour on hover) -->
                                @if($founder->avatar_url)
                                    <x-picture :src="$founder->avatar" alt="Portrait of {{ $founder->name }}" width="760"
                                        height="950"
                                        class="absolute inset-0 w-full h-full object-cover object-top grayscale transition-all duration-700 ease-out group-hover:grayscale-0 group-hover:scale-[1.06]" />
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-[#132139] to-[#0B132B]"
                                        aria-hidden="true">
                                        <span
                                            class="text-5xl font-black text-white/15 font-heading tracking-tight">{{ $founder->initials }}</span>
                                    </div>
                                @endif

                                <!-- Legibility scrim + brand wash on hover -->
                                <div class="absolute inset-0 bg-gradient-to-t from-[#050A16] via-[#050A16]/65 to-[#050A16]/15">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#055be8]/45 via-[#2fd5e9]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <!-- Role pill -->
                                <!-- <span
                                            class="absolute top-4 right-4 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider font-mono bg-white/15 text-white backdrop-blur-md border border-white/20 transition-all duration-300 group-hover:bg-[#055BE8] group-hover:border-[#055BE8] group-hover:shadow-[0_0_15px_rgba(5, 91, 232,0.6)]">
                                            {{ $rolePill }}
                                        </span> -->

                                <!-- Identity block -->
                                <div class="relative z-10 p-5 sm:p-6">
                                    <h3 class="text-lg sm:text-xl font-bold text-white font-heading leading-tight">
                                        {{ $founder->name }}
                                    </h3>
                                    <p class="mt-1.5 text-[11.5px] font-medium tracking-[0.04em] bg-gradient-to-r from-[#f0fbff] via-[#2fd5e9] to-[#5b9cf6] bg-clip-text text-transparent drop-shadow-[0_0_10px_rgba(47,213,233,0.35)] leading-snug line-clamp-2">
                                        {{ $founder->designation }}
                                    </p>

                                    <!-- Expanding detail drawer: always open on touch devices, hover/focus driven for mouse pointers -->
                                    <div
                                        class="grid grid-rows-[1fr] pointer-fine:grid-rows-[0fr] pointer-fine:group-hover:grid-rows-[1fr] pointer-fine:group-focus-within:grid-rows-[1fr] transition-[grid-template-rows] duration-500 ease-out">
                                        <div class="overflow-hidden">
                                            <p class="mt-3 text-xs leading-relaxed text-slate-300 line-clamp-5">
                                                {{ $founder->bio }}
                                            </p>

                                            <!-- @if($founder->skills && is_array($founder->skills))
                                                        <div class="flex flex-wrap gap-1.5 mt-3">
                                                            @foreach(array_slice($founder->skills, 0, 3) as $skill)
                                                                <span
                                                                    class="text-[9px] px-2 py-0.5 rounded bg-white/10 text-slate-200 font-mono font-medium border border-white/10">
                                                                    {{ $skill }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    @endif -->

                                            <div class="flex items-center gap-2 mt-4">
                                                @if($founder->linkedin_url)
                                                    <a href="{{ $founder->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                                                        class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#055be8] hover:border-[#2fd5e9] hover:text-white transition-colors"
                                                        aria-label="LinkedIn profile of {{ $founder->name }}">
                                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                @if($founder->email)
                                                    <a href="mailto:{{ $founder->email }}"
                                                        class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#055be8] hover:border-[#2fd5e9] hover:text-white transition-colors"
                                                        aria-label="Email {{ $founder->name }}">
                                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                        </svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            @if($advisors->isNotEmpty())
                <!-- ========================================================================= -->
                <!-- 4.2 ADVISORY BOARD -->
                <!-- ========================================================================= -->
                <div class="space-y-10 sm:space-y-12 pt-6">
                    <!-- Advisor Header -->
                    <div
                        class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 border-b border-slate-200 pb-6 sm:pb-8">
                        <div class="space-y-3 max-w-2xl reveal">
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0F172A] font-heading leading-tight">
                                Our <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#055be8] to-[#2fd5e9]">Advisors</span>
                            </h2>
                        </div>
                        <p class="text-slate-600 text-sm sm:text-base max-w-md lg:text-right reveal" data-delay="100">
                            Trusted voices guiding our strategy with deep industry experience.
                        </p>
                    </div>

                    <!-- Advisor Grid -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-6 lg:gap-7 items-stretch">
                        @foreach($advisors as $index => $advisor)
                            <article class="group reveal" data-delay="{{ $index * 110 }}">
                                <div
                                    class="relative h-[380px] sm:h-[400px] lg:h-[415px] rounded-2xl overflow-hidden bg-[#0B132B] border border-white/10 transition-all duration-500 ease-out group-hover:-translate-y-2 group-hover:shadow-[0_28px_60px_-24px_rgba(5,91,232,0.55)] flex flex-col justify-end">

                                    <!-- Portrait (monochrome by default, full colour on hover) -->
                                    @if($advisor->avatar_url)
                                        <x-picture :src="$advisor->avatar" alt="Portrait of {{ $advisor->name }}" width="760"
                                            height="950"
                                            class="absolute inset-0 w-full h-full object-cover object-top grayscale transition-all duration-700 ease-out group-hover:grayscale-0 group-hover:scale-[1.06]" />
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-[#132139] to-[#0B132B]"
                                            aria-hidden="true">
                                            <span
                                                class="text-5xl font-black text-white/15 font-heading tracking-tight">{{ $advisor->initials }}</span>
                                        </div>
                                    @endif

                                    <!-- Legibility scrim + brand wash on hover -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#050A16] via-[#050A16]/65 to-[#050A16]/15">
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-[#055be8]/45 via-[#2fd5e9]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    </div>

                                    <!-- Identity block -->
                                    <div class="relative z-10 p-5 sm:p-6">
                                        <h3 class="text-lg sm:text-xl font-bold text-white font-heading leading-tight">
                                            {{ $advisor->name }}
                                        </h3>
                                        <p class="mt-1.5 text-[11.5px] font-medium tracking-[0.04em] bg-gradient-to-r from-[#f0fbff] via-[#2fd5e9] to-[#5b9cf6] bg-clip-text text-transparent drop-shadow-[0_0_10px_rgba(47,213,233,0.35)] leading-snug line-clamp-2">
                                            {{ $advisor->designation }}
                                        </p>

                                        <!-- Expanding detail drawer -->
                                        <div
                                            class="grid grid-rows-[1fr] pointer-fine:grid-rows-[0fr] pointer-fine:group-hover:grid-rows-[1fr] pointer-fine:group-focus-within:grid-rows-[1fr] transition-[grid-template-rows] duration-500 ease-out">
                                            <div class="overflow-hidden">
                                                <p class="mt-3 text-xs leading-relaxed text-slate-300 line-clamp-3">
                                                    {{ $advisor->bio }}
                                                </p>

                                                @if($advisor->skills && is_array($advisor->skills))
                                                    <div class="flex flex-wrap gap-1.5 mt-3">
                                                        @foreach(array_slice($advisor->skills, 0, 3) as $skill)
                                                            <span
                                                                class="text-[9px] px-2 py-0.5 rounded bg-white/10 text-slate-200 font-mono font-medium border border-white/10">
                                                                {{ $skill }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                <div class="flex items-center gap-2 mt-4">
                                                    @if($advisor->linkedin_url)
                                                        <a href="{{ $advisor->linkedin_url }}" target="_blank"
                                                            rel="noopener noreferrer"
                                                            class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#055be8] hover:border-[#2fd5e9] hover:text-white transition-colors"
                                                            aria-label="LinkedIn profile of {{ $advisor->name }}">
                                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                    @if($advisor->email)
                                                        <a href="mailto:{{ $advisor->email }}"
                                                            class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#055be8] hover:border-[#2fd5e9] hover:text-white transition-colors"
                                                            aria-label="Email {{ $advisor->name }}">
                                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($engineers->isNotEmpty())
                <!-- ========================================================================= -->
                <!-- 4.3 ENGINEERING EXCELLENCE -->
                <!-- ========================================================================= -->
                <div class="space-y-10 sm:space-y-12 pt-6">
                    <!-- Engineering Header -->
                    <div
                        class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 border-b border-slate-200 pb-6 sm:pb-8">
                        <div class="space-y-3 max-w-2xl reveal">
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0F172A] font-heading leading-tight">
                                Engineering <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#055be8] to-[#2fd5e9]">Excellence</span>
                            </h2>
                        </div>
                        <p class="text-slate-600 text-sm sm:text-base max-w-md lg:text-right reveal" data-delay="100">
                            The engineers turning ideas into powerful digital solutions.
                        </p>
                    </div>

                    <!-- Engineering Grid -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-6 lg:gap-7 items-stretch">
                        @foreach($engineers as $index => $engineer)
                            <article class="group reveal" data-delay="{{ $index * 110 }}">
                                <div
                                    class="relative h-[380px] sm:h-[400px] lg:h-[415px] rounded-2xl overflow-hidden bg-[#0B132B] border border-white/10 transition-all duration-500 ease-out group-hover:-translate-y-2 group-hover:shadow-[0_28px_60px_-24px_rgba(5,91,232,0.55)] flex flex-col justify-end">

                                    <!-- Portrait (monochrome by default, full colour on hover) -->
                                    @if($engineer->avatar_url)
                                        <x-picture :src="$engineer->avatar" alt="Portrait of {{ $engineer->name }}" width="760"
                                            height="950"
                                            class="absolute inset-0 w-full h-full object-cover object-top grayscale transition-all duration-700 ease-out group-hover:grayscale-0 group-hover:scale-[1.06]" />
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-[#132139] to-[#0B132B]"
                                            aria-hidden="true">
                                            <span
                                                class="text-5xl font-black text-white/15 font-heading tracking-tight">{{ $engineer->initials }}</span>
                                        </div>
                                    @endif

                                    <!-- Legibility scrim + brand wash on hover -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#050A16] via-[#050A16]/65 to-[#050A16]/15">
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-[#055be8]/45 via-[#2fd5e9]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    </div>

                                    <!-- Index marker -->
                                    <!-- <span
                                                    class="absolute top-4 left-4 text-[10px] font-mono font-bold tracking-[0.2em] text-white/45 group-hover:text-emerald-400 transition-colors">
                                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                                </span> -->

                                    <!-- Role pill -->
                                    <!-- <span
                                                    class="absolute top-4 right-4 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider font-mono bg-white/15 text-white backdrop-blur-md border border-white/20 transition-all duration-300 group-hover:bg-emerald-500 group-hover:border-emerald-400 group-hover:shadow-[0_0_15px_rgba(52,211,153,0.6)]">
                                                    {{ $engineer->role_title ?: 'Engineer' }}
                                                </span> -->

                                    <!-- Identity block -->
                                    <div class="relative z-10 p-5 sm:p-6">
                                        <h3 class="text-lg sm:text-xl font-bold text-white font-heading leading-tight">
                                            {{ $engineer->name }}
                                        </h3>
                                        <p class="mt-1.5 text-[11.5px] font-medium tracking-[0.04em] bg-gradient-to-r from-[#f0fbff] via-[#2fd5e9] to-[#5b9cf6] bg-clip-text text-transparent drop-shadow-[0_0_10px_rgba(47,213,233,0.35)] leading-snug line-clamp-2">
                                            {{ $engineer->designation }}
                                        </p>

                                        <!-- Expanding detail drawer -->
                                        <div
                                            class="grid grid-rows-[1fr] pointer-fine:grid-rows-[0fr] pointer-fine:group-hover:grid-rows-[1fr] pointer-fine:group-focus-within:grid-rows-[1fr] transition-[grid-template-rows] duration-500 ease-out">
                                            <div class="overflow-hidden">
                                                <p class="mt-3 text-xs leading-relaxed text-slate-300 line-clamp-3">
                                                    {{ $engineer->bio }}
                                                </p>

                                                @if($engineer->skills && is_array($engineer->skills))
                                                    <div class="flex flex-wrap gap-1.5 mt-3">
                                                        @foreach(array_slice($engineer->skills, 0, 3) as $skill)
                                                            <span
                                                                class="text-[9px] px-2 py-0.5 rounded bg-white/10 text-slate-200 font-mono font-medium border border-white/10">
                                                                {{ $skill }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                <div class="flex items-center gap-2 mt-4">
                                                    @if($engineer->linkedin_url)
                                                        <a href="{{ $engineer->linkedin_url }}" target="_blank"
                                                            rel="noopener noreferrer"
                                                            class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#055be8] hover:border-[#2fd5e9] hover:text-white transition-colors"
                                                            aria-label="LinkedIn profile of {{ $engineer->name }}">
                                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                    @if($engineer->email)
                                                        <a href="mailto:{{ $engineer->email }}"
                                                            class="p-2 rounded-lg bg-white/10 border border-white/15 text-white/80 hover:bg-[#055be8] hover:border-[#2fd5e9] hover:text-white transition-colors"
                                                            aria-label="Email {{ $engineer->name }}">
                                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>


