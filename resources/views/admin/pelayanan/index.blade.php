@extends('layouts.admin')

@section('title', 'Kelola Pelayanan & Pengajuan - Admin')

@section('styles')
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding-top: 80px; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { color: #002b6b; }
        .btn-delete { padding: 8px 12px; border: none; border-radius: 4px; color: white; text-decoration: none; cursor: pointer; background-color: #dc3545; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        .table-wrapper {
            overflow-x: auto;
        }
        .modal { display: none; position: fixed; z-index: 1001; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4); }
        .modal-content { background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 8px; }
        .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; }
        .btn-info { padding: 8px 12px; border: none; border-radius: 4px; color: white; text-decoration: none; cursor: pointer; background-color: #17a2b8; }
        .btn-add { padding: 8px 12px; border: none; border-radius: 4px; color: white; cursor: pointer; background-color: #007bff; }
    </style>
@endsection

@section('content')
<div class="container">
    <h2>Kelola Pelayanan & Pengajuan</h2>

    <form action="{{ route('admin.pelayanan') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Cari Nama..." value="{{ $search }}" style="padding: 8px; width: 200px;">
        <button type="submit" class="btn-add">Cari</button>
    </form>

    <div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelayanans as $row)
            <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ date('d F Y', strtotime($row->tanggal)) }}</td>
                <td>{{ $row->jenis }}</td>
                <td>{!! nl2br(e($row->pesan)) !!}</td>
                <td>
                    <button class="btn-info" onclick='openMessageModal(@json($row->pesan))'>Lihat Lengkap</button>
                    <a href="{{ route('admin.pelayanan.destroy', $row->id) }}" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

<div id="messageModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeMessageModal()">&times;</span>
        <h3>Pesan Lengkap</h3>
        <div id="fullMessageContent"></div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const messageModal = document.getElementById('messageModal');
    const fullMessageContent = document.getElementById('fullMessageContent');

    function openMessageModal(message) {
        fullMessageContent.innerHTML = '<p>' + message.replace(/\n/g, '<br>') + '</p>';
        messageModal.style.display = 'block';
    }

    function closeMessageModal() {
        messageModal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == messageModal) {
            closeMessageModal();
        }
    }
</script>
@endsection
