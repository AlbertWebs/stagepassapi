@extends('admin.layout')

@section('page_title', 'Profile')
@section('page_subtitle', 'Manage your admin identity and preferences.')

@section('content')
    @if (session('status'))
        <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300">
            {{ session('error') }}
        </div>
    @endif

    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6 space-y-6">
        <div>
            <h2 class="text-xl font-bold text-white">Profile</h2>
            <p class="text-sm text-slate-400 mt-2">Manage the HTTP Basic credentials used for admin access.</p>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-xl border border-slate-800 p-4">
                <p class="text-xs uppercase text-slate-400">Current Username</p>
                <p class="text-lg font-semibold text-white mt-2">{{ $username }}</p>
            </div>
            <div class="rounded-xl border border-slate-800 p-4">
                <p class="text-xs uppercase text-slate-400">Auth Method</p>
                <p class="text-lg font-semibold text-white mt-2">HTTP Basic</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.profile.update') }}" class="rounded-xl border border-slate-800 p-5 space-y-4">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="text-sm text-slate-400">Admin username</label>
                    <input type="text" name="basic_user" value="{{ old('basic_user', $username) }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    @error('basic_user')
                        <p class="mt-2 text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-sm text-slate-400">New password</label>
                    <input type="password" name="basic_pass" placeholder="Leave blank to keep current password" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    @error('basic_pass')
                        <p class="mt-2 text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <p class="text-xs text-slate-500">Updating credentials writes to the `.env` file. You will need to re-authenticate after saving.</p>
            <button class="px-5 py-2.5 rounded-full bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition">
                Save Changes
            </button>
        </form>
    </div>
@endsection
