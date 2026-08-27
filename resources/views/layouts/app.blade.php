<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ZaroSoft — Smart Technology. Innovative Solutions.')</title>
    <meta name="description" content="@yield('meta_description', 'ZaroSoft engineers bespoke custom ERPs, scalable SaaS platforms, high-concurrency web applications, AI automation, and high-impact design.')">
    <meta name="keywords" content="@yield('meta_keywords', 'software development, ERP, CRM, Laravel, AI automation, OCR, mobile apps, web development, UI/UX, ZaroSoft')">

    <!-- OpenGraph / Social Meta -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'ZaroSoft — Smart Technology. Innovative Solutions.')">
    <meta property="og:description" content="@yield('meta_description', 'ZaroSoft engineers bespoke custom ERPs, scalable SaaS platforms, high-concurrency web applications, AI automation, and high-impact design.')">
    <meta property="og:image" content="@yield('og_image', asset('images/zarosoft-og.jpg'))">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'ZaroSoft — Smart Technology. Innovative Solutions.')">
    <meta name="twitter:description" content="@yield('meta_description', 'Building Smarter Digital Solutions with Laravel, AI, and Modern Cloud Architecture.')">

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Always use light mode -->
    <script>
        document.documentElement.classList.remove('dark');
        localStorage.removeItem('theme');
    </script>

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased bg-[#F8FAFC] text-[#111827] selection:bg-[#007BFF] selection:text-white transition-colors duration-200 min-h-screen flex flex-col justify-between overflow-x-hidden">
    
    <!-- Top Navigation Bar -->
    @include('layouts.navigation')

    <!-- Main Content Area -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- Global Footer -->
    @include('layouts.footer')

    <!-- Global Flash Alerts -->
    @include('components.flash')

    @stack('scripts')
</body>
</html>
