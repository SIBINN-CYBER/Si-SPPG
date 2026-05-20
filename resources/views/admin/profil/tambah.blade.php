@extends('layouts.admin')

@section('title', 'Tambah Admin - SI-SPPG')

@section('styles')
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding-top: 80px;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
        }
        h2 {
            color: #002b6b;
            margin-bottom: 20px;
        }
        .form-section {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #0096FF;
            box-shadow: 0 0 5px rgba(0, 150, 255, 0.3);
        }
        .form-button {
            display: flex;
            gap: 10px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
        }
        .btn-submit {
            background-color: #0096FF;
            color: white;
        }
        .btn-submit:hover {
            background-color: #0078cc;
        }
        .btn-reset {
            background-color: #6c757d;
            color: white;
        }
        .btn-reset:hover {
            background-color: #5a6268;
        }
        .message {
            padding: 12px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .message-icon {
            margin-right: 10px;
            font-size: 18px;
        }
        .table-section {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #002b6b;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .form-section {
                padding: 15px;
            }
            table {
                font-size: 13px;
            }
            th, td {
                padding: 8px;
            }
            .form-button {
                flex-direction: column;
            }
            button {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
<div class="container">
    <h2>Tambah Admin Baru</h2>

    @if(session('success'))
        <div class="message success">
            <span class="message-icon">✓</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if($errors->any())
        <div class="message error">
            <span class="message-icon">✕</span>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <div class="form-section">
        <h3 style="color: #002b6b; margin-top: 0;">Form Pendaftaran Admin</h3>
        <form method="POST" action="{{ route('admin.tambah.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ old('username') }}" 
                    required
                    placeholder="Masukkan username (minimal 3 karakter)"
                >
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    placeholder="Masukkan password (minimal 5 karakter)"
                >
            </div>

            <div class="form-group">
                <label for="namalengkap">Nama Lengkap:</label>
                <input 
                    type="text" 
                    id="namalengkap" 
                    name="namalengkap" 
                    value="{{ old('namalengkap') }}" 
                    required
                    placeholder="Masukkan nama lengkap"
                >
            </div>

            <div class="form-button">
                <button type="submit" class="btn-submit">Tambah Admin</button>
                <button type="reset" class="btn-reset">Bersihkan</button>
            </div>
        </form>
    </div>

    <div class="table-section">
        <h3 style="color: #002b6b; margin-top: 0;">Daftar Admin</h3>
        @php
            $admin_list = \App\Models\Admin::orderBy('id', 'desc')->get();
        @endphp
        @if ($admin_list->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin_list as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->namalengkap }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">Tidak ada data admin</div>
        @endif
    </div>
</div>
@endsection
