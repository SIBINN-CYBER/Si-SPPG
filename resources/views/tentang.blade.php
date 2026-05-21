@extends('layouts.app')

@section('title', 'Tentang Kami | SI-SPPG Pucang 2')

@section('content')
<div class="bg-slate-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto space-y-12">
        
        <!-- Header Section -->
        <div class="text-center space-y-4">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 tracking-tight">Apa itu SPPG?</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed">
                Satuan Pelayanan Pemenuhan Gizi dalam Program Makan Bergizi Gratis.
            </p>
        </div>

        <!-- Intro Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-10 transform transition-all hover:shadow-md">
            <p class="text-slate-700 text-lg leading-relaxed text-justify">
                <span class="font-semibold text-blue-800">SPPG (Satuan Pelayanan Pemenuhan Gizi)</span> merupakan unit pelaksana Program Makan Bergizi Gratis (MBG). 
                Tujuannya adalah menyediakan informasi dan akses terhadap makanan bergizi, dengan tugas utama memastikan makanan diproduksi sesuai standar, diaudit kualitasnya, 
                dan diterima tepat waktu. SPPG berfungsi sebagai dapur pusat yang menangani rantai penyediaan makanan dari bahan baku hingga distribusi ke sekolah-sekolah atau penerima manfaat lainnya.
            </p>
        </div>

        <!-- Tugas Utama Grid -->
        <div>
            <h3 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                Tugas Utama SPPG
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 border-l-4 border-l-blue-500 hover:-translate-y-1 transition-transform duration-300">
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Dapur Makan Bergizi Gratis (MBG)</h4>
                    <p class="text-slate-600">Memasak makanan sesuai standar gizi, kebersihan, dan keamanan pangan.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 border-l-4 border-l-green-500 hover:-translate-y-1 transition-transform duration-300">
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Pengawasan Kualitas</h4>
                    <p class="text-slate-600">Memeriksa kualitas makanan melalui berbagai standar, termasuk kebersihan dan kandungan nutrisi.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 border-l-4 border-l-amber-500 hover:-translate-y-1 transition-transform duration-300">
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Distribusi</h4>
                    <p class="text-slate-600">Mengatur dan memastikan makanan terkirim tepat waktu ke sekolah-sekolah penerima manfaat, diatur berdasarkan jangkauan pengiriman.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 border-l-4 border-l-purple-500 hover:-translate-y-1 transition-transform duration-300">
                    <h4 class="font-bold text-slate-800 text-lg mb-2">Pengendalian Rantai Pasok</h4>
                    <p class="text-slate-600">Mengelola seluruh proses, mulai dari pemilihan bahan baku, pembelian, hingga pengolahan dan distribusi.</p>
                </div>
            </div>
        </div>

        <!-- Jenis SPPG & Kerjasama -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Jenis SPPG -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-5 border-b pb-3">Jenis SPPG</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm mr-3 mt-0.5">1</span>
                        <div>
                            <span class="font-semibold text-slate-800">SPPG Baru:</span>
                            <span class="text-slate-600 ml-1">Dibangun dari awal.</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm mr-3 mt-0.5">2</span>
                        <div>
                            <span class="font-semibold text-slate-800">SPPG Renovasi:</span>
                            <span class="text-slate-600 ml-1">Dibuat dari renovasi restoran, kafe, catering, rumah, atau ruko.</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm mr-3 mt-0.5">3</span>
                        <div>
                            <span class="font-semibold text-slate-800">SPPG Dapur:</span>
                            <span class="text-slate-600 ml-1">Dapur yang berlokasi di dalam sekolah atau pesantren.</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Kerjasama -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-5 border-b pb-3">Kerjasama & Dampak</h3>
                <p class="text-slate-700 leading-relaxed mb-4">
                    Kemitraan SPPG melibatkan berbagai pihak termasuk mitra lokal seperti UMKM (pedagang sayur, ayam, dan bahan makanan), serta organisasi seperti TNI, Polri, dan BUMN.
                </p>
                <div class="space-y-3">
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                        <span class="font-semibold text-blue-800 block mb-1">Dampak Ekonomi:</span>
                        <span class="text-slate-600 text-sm">Program ini menciptakan lapangan kerja lokal baru, mendukung UMKM seperti para pedagang sayur yang pendapatannya meningkat.</span>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                        <span class="font-semibold text-blue-800 block mb-1">Investasi:</span>
                        <span class="text-slate-600 text-sm">Mitra yang mengelola SPPG umumnya mengeluarkan investasi yang signifikan untuk pembangunan dan operasionalnya.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-3xl shadow-xl overflow-hidden text-white">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Visi -->
                <div class="p-10 lg:border-r border-white/20 flex flex-col justify-center">
                    <div class="inline-flex items-center justify-center p-3 bg-white/10 rounded-xl mb-6 w-16 h-16">
                        <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4">Visi</h3>
                    <p class="text-blue-100 text-lg leading-relaxed">
                        Mewujudkan aksi dan nilai pemerintah dalam pemenuhan gizi masyarakat, khususnya melalui distribusi makanan bergizi yang aman dan sehat.
                    </p>
                </div>
                
                <!-- Misi -->
                <div class="p-10 bg-white/5">
                    <div class="inline-flex items-center justify-center p-3 bg-white/10 rounded-xl mb-6 w-16 h-16">
                        <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-6">Misi</h3>
                    <ul class="space-y-4 text-blue-100">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Mendistribusikan bahan dapur dan makanan yang terstandar di berbagai wilayah untuk memenuhi kebutuhan gizi anak sekolah.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Meningkatkan efisiensi proses dan kesinambungan masakan secara berkelanjutan.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Memberdayakan pelaku usaha lokal seperti petani/peternak di Kabupaten Jember.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Mendorong partisipasi, tanggung jawab, dan kolaborasi dengan UMKM dengan mendengarkan masukan dan kebutuhan lokal.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Menciptakan tata kelola program yang transparan dan profesional.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
