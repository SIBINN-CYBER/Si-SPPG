@extends('layouts.admin')

@section('title', 'Profil Admin - SI-SPPG')

@section('styles')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding-top: 80px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .profile-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 20px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #1d2975, #0096FF);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        .profile-header h2 {
            margin: 0;
            color: #1d2975;
            font-size: 24px;
        }

        .profile-header p {
            color: #666;
            margin: 5px 0 0;
        }

        .info-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            width: 150px;
            font-weight: 500;
            color: #333;
        }

        .info-value {
            flex: 1;
            color: #555;
        }

        h3 {
            color: #1d2975;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1d2975;
        }

        .btn-change {
            background: linear-gradient(135deg, #1d2975, #0096FF);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-change:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-logout {
            background: #dc3545;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-logout:hover {
            background: #c82333;
        }

        .logout-section {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        @media (max-width: 768px) {
            .info-row {
                flex-direction: column;
            }

            .info-label {
                margin-bottom: 5px;
            }
        }
    </style>
@endsection

@section('content')
<div class="container">
    @if(session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif
    @if($errors->any())
        <script>alert("{{ $errors->first() }}");</script>
    @endif

    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr($admin->namalengkap, 0, 1)) }}
            </div>
            <h2>{{ $admin->namalengkap }}</h2>
            <p>{{ $admin->username }}</p>
        </div>

        <div class="profile-info">
            <div class="info-row">
                <div class="info-label">Username</div>
                <div class="info-value">{{ $admin->username }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nama Lengkap</div>
                <div class="info-value">{{ $admin->namalengkap }}</div>
            </div>
        </div>
    </div>

    <div class="profile-card">
        <h3>Ubah Profil</h3>
        <form method="POST" action="{{ route('admin.profil.update') }}">
            @csrf
            <div class="form-group">
                <label for="namalengkap">Nama Lengkap</label>
                <input type="text" id="namalengkap" name="namalengkap" value="{{ $admin->namalengkap }}" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ $admin->username }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password Baru (Biarkan kosong jika tidak diubah)</label>
                <input type="password" id="password" name="password" minlength="6">
            </div>
            <button type="submit" class="btn-change">Ubah Profil</button>
        </form>

        <div class="logout-section">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>
</div>
@endsection
