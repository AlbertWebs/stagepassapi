@extends('admin.layout')

@section('page_title', 'Profile')
@section('page_subtitle', 'Manage your admin identity and preferences.')

@section('content')
    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
        <h2 class="text-xl font-bold text-white">Profile</h2>
        <p class="text-sm text-slate-400 mt-2">This admin area uses basic auth credentials.</p>
        <div class="mt-6 grid gap-4 md:grid-cols-2">
            <div class="rounded-xl border border-slate-800 p-4">
                <p class="text-xs uppercase text-slate-400">Username</p>
                <p class="text-lg font-semibold text-white mt-2">{{ config('admin.basic_user') }}</p>
            </div>
            <div class="rounded-xl border border-slate-800 p-4">
                <p class="text-xs uppercase text-slate-400">Auth Method</p>
                <p class="text-lg font-semibold text-white mt-2">HTTP Basic</p>
            </div>
        </div>
    </div>
@endsection
