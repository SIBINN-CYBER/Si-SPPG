@extends('layouts.admin')

@section('title', 'Profil Admin - SI-SPPG')
@section('page_title', 'Profil Saya')

@section('content')

@if(session('success'))
    <div x-data="{ show: true }" x-show="show" class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center justify-between" x-init="setTimeout(() => show = false, 5000)">
        <div class="flex items-center">
            <svg class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
        <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 focus:outline-none">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
@endif

@if($errors->any())
    <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 rounded-xl flex items-center">
        <svg class="h-5 w-5 text-rose-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="text-sm font-medium">{{ $errors->first() }}</span>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Profile Summary Card -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden text-center pb-8">
            <div class="h-32 bg-gradient-to-r from-blue-600 to-indigo-600"></div>
            <div class="relative -mt-16 mb-4 flex justify-center">
                <div class="h-32 w-32 rounded-full border-4 border-white bg-blue-100 text-blue-700 flex items-center justify-center text-5xl font-bold shadow-lg">
                    {{ strtoupper(substr($admin->namalengkap, 0, 1)) }}
                </div>
            </div>
            <h3 class="text-xl font-bold text-slate-800">{{ $admin->namalengkap }}</h3>
            <p class="text-slate-500 text-sm mb-6">{{ $admin->username }}</p>
            
            <div class="px-6 py-4 mx-6 bg-slate-50 rounded-2xl border border-slate-100 text-left">
                <div class="mb-3">
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Status Peran</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        Administrator Aktif
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Sistem</span>
                    <span class="text-sm font-medium text-slate-700">SI-SPPG Pucang 2</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Form Card -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                <h3 class="text-xl font-bold text-slate-800">Informasi Dasar</h3>
            </div>
            
            <form method="POST" action="{{ route('admin.profil.update') }}" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="namalengkap" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input type="text" id="namalengkap" name="namalengkap" value="{{ $admin->namalengkap }}" required 
                                   class="pl-10 block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors sm:text-sm">
                        </div>
                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-semibold text-slate-700 mb-2">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="text" id="username" name="username" value="{{ $admin->username }}" required 
                                   class="pl-10 block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors sm:text-sm">
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-6">
                    <h4 class="text-sm font-bold text-slate-800 mb-4">Ubah Kata Sandi</h4>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Password Baru <span class="text-slate-400 font-normal">(Kosongkan jika tidak ingin diubah)</span></label>
                        <div class="relative max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input type="password" id="password" name="password" minlength="6" placeholder="Minimal 6 karakter"
                                   class="pl-10 block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors sm:text-sm">
                        </div>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-bold rounded-xl shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
