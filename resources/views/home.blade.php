@extends('layouts.app')

@section('title', 'Halaman Utama - Satuan Pelayanan Pemenuhan Gizi')

@section('content')
<div class="flex-grow flex flex-col relative w-full min-h-[calc(100vh-5rem)] bg-blue-900">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/gambarsppg.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-60" />
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-900/40 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-black/30"></div> <!-- Additional darkening for better text contrast -->
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-4xl mx-auto transform transition-all duration-1000 translate-y-0 opacity-100" 
             x-data="{ show: false }" 
             x-init="setTimeout(() => show = true, 100)"
             :class="show ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight leading-tight mb-6 drop-shadow-lg">
                <span class="block">Selamat Datang Di</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Sistem Informasi</span>
            </h1>
            
            <p class="mt-4 text-xl sm:text-2xl text-blue-100 font-medium max-w-3xl mx-auto drop-shadow-md mb-10">
                Satuan Pelayanan Pemenuhan Gizi
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                <a href="{{ route('menu') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-blue-900 bg-white rounded-full hover:bg-blue-50 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                    Lihat Menu Hari Ini
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white bg-white/10 backdrop-blur-md border border-white/20 rounded-full hover:bg-white/20 transition-all duration-300 shadow-lg hover:shadow-xl">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
