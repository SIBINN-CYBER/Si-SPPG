<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Menu</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; }
table { width:100%; border-collapse: collapse; margin-bottom:20px; }
th, td { border:1px solid #000; padding:8px; }
th { background:#eee; }
img { max-width:100px; max-height:100px; }
@media print {
    .no-print { display:none; }
}
</style>
</head>
<body onload="window.print()">
<h2>Data Menu</h2>
<table>
<thead>
<tr>
<th>Nama Menu</th>
<th>Tanggal</th>
<th>Menu Utama</th>
<th>Lauk</th>
<th>Saus</th>
<th>Dessert</th>
<th>Energi Besar</th>
<th>Protein Besar</th>
<th>Lemak Besar</th>
<th>Karbo Besar</th>
<th>Energi Kecil</th>
<th>Protein Kecil</th>
<th>Lemak Kecil</th>
<th>Karbo Kecil</th>
<th>Foto</th>
</tr>
</thead>
<tbody>
@foreach($menus as $row)
<tr>
<td>{{ $row->namamenu }}</td>
<td>{{ $row->tanggal }}</td>
<td>{{ $row->menu_utama }}</td>
<td>{{ $row->lauk }}</td>
<td>{{ $row->saus }}</td>
<td>{{ $row->dessert }}</td>
<td>{{ $row->energi_besar }}</td>
<td>{{ $row->protein_besar }}</td>
<td>{{ $row->lemak_besar }}</td>
<td>{{ $row->karbo_besar }}</td>
<td>{{ $row->energi_kecil }}</td>
<td>{{ $row->protein_kecil }}</td>
<td>{{ $row->lemak_kecil }}</td>
<td>{{ $row->karbo_kecil }}</td>
<td>
@if ($row->foto && file_exists(public_path('assets/uploads/'.$row->foto)))
<img src="{{ asset('assets/uploads/'.$row->foto) }}">
@endif
</td>
</tr>
@endforeach
</tbody>
</table>

<button class="no-print" onclick="window.print()">Cetak</button>
</body>
</html>
