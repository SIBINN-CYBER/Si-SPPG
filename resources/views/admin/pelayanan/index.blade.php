@extends('layouts.admin')

@section('title', 'Kelola Pelayanan & Pengajuan - Admin')
@section('page_title', 'Data Pelayanan & Pengajuan')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <!-- Header & Actions -->
    <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
        <!-- Search Form -->
        <form action="{{ route('admin.pelayanan') }}" method="GET" class="w-full sm:max-w-md relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" name="search" placeholder="Cari Nama Pengaju..." value="{{ $search }}" 
                   class="pl-10 block w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors shadow-sm">
            <button type="submit" class="absolute inset-y-1 right-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 text-sm font-medium transition-colors">
                Cari
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-y border-slate-200 text-slate-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold">Pengaju</th>
                    <th class="px-6 py-4 font-semibold">Tanggal</th>
                    <th class="px-6 py-4 font-semibold">Jenis</th>
                    <th class="px-6 py-4 font-semibold w-1/3">Cuplikan Pesan</th>
                    <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-sm">
                @forelse($pelayanans as $row)
                <tr class="hover:bg-slate-50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                {{ strtoupper(substr($row->nama, 0, 1)) }}
                            </div>
                            <span class="font-medium text-slate-800">{{ $row->nama }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-500 whitespace-nowrap">
                        {{ date('d M Y', strtotime($row->tanggal)) }}
                    </td>
                    <td class="px-6 py-4">
                        @if($row->jenis == 'Request')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Request
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-rose-100 text-rose-800 border border-rose-200">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Keluhan
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-slate-500">
                        <div class="line-clamp-2">{{ $row->pesan }}</div>
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button onclick='openMessageModal(@json($row->pesan), @json($row->nama), @json($row->jenis))' class="p-1.5 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors inline-flex items-center" title="Baca Lengkap">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                        <a href="{{ route('admin.pelayanan.destroy', $row->id) }}" onclick="return confirm('Yakin ingin menghapus data ini?')" class="p-1.5 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors inline-flex items-center" title="Hapus">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                        <svg class="mx-auto h-12 w-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Tidak ada data pengajuan/keluhan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Message Detail Modal -->
<div id="messageModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeMessageModal()"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                            Isi Pesan
                            <span id="modalJenisBadge" class="text-xs px-2 py-0.5 rounded-full"></span>
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">Dari: <span id="modalSender" class="font-semibold text-slate-700"></span></p>
                    </div>
                    <button type="button" onclick="closeMessageModal()" class="text-slate-400 hover:text-slate-600 bg-white rounded-full p-1 shadow-sm border border-slate-200">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <div class="px-6 py-6 bg-white">
                    <div id="fullMessageContent" class="text-slate-700 text-sm leading-relaxed whitespace-pre-wrap p-4 bg-slate-50 rounded-xl border border-slate-100 min-h-[100px]"></div>
                </div>
                <div class="bg-slate-50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 border-t border-slate-100">
                    <button type="button" onclick="closeMessageModal()" class="inline-flex w-full justify-center rounded-xl bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-900 sm:w-auto transition-colors">
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
    const messageModal = document.getElementById('messageModal');
    const fullMessageContent = document.getElementById('fullMessageContent');
    const modalSender = document.getElementById('modalSender');
    const modalJenisBadge = document.getElementById('modalJenisBadge');

    function openMessageModal(message, sender, jenis) {
        // Set content
        fullMessageContent.textContent = message;
        modalSender.textContent = sender;
        
        // Set badge
        if(jenis === 'Request') {
            modalJenisBadge.textContent = 'Request';
            modalJenisBadge.className = 'text-[10px] px-2 py-0.5 rounded-md font-bold bg-emerald-100 text-emerald-700 border border-emerald-200 uppercase tracking-wider';
        } else {
            modalJenisBadge.textContent = 'Keluhan';
            modalJenisBadge.className = 'text-[10px] px-2 py-0.5 rounded-md font-bold bg-rose-100 text-rose-700 border border-rose-200 uppercase tracking-wider';
        }

        messageModal.classList.remove('hidden');
    }

    function closeMessageModal() {
        messageModal.classList.add('hidden');
    }
</script>
@endsection
