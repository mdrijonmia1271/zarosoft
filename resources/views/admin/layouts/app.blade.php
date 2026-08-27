<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Command Center') — ZaroSoft</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Always use light mode -->
    <script>
        document.documentElement.classList.remove('dark');
        localStorage.removeItem('theme');
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100 dark:bg-[#07090e] text-slate-900 dark:text-slate-100 min-h-screen flex" x-data="{ sidebarOpen: false }">
    
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-[#0d111a] border-r border-slate-200 dark:border-white/10 flex flex-col justify-between transition-transform duration-300 lg:translate-x-0"
           :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">
        
        <div class="p-6 space-y-6">
            <!-- Brand Logo -->
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-1.png') }}" alt="Zarosoft Logo" class="h-8" style="height:36px; width:auto;">
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Items -->
            <nav class="space-y-1.5 text-xs font-semibold">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">📊</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.leads.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.leads.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-base">💼</span>
                        <span>Leads (Mini CRM)</span>
                    </div>
                    @php
                    $newLeads = \App\Models\ContactRequest::where('status', 'new')->count();
                    @endphp
                    @if($newLeads > 0)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500 text-white">
                        {{ $newLeads }}
                    </span>
                    @endif
                </a>

                <div class="pt-4 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 px-3">
                    Content Management
                </div>

                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">🛠️</span>
                    <span>Services (17)</span>
                </a>

                <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">🚀</span>
                    <span>Portfolio & Case Studies</span>
                </a>

                <a href="{{ route('admin.blogs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.blogs.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">📝</span>
                    <span>Blog Articles</span>
                </a>

                <a href="{{ route('admin.team.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.team.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">👥</span>
                    <span>Team Members</span>
                </a>

                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.testimonials.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">⭐</span>
                    <span>Testimonials</span>
                </a>

                <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.faqs.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">❓</span>
                    <span>FAQs</span>
                </a>

                <div class="pt-4 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 px-3">
                    System & Settings
                </div>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-[#007BFF] text-white shadow-md shadow-[#007BFF]/25' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}">
                    <span class="text-base">⚙️</span>
                    <span>Site Settings & SEO</span>
                </a>

                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white transition-colors">
                    <span class="text-base">🌐</span>
                    <span>View Public Website ↗</span>
                </a>
            </nav>
        </div>

        <!-- Admin Profile & Logout -->
        <div class="p-4 border-t border-slate-200 dark:border-slate-800">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-[#007BFF]/20 text-[#00D2FF] font-bold flex items-center justify-center text-xs">
                        {{ substr(auth()->user()->name ?? 'Admin', 0, 2) }}
                    </div>
                    <div class="truncate">
                        <p class="text-xs font-bold text-slate-900 dark:text-white truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@zarosoft.com' }}</p>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-500 transition-colors" title="Logout">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="lg:pl-64 flex-1 flex flex-col min-w-0">
        <!-- Top App Bar -->
        <header class="h-16 bg-white dark:bg-[#0d111a] border-b border-slate-200 dark:border-white/10 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-600 dark:text-slate-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                    @yield('header', 'Dashboard')
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#007BFF]/10 text-[#007BFF] dark:text-[#00D2FF] text-xs font-bold hover:bg-[#007BFF]/20">
                    <span>Live Website</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </header>

        <!-- Body Slot -->
        <main class="p-4 sm:p-8 flex-1">
            @yield('content')
        </main>
    </div>

    <!-- Flash Alerts -->
    @include('components.flash')
</body>
</html>
