<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — ZaroSoft Command Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#07090e] text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <!-- Background Glows -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[#007BFF]/20 rounded-full blur-3xl pointer-events-none animate-pulse-glow"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-[#00D2FF]/20 rounded-full blur-3xl pointer-events-none animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="max-w-md w-full relative z-10 space-y-6">
        <!-- Logo -->
        <div class="text-center space-y-3">
            <a href="{{ route('home') }}" class="inline-block">
                <img src="{{ asset('images/logo-1.png') }}" alt="Zarosoft Logo" class="h-10 mx-auto" style="height:48px; width:auto;">
            </a>
            <p class="text-xs text-slate-400 uppercase tracking-widest font-bold">Admin Command Center</p>
        </div>

        <!-- Login Card -->
        <div class="p-8 rounded-3xl bg-[#0d111a]/95 border border-white/10 backdrop-blur-xl shadow-2xl space-y-6">
            <div class="space-y-1">
                <h2 class="text-lg font-bold text-white">Sign In to Dashboard</h2>
                <p class="text-xs text-slate-400">Enter your administrative credentials to continue.</p>
            </div>

            @if($errors->any())
            <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', 'admin@zarosoft.com') }}" required autofocus class="w-full px-4 py-3 rounded-xl bg-[#07090e] border border-white/10 text-sm text-white focus:outline-none focus:border-[#007BFF] placeholder-slate-600">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Password</label>
                    <input type="password" name="password" value="password123" required class="w-full px-4 py-3 rounded-xl bg-[#07090e] border border-white/10 text-sm text-white focus:outline-none focus:border-[#007BFF] placeholder-slate-600">
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-slate-400">
                        <input type="checkbox" name="remember" class="rounded bg-[#07090e] border-white/10 text-[#007BFF] focus:ring-0">
                        <span>Remember session</span>
                    </label>
                    <span class="text-slate-500">Default: password123</span>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-[#007BFF] via-[#0099FF] to-[#00D2FF] hover:from-[#0069d9] hover:to-[#00B4FF] text-white font-extrabold text-sm shadow-xl shadow-[#007BFF]/25 transition-all">
                    Authenticate & Enter →
                </button>
            </form>
        </div>

        <div class="text-center text-xs text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-slate-300">← Back to public website</a>
        </div>
    </div>

</body>
</html>
