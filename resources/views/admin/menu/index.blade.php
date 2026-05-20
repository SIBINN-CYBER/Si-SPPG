@extends('layouts.admin')

@section('title', 'Kelola Menu - Admin')

@section('styles')
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding-top: 80px; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { color: #002b6b; }
        .btn { padding: 8px 12px; border: none; border-radius: 4px; color: white; text-decoration: none; cursor: pointer; }
        .btn-add { background-color: #28a745; }
        .btn-edit { background-color: #ffc107; }
        .btn-delete { background-color: #dc3545; }
        .btn-print { background-color: #17a2b8; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        .table-wrapper {
            overflow-x: auto;
        }
        .modal { display: none; position: fixed; z-index: 1001; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4); }
        .modal-content { background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 8px; }
        .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; }
    </style>
@endsection

@section('content')
<div class="container">
    <h2>Kelola Menu</h2>
    <form action="{{ route('admin.menu') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Cari Nama Menu..." value="{{ $search }}">
        <button type="submit" class="btn btn-add">Cari</button>
    </form>

    <button class="btn btn-add" onclick="openModal(null)">Tambah Menu</button>
    <button class="btn btn-add" onclick="printAll()">Cetak Semua</button>
    <button class="btn btn-add" onclick="printSelected()">Cetak Terpilih</button>

    <div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)"></th>
                <th>Nama Menu</th>
                <th>Tanggal</th>
                <th>Menu Utama</th>
                <th>Lauk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $row)
            <tr>
                <td><input type="checkbox" class="rowCheckbox" value="{{ $row->id }}"></td>
                <td>{{ $row->namamenu }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->menu_utama }}</td>
                <td>{{ $row->lauk }}</td>
                <td>
                    <button class="btn btn-print" onclick="printSelectedSingle({{ $row->id }})">Cetak</button>
                    <button class="btn btn-info" onclick='openGiziModal(@json($row))'>Lihat Gizi</button>
                    <button class="btn btn-edit" onclick='openModal(@json($row))'>Edit</button>
                    <a href="{{ route('admin.menu.destroy', $row->id) }}" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

<div id="menuModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 id="modalTitle">Tambah Menu</h3>
        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data" id="menuForm">
            @csrf
            <input type="hidden" name="id" id="menuId">
            <p><label>Nama Menu: <input type="text" name="namamenu" id="namamenu" required></label></p>
            <p><label>Tanggal: <input type="date" name="tanggal" id="tanggal" required></label></p>
            <p><label>Menu Utama: <input type="text" name="menu_utama" id="menu_utama" required></label></p>
            <p><label>Lauk: <input type="text" name="lauk" id="lauk"></label></p>
            <p><label>Saus: <input type="text" name="saus" id="saus"></label></p>
            <p><label>Dessert: <input type="text" name="dessert" id="dessert"></label></p>
            <p><label>Energi (Besar): <input type="text" name="energi_besar" id="energi_besar"></label></p>
            <p><label>Protein (Besar): <input type="text" name="protein_besar" id="protein_besar"></label></p>
            <p><label>Lemak (Besar): <input type="text" name="lemak_besar" id="lemak_besar"></label></p>
            <p><label>Karbohidrat (Besar): <input type="text" name="karbo_besar" id="karbo_besar"></label></p>
            <p><label>Energi (Kecil): <input type="text" name="energi_kecil" id="energi_kecil"></label></p>
            <p><label>Protein (Kecil): <input type="text" name="protein_kecil" id="protein_kecil"></label></p>
            <p><label>Lemak (Kecil): <input type="text" name="lemak_kecil" id="lemak_kecil"></label></p>
            <p><label>Karbohidrat (Kecil): <input type="text" name="karbo_kecil" id="karbo_kecil"></label></p>
            <p><label>Foto: <input type="file" name="foto" id="foto"></label></p>
            <button type="submit" class="btn btn-add">Simpan</button>
        </form>
    </div>
</div>

<div id="giziModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeGiziModal()">&times;</span>
        <h3>Informasi Gizi</h3>
        <div id="giziContent"></div>
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
            lauk.value = data.lauk;
            saus.value = data.saus;
            dessert.value = data.dessert;
            energi_besar.value = data.energi_besar;
            protein_besar.value = data.protein_besar;
            lemak_besar.value = data.lemak_besar;
            karbo_besar.value = data.karbo_besar;
            energi_kecil.value = data.energi_kecil;
            protein_kecil.value = data.protein_kecil;
            lemak_kecil.value = data.lemak_kecil;
            karbo_kecil.value = data.karbo_kecil;
        } else {
            modalTitle.innerText = 'Tambah Menu';
            menuId.value = '';
            document.getElementById('menuForm').action = "{{ route('admin.menu.store') }}";
            document.getElementById('menuModal').querySelector('form').reset();
        }
        modal.style.display = 'block';
    }

    function closeModal() {
        modal.style.display = 'none';
    }

    function openGiziModal(data) {
        giziContent.innerHTML = '';
        giziContent.innerHTML += `<p><strong>Energi (Besar):</strong> ${data.energi_besar}</p>`;
        giziContent.innerHTML += `<p><strong>Protein (Besar):</strong> ${data.protein_besar}</p>`;
        giziContent.innerHTML += `<p><strong>Lemak (Besar):</strong> ${data.lemak_besar}</p>`;
        giziContent.innerHTML += `<p><strong>Karbohidrat (Besar):</strong> ${data.karbo_besar}</p>`;
        giziContent.innerHTML += `<p><strong>Energi (Kecil):</strong> ${data.energi_kecil}</p>`;
        giziContent.innerHTML += `<p><strong>Protein (Kecil):</strong> ${data.protein_kecil}</p>`;
        giziContent.innerHTML += `<p><strong>Lemak (Kecil):</strong> ${data.lemak_kecil}</p>`;
        giziContent.innerHTML += `<p><strong>Karbohidrat (Kecil):</strong> ${data.karbo_kecil}</p>`;
        giziModal.style.display = 'block';
    }

    function closeGiziModal() {
        giziModal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
        if (event.target == giziModal) {
            closeGiziModal();
        }
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
            alert('Pilih minimal satu menu.');
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
