@extends('layouts.admin')

@section('title', 'Kelola Menu - Admin')
@section('page_title', 'Manajemen Menu MBG')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <!-- Header & Actions -->
    <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        
        <!-- Search Form -->
        <form action="{{ route('admin.menu') }}" method="GET" class="w-full sm:max-w-md relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" name="search" placeholder="Cari Nama Menu..." value="{{ $search }}" 
                   class="pl-10 block w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            <button type="submit" class="absolute inset-y-1 right-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 text-sm font-medium transition-colors">
                Cari
            </button>
        </form>

        <!-- Action Buttons -->
        <div class="flex flex-wrap items-center gap-2">
            <button onclick="openModal(null)" class="inline-flex items-center px-4 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-xl hover:bg-blue-700 transition-colors shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah
            </button>
            <div class="h-6 w-px bg-slate-300 hidden sm:block mx-1"></div>
            <button onclick="printAll()" class="inline-flex items-center px-4 py-2.5 bg-slate-100 text-slate-700 text-sm font-medium rounded-xl hover:bg-slate-200 border border-slate-200 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Semua
            </button>
            <button onclick="printSelected()" class="inline-flex items-center px-4 py-2.5 bg-slate-100 text-slate-700 text-sm font-medium rounded-xl hover:bg-slate-200 border border-slate-200 transition-colors">
                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Terpilih
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold w-10">
                        <input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                    </th>
                    <th class="px-6 py-4 font-semibold">Nama Menu</th>
                    <th class="px-6 py-4 font-semibold">Tanggal</th>
                    <th class="px-6 py-4 font-semibold">Menu Utama</th>
                    <th class="px-6 py-4 font-semibold">Lauk</th>
                    <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-sm">
                @forelse($menus as $row)
                <tr class="hover:bg-slate-50 transition-colors group">
                    <td class="px-6 py-4">
                        <input type="checkbox" class="rowCheckbox rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer" value="{{ $row->id }}">
                    </td>
                    <td class="px-6 py-4 font-medium text-slate-800 flex items-center gap-3">
                        @if($row->foto)
                            <img src="{{ asset('assets/uploads/' . $row->foto) }}" alt="{{ $row->namamenu }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200">
                        @else
                            <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        {{ $row->namamenu }}
                    </td>
                    <td class="px-6 py-4 text-slate-600 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                            {{ date('d M Y', strtotime($row->tanggal)) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-slate-600">{{ $row->menu_utama }}</td>
                    <td class="px-6 py-4 text-slate-600">{{ $row->lauk ?? '-' }}</td>
                    <td class="px-6 py-4 text-right whitespace-nowrap space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button onclick="printSelectedSingle({{ $row->id }})" class="p-1.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Cetak">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        </button>
                        <button onclick='openGiziModal(@json($row))' class="p-1.5 text-slate-500 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors" title="Lihat Gizi">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <button onclick='openModal(@json($row))' class="p-1.5 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <a href="{{ route('admin.menu.destroy', $row->id) }}" onclick="return confirm('Yakin ingin menghapus menu ini?')" class="p-1.5 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors inline-flex" title="Hapus">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                        <svg class="mx-auto h-12 w-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Belum ada data menu.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Modal -->
<div id="menuModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                    <h3 class="text-lg font-bold text-slate-800" id="modalTitle">Tambah Menu</h3>
                    <button type="button" onclick="closeModal()" class="text-slate-400 hover:text-slate-600 bg-white rounded-full p-1 shadow-sm border border-slate-200">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <!-- Body -->
                <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data" id="menuForm" class="p-6">
                    @csrf
                    <input type="hidden" name="id" id="menuId">
                    
                    <div class="space-y-6">
                        <!-- Basic Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Menu *</label>
                                <input type="text" name="namamenu" id="namamenu" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal *</label>
                                <input type="date" name="tanggal" id="tanggal" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </div>
                        </div>

                        <!-- Menu Composition -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Menu Utama *</label>
                                <input type="text" name="menu_utama" id="menu_utama" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Lauk</label>
                                <input type="text" name="lauk" id="lauk" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Saus</label>
                                <input type="text" name="saus" id="saus" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Dessert</label>
                                <input type="text" name="dessert" id="dessert" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm">
                            </div>
                        </div>

                        <!-- Gizi -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <!-- Besar -->
                            <div class="space-y-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-blue-600">Gizi Porsi Besar</h4>
                                <div><label class="block text-xs text-slate-600 mb-1">Energi</label><input type="text" name="energi_besar" id="energi_besar" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                                <div><label class="block text-xs text-slate-600 mb-1">Protein</label><input type="text" name="protein_besar" id="protein_besar" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                                <div><label class="block text-xs text-slate-600 mb-1">Lemak</label><input type="text" name="lemak_besar" id="lemak_besar" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                                <div><label class="block text-xs text-slate-600 mb-1">Karbohidrat</label><input type="text" name="karbo_besar" id="karbo_besar" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                            </div>
                            <!-- Kecil -->
                            <div class="space-y-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-600">Gizi Porsi Kecil</h4>
                                <div><label class="block text-xs text-slate-600 mb-1">Energi</label><input type="text" name="energi_kecil" id="energi_kecil" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                                <div><label class="block text-xs text-slate-600 mb-1">Protein</label><input type="text" name="protein_kecil" id="protein_kecil" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                                <div><label class="block text-xs text-slate-600 mb-1">Lemak</label><input type="text" name="lemak_kecil" id="lemak_kecil" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                                <div><label class="block text-xs text-slate-600 mb-1">Karbohidrat</label><input type="text" name="karbo_kecil" id="karbo_kecil" class="w-full px-2 py-1.5 border border-slate-300 rounded-md text-sm"></div>
                            </div>
                        </div>

                        <!-- Foto -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Menu</label>
                            <input type="file" name="foto" id="foto" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors border border-slate-200 rounded-lg p-1">
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-4 border-t border-slate-100 flex justify-end gap-3">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-xl hover:bg-slate-50">Batal</button>
                        <button type="submit" class="px-6 py-2 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-sm">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Gizi Info Modal -->
<div id="giziModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeGiziModal()"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md">
                <button type="button" onclick="closeGiziModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-500 bg-slate-100 hover:bg-slate-200 rounded-full p-2 transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                <div class="px-6 pt-6 pb-8">
                    <h3 class="text-xl font-bold text-slate-800 mb-6 border-b pb-4">Informasi Gizi Lengkap</h3>
                    <div id="giziContent" class="grid grid-cols-2 gap-6 text-sm">
                        <!-- Content inserted via JS -->
                    </div>
                </div>
                <div class="bg-slate-50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 border-t border-slate-100">
                    <button type="button" onclick="closeGiziModal()" class="inline-flex w-full justify-center rounded-xl bg-blue-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 sm:w-auto">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const modal = document.getElementById('menuModal');
    const modalTitle = document.getElementById('modalTitle');
    const menuId = document.getElementById('menuId');
    const namamenu = document.getElementById('namamenu');
    const tanggal = document.getElementById('tanggal');
    const menu_utama = document.getElementById('menu_utama');
    const lauk = document.getElementById('lauk');
    const saus = document.getElementById('saus');
    const dessert = document.getElementById('dessert');
    const energi_besar = document.getElementById('energi_besar');
    const protein_besar = document.getElementById('protein_besar');
    const lemak_besar = document.getElementById('lemak_besar');
    const karbo_besar = document.getElementById('karbo_besar');
    const energi_kecil = document.getElementById('energi_kecil');
    const protein_kecil = document.getElementById('protein_kecil');
    const lemak_kecil = document.getElementById('lemak_kecil');
    const karbo_kecil = document.getElementById('karbo_kecil');

    const giziModal = document.getElementById('giziModal');
    const giziContent = document.getElementById('giziContent');

    function openModal(data) {
        if (data) {
            modalTitle.innerText = 'Edit Menu';
            menuId.value = data.id;
            document.getElementById('menuForm').action = "{{ route('admin.menu.update') }}";
            namamenu.value = data.namamenu;
            tanggal.value = data.tanggal;
            menu_utama.value = data.menu_utama;
            lauk.value = data.lauk || '';
            saus.value = data.saus || '';
            dessert.value = data.dessert || '';
            energi_besar.value = data.energi_besar || '';
            protein_besar.value = data.protein_besar || '';
            lemak_besar.value = data.lemak_besar || '';
            karbo_besar.value = data.karbo_besar || '';
            energi_kecil.value = data.energi_kecil || '';
            protein_kecil.value = data.protein_kecil || '';
            lemak_kecil.value = data.lemak_kecil || '';
            karbo_kecil.value = data.karbo_kecil || '';
        } else {
            modalTitle.innerText = 'Tambah Menu';
            menuId.value = '';
            document.getElementById('menuForm').action = "{{ route('admin.menu.store') }}";
            document.getElementById('menuForm').reset();
        }
        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    function openGiziModal(data) {
        giziContent.innerHTML = `
            <div class="space-y-3 bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                <h4 class="font-bold text-blue-800 border-b border-blue-200 pb-2">Porsi Besar</h4>
                <div class="flex justify-between"><span class="text-slate-500">Energi</span> <span class="font-medium text-slate-800">${data.energi_besar || '-'}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Protein</span> <span class="font-medium text-slate-800">${data.protein_besar || '-'}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Lemak</span> <span class="font-medium text-slate-800">${data.lemak_besar || '-'}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Karbo</span> <span class="font-medium text-slate-800">${data.karbo_besar || '-'}</span></div>
            </div>
            <div class="space-y-3 bg-emerald-50/50 p-4 rounded-xl border border-emerald-100">
                <h4 class="font-bold text-emerald-800 border-b border-emerald-200 pb-2">Porsi Kecil</h4>
                <div class="flex justify-between"><span class="text-slate-500">Energi</span> <span class="font-medium text-slate-800">${data.energi_kecil || '-'}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Protein</span> <span class="font-medium text-slate-800">${data.protein_kecil || '-'}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Lemak</span> <span class="font-medium text-slate-800">${data.lemak_kecil || '-'}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Karbo</span> <span class="font-medium text-slate-800">${data.karbo_kecil || '-'}</span></div>
            </div>
        `;
        giziModal.classList.remove('hidden');
    }

    function closeGiziModal() {
        giziModal.classList.add('hidden');
    }

    // print helpers
    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('.rowCheckbox');
        checkboxes.forEach(cb => cb.checked = source.checked);
    }

    function printAll() {
        const searchVal = document.querySelector('input[name="search"]').value;
        if (searchVal) {
            window.open("{{ route('admin.menu.cetak') }}?search=" + encodeURIComponent(searchVal), '_self');
        } else {
            window.open("{{ route('admin.menu.cetak') }}?all=1", '_self');
        }
    }

    function printSelected() {
        const checked = document.querySelectorAll('.rowCheckbox:checked');
        if (checked.length === 0) {
            alert('Pilih minimal satu menu untuk dicetak.');
            return;
        }
        const ids = Array.from(checked).map(cb => cb.value).join(',');
        window.open("{{ route('admin.menu.cetak') }}?ids=" + ids, '_self');
    }

    function printSelectedSingle(id) {
        window.open("{{ route('admin.menu.cetak') }}?ids=" + id, '_self');
    }
</script>
@endsection
