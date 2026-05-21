<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title', 'SI-SPPG Pucang 2')</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Directives for Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @yield('styles')
    
    <!-- Alpine.js for interactive components like mobile menu -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{'bg-blue-900/90 backdrop-blur-md shadow-lg': scrolled, 'bg-blue-900': !scrolled}"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/img/Logo_Badan_Gizi_Nasional_(2024).png') }}" alt="Logo Badan Gizi" class="h-12 w-12 object-contain bg-white/10 rounded-lg p-1 backdrop-blur-sm">
                    <span class="text-white font-bold text-xl tracking-tight">SI-SPPG Pucang 2</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-white/90 hover:text-white font-medium text-sm transition-colors {{ request()->routeIs('home') ? 'border-b-2 border-white pb-1' : '' }}">Beranda</a>
                    <a href="{{ route('menu') }}" class="text-white/90 hover:text-white font-medium text-sm transition-colors {{ request()->routeIs('menu') ? 'border-b-2 border-white pb-1' : '' }}">Menu</a>
                    <a href="{{ route('tentang') }}" class="text-white/90 hover:text-white font-medium text-sm transition-colors {{ request()->routeIs('tentang') ? 'border-b-2 border-white pb-1' : '' }}">Tentang Kami</a>
                    <a href="{{ route('pelayanan.create') }}" class="text-white/90 hover:text-white font-medium text-sm transition-colors {{ request()->routeIs('pelayanan.create') ? 'border-b-2 border-white pb-1' : '' }}">Pelayanan & Pengajuan</a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white/80 hover:text-white hover:bg-white/10 focus:outline-none transition-colors">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden bg-blue-900 border-t border-white/10 absolute w-full shadow-xl" x-cloak>
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-white bg-white/20' : 'text-white/80 hover:text-white hover:bg-white/10' }}">Beranda</a>
                <a href="{{ route('menu') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('menu') ? 'text-white bg-white/20' : 'text-white/80 hover:text-white hover:bg-white/10' }}">Menu</a>
                <a href="{{ route('tentang') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('tentang') ? 'text-white bg-white/20' : 'text-white/80 hover:text-white hover:bg-white/10' }}">Tentang Kami</a>
                <a href="{{ route('pelayanan.create') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('pelayanan.create') ? 'text-white bg-white/20' : 'text-white/80 hover:text-white hover:bg-white/10' }}">Pelayanan & Pengajuan</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <main class="flex-grow pt-20 flex flex-col"> <!-- pt-20 ensures content is below the fixed navbar -->
        @yield('content')
    </main>

    <!-- Modern Premium Footer -->
    <footer class="bg-slate-900 text-slate-300 mt-auto relative z-10 border-t-4 border-blue-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Brand & Description -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white p-1.5 rounded-lg inline-flex">
                            <img src="{{ asset('assets/img/Logo_Badan_Gizi_Nasional_(2024).png') }}" alt="Logo Badan Gizi" class="h-10 w-10 object-contain">
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">SI-SPPG Pucang 2</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed pr-4">
                        Satuan Pelayanan Pemenuhan Gizi. Dapur penyedia makanan bergizi gratis yang higienis, terstandar, dan lezat untuk anak sekolah.
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4 uppercase tracking-wider text-sm">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Beranda</a></li>
                        <li><a href="{{ route('menu') }}" class="hover:text-blue-400 transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Menu Hari Ini</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-blue-400 transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Tentang Kami</a></li>
                        <li><a href="{{ route('pelayanan.create') }}" class="hover:text-blue-400 transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Pelayanan & Pengajuan</a></li>
                    </ul>
                </div>
                
                <!-- Social Media -->
                <div>
                    <h3 class="text-white font-semibold mb-4 uppercase tracking-wider text-sm">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-400 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-xs text-slate-500 text-center md:text-left mb-4 md:mb-0">
                    &copy; 2025 Satuan Pelayanan Pemenuhan Gizi Pucang 2. All rights reserved.
                </p>
                
                @if(request()->routeIs('pelayanan.create'))
                    <a href="{{ route('login') }}" class="text-xs font-medium text-slate-500 hover:text-white transition-colors flex items-center space-x-1 bg-slate-800 px-3 py-1.5 rounded-md">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        <span>Login Admin</span>
                    </a>
                @endif
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
