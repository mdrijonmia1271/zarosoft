@extends('admin.layouts.app')

@section('title', 'Add Client Logo')
@section('header', 'Add Client Logo')

@section('content')
<form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 max-w-4xl">
    @csrf
    <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm p-6 sm:p-8 space-y-5">
        @include('admin.clients._form', ['client' => null])
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs shadow-lg shadow-indigo-500/20 transition-all">
            Add Client
        </button>
        <a href="{{ route('admin.clients.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-bold text-xs">
            Cancel
        </a>
    </div>
</form>
@endsection
