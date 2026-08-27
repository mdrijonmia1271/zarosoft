@if(session('success'))
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" 
     x-transition:enter="transform ease-out duration-300 transition"
     x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
     x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed bottom-6 right-6 z-50 max-w-md w-full bg-slate-900/95 dark:bg-slate-900/95 backdrop-blur-md border border-emerald-500/30 text-white rounded-2xl shadow-2xl p-4 flex items-start gap-4">
    <div class="p-2 rounded-xl bg-emerald-500/20 text-emerald-400 shrink-0">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </div>
    <div class="flex-1 pt-0.5">
        <h4 class="text-sm font-bold text-white">Success</h4>
        <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ session('success') }}</p>
    </div>
    <button @click="show = false" class="text-slate-400 hover:text-white p-1">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

@if(session('error') || $errors->any())
<div x-data="{ show: true }" x-show="show" 
     class="fixed bottom-6 right-6 z-50 max-w-md w-full bg-slate-900/95 dark:bg-slate-900/95 backdrop-blur-md border border-rose-500/30 text-white rounded-2xl shadow-2xl p-4 flex items-start gap-4">
    <div class="p-2 rounded-xl bg-rose-500/20 text-rose-400 shrink-0">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
    </div>
    <div class="flex-1 pt-0.5">
        <h4 class="text-sm font-bold text-white">Attention Needed</h4>
        @if(session('error'))
            <p class="text-xs text-rose-200 mt-1">{{ session('error') }}</p>
        @endif
        @if($errors->any())
            <ul class="text-xs text-rose-200 mt-1 space-y-1 list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <button @click="show = false" class="text-slate-400 hover:text-white p-1">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif
