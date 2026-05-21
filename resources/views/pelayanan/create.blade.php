@extends('layouts.app')

@section('title', 'Pelayanan & Pengajuan')

@section('content')
<div class="bg-slate-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="max-w-xl w-full">
        <!-- Header -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-blue-900 tracking-tight">Pelayanan & Pengajuan</h2>
            <p class="mt-2 text-slate-500">Sampaikan keluhan atau permintaan Anda kepada kami</p>
        </div>

        @if(session('pesan_sukses'))
            <div class="mb-8 rounded-xl bg-emerald-50 p-4 border border-emerald-200 shadow-sm transform transition-all duration-300 flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-emerald-800">
                        {{ session('pesan_sukses') }}
                    </p>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white py-8 px-6 sm:px-10 rounded-2xl shadow-sm border border-slate-100">
            <form action="{{ route('pelayanan.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                    <div class="mt-1">
                        <input id="nama" name="nama" type="text" required 
                               class="appearance-none block w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors sm:text-sm" 
                               placeholder="Masukkan nama Anda">
                    </div>
                </div>

                <div>
                    <label for="jenis_pengajuan" class="block text-sm font-semibold text-slate-700 mb-1">Jenis Pengajuan</label>
                    <div class="mt-1 relative">
                        <select id="jenis_pengajuan" name="jenis_pengajuan" required 
                                class="appearance-none block w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors sm:text-sm bg-white">
                            <option value="" disabled selected>Pilih jenis pengajuan...</option>
                            <option value="Request">Request (Permintaan)</option>
                            <option value="Keluhan">Keluhan</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="pesan" class="block text-sm font-semibold text-slate-700 mb-1">Pesan / Detail</label>
                    <div class="mt-1">
                        <textarea id="pesan" name="pesan" rows="5" required 
                                  class="appearance-none block w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors sm:text-sm resize-none" 
                                  placeholder="Tuliskan secara rinci pengajuan atau keluhan Anda di sini..."></textarea>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 hover:shadow-md transform hover:-translate-y-0.5">
                        Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
