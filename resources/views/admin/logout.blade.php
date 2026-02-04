@extends('admin.layout')

@section('page_title', 'Logout')
@section('page_subtitle', 'End the current admin session.')

@section('content')
    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
        <h2 class="text-xl font-bold text-white">Logout</h2>
        <p class="text-sm text-slate-400 mt-2">
            Are you sure you want to logout? You will need to sign in again to access the admin panel.
        </p>
        <div class="mt-6 flex gap-4">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 rounded-full bg-slate-800 text-slate-200 hover:bg-slate-700 transition">
                Cancel
            </a>
        </div>
    </div>
@endsection
