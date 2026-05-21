@extends('layouts.app')

@section('title', 'Menu Makanan - SI-SPPG Pucang 2')

@section('content')
<div class="bg-slate-50 min-h-screen py-10 px-4 sm:px-6 lg:px-8 relative">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-blue-900 tracking-tight">Daftar Menu Makanan</h2>
            <p class="mt-2 text-slate-500">Pilihan menu bergizi yang disajikan untuk program MBG</p>
        </div>

        <!-- Search Bar -->
        <div class="max-w-xl mx-auto mb-12">
            <form action="{{ route('menu') }}" method="GET" class="relative flex items-center w-full">
                <input type="text" name="search" placeholder="Cari Nama Menu..." value="{{ $search }}" 
                       class="w-full pl-5 pr-32 py-4 bg-white border border-slate-200 rounded-full text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow">
                <button type="submit" class="absolute right-2 top-2 bottom-2 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-full px-6 transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Cari
                </button>
            </form>
        </div>

        <!-- Menu Grid -->
        @if($menus->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($menus as $row)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group flex flex-col h-full">
                        <!-- Image Container -->
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('assets/uploads/' . $row->foto) }}" alt="{{ $row->namamenu }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-900 shadow-sm">
                                {{ date('d M Y', strtotime($row->tanggal)) }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-slate-800 mb-4 line-clamp-1">{{ $row->namamenu }}</h3>
                            
                            <div class="space-y-2 mb-6 flex-grow text-sm text-slate-600">
                                <p class="flex items-start"><span class="font-semibold text-blue-900 w-24 flex-shrink-0">Menu Utama</span><span class="mr-2">:</span> <span class="line-clamp-1">{{ $row->menu_utama }}</span></p>
                                <p class="flex items-start"><span class="font-semibold text-blue-900 w-24 flex-shrink-0">Lauk</span><span class="mr-2">:</span> <span class="line-clamp-1">{{ $row->lauk }}</span></p>
                                <p class="flex items-start"><span class="font-semibold text-blue-900 w-24 flex-shrink-0">Saus</span><span class="mr-2">:</span> <span class="line-clamp-1">{{ $row->saus }}</span></p>
                                <p class="flex items-start"><span class="font-semibold text-blue-900 w-24 flex-shrink-0">Dessert</span><span class="mr-2">:</span> <span class="line-clamp-1">{{ $row->dessert }}</span></p>
                            </div>

                            <!-- Actions -->
                            <div class="grid grid-cols-2 gap-2 mt-auto">
                                <button onclick='openGiziModal(@json($row), "besar")' class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium py-2 px-2 rounded-xl text-xs transition-colors border border-blue-100">
                                    Gizi Porsi Besar
                                </button>
                                <button onclick='openGiziModal(@json($row), "kecil")' class="w-full bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-medium py-2 px-2 rounded-xl text-xs transition-colors border border-emerald-100">
                                    Gizi Porsi Kecil
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-slate-100">
                <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mt-4 text-lg font-medium text-slate-900">Tidak ada menu ditemukan</h3>
                <p class="mt-1 text-slate-500">Coba gunakan kata kunci pencarian lain.</p>
            </div>
        @endif
    </div>
</div>

<!-- Modern Modal with Backdrop Blur -->
<div id="giziModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Background backdrop -->
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeGiziModal()"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel -->
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md scale-100 opacity-100" id="modal-panel">
                
                <!-- Close Button -->
                <button type="button" onclick="closeGiziModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-500 bg-slate-100 hover:bg-slate-200 rounded-full p-2 transition-colors focus:outline-none">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>

                <div class="bg-white px-6 pt-6 pb-4 sm:p-8">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <h3 class="text-2xl font-bold leading-6 text-blue-900 mb-6 flex items-center border-b pb-4" id="modal-title">
                                <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span id="giziTitle">Informasi Gizi</span>
                            </h3>
                            <div class="mt-2">
                                <div id="giziContent" class="space-y-3">
                                    <!-- Dynamic content inserted here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 border-t border-slate-100">
                    <button type="button" onclick="closeGiziModal()" class="inline-flex w-full justify-center rounded-xl bg-blue-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 sm:w-auto transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const giziModal = document.getElementById('giziModal');
    const giziContent = document.getElementById('giziContent');
    const giziTitle = document.getElementById('giziTitle');

    function openGiziModal(data, ukuran) {
        giziContent.innerHTML = '';
        
        let colorTheme = ukuran === 'besar' ? 'text-blue-700 bg-blue-50 border-blue-100' : 'text-emerald-700 bg-emerald-50 border-emerald-100';
        let iconColor = ukuran === 'besar' ? 'text-blue-500' : 'text-emerald-500';

        let giziItems = [];

        if (ukuran === 'besar') {
            giziTitle.textContent = 'Gizi Porsi Besar';
            giziItems = [
                { label: 'Energi', value: data.energi_besar, icon: 'M13 10V3L4 14h7v7l9-11h-7z' },
                { label: 'Protein', value: data.protein_besar, icon: 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z' },
                { label: 'Lemak', value: data.lemak_besar, icon: 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z' },
                { label: 'Karbohidrat', value: data.karbo_besar, icon: 'M3 13h2.626c.825 0 1.599-.406 2.045-1.071L9 10h6l1.329 1.929A2.49 2.49 0 0018.374 13H21M14 10v4m-4-4v4m-4-4v4' }
            ];
        } else if (ukuran === 'kecil') {
            giziTitle.textContent = 'Gizi Porsi Kecil';
            giziItems = [
                { label: 'Energi', value: data.energi_kecil, icon: 'M13 10V3L4 14h7v7l9-11h-7z' },
                { label: 'Protein', value: data.protein_kecil, icon: 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z' },
                { label: 'Lemak', value: data.lemak_kecil, icon: 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z' },
                { label: 'Karbohidrat', value: data.karbo_kecil, icon: 'M3 13h2.626c.825 0 1.599-.406 2.045-1.071L9 10h6l1.329 1.929A2.49 2.49 0 0018.374 13H21M14 10v4m-4-4v4m-4-4v4' }
            ];
        }

        giziItems.forEach(item => {
            giziContent.innerHTML += `
                <div class="flex items-center justify-between p-3 rounded-xl border ${colorTheme}">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 ${iconColor}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${item.icon}"></path></svg>
                        <span class="font-medium">${item.label}</span>
                    </div>
                    <span class="font-bold">${item.value}</span>
                </div>
            `;
        });

        // Show modal with slight fade-in effect
        giziModal.classList.remove('hidden');
        setTimeout(() => {
            giziModal.querySelector('.fixed.inset-0.bg-slate-900\\/60').classList.remove('opacity-0');
            giziModal.querySelector('.fixed.inset-0.bg-slate-900\\/60').classList.add('opacity-100');
            document.getElementById('modal-panel').classList.remove('scale-95', 'opacity-0', 'translate-y-4');
            document.getElementById('modal-panel').classList.add('scale-100', 'opacity-100', 'translate-y-0');
        }, 10);
    }

    function closeGiziModal() {
        // Hide with animation
        giziModal.querySelector('.fixed.inset-0.bg-slate-900\\/60').classList.add('opacity-0');
        giziModal.querySelector('.fixed.inset-0.bg-slate-900\\/60').classList.remove('opacity-100');
        document.getElementById('modal-panel').classList.add('scale-95', 'opacity-0', 'translate-y-4');
        document.getElementById('modal-panel').classList.remove('scale-100', 'opacity-100', 'translate-y-0');
        
        setTimeout(() => {
            giziModal.classList.add('hidden');
        }, 300);
    }

    // Initialize modal hidden state properly
    document.addEventListener("DOMContentLoaded", () => {
        giziModal.querySelector('.fixed.inset-0.bg-slate-900\\/60').classList.add('opacity-0', 'transition-opacity', 'duration-300');
        document.getElementById('modal-panel').classList.add('scale-95', 'opacity-0', 'translate-y-4', 'transition-all', 'duration-300');
    });
</script>
@endsection
