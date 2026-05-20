@extends('layouts.admin')

@section('title', 'Admin Dashboard - SI-SPPG')

@section('styles')
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding-top: 80px; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; }
        h2 { color: #002b6b; }
        .stat-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h3 { margin-top: 0; color: #002b6b; }
        .stat-card p { font-size: 36px; font-weight: bold; margin: 10px 0; }

        @media (max-width: 768px) {
            .stat-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .stat-container {
                grid-template-columns: 1fr;
            }
            .stat-card p {
                font-size: 28px;
            }
        }
    </style>
@endsection

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    @if(session('success_login'))
        <script>alert('Login Berhasil!');</script>
    @endif

    <div class="stat-container">
        <div class="stat-card">
            <h3>Total Menu</h3>
            <p>{{ $menu_count }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Pengajuan</h3>
            <p>{{ $pelayanan_count }}</p>
        </div>
        <div class="stat-card">
            <h3>Jumlah Request</h3>
            <p>{{ $request_count }}</p>
        </div>
        <div class="stat-card">
            <h3>Jumlah Keluhan</h3>
            <p>{{ $keluhan_count }}</p>
        </div>
    </div>
</div>
@endsection
