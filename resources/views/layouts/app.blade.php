<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title', 'SI-SPPG Pucang 2')</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  @yield('styles')
  <style>
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background-color: #1d2975;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 40px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      z-index: 100;
      height: 66px; /* standard height */
      box-sizing: border-box;
      font-family: 'Inter', sans-serif; /* Apply Inter font */
    }

    .navbar-left { display: flex; align-items: center; gap: 12px; }
    .navbar-left img { height: 50px; width: 50px; object-fit: contain; border-radius: 6px; }
    .navbar-left h1 { font-family: 'Inter', sans-serif; font-size: 22px; font-weight: 700; color: #ffffff; margin: 0; }

    .navbar-right { display: flex; align-items: center; gap: 25px; }
    .navbar-right a { color: #ffffff; text-decoration: none; font-size: 15px; font-weight: 500; padding-bottom: 6px; font-family: 'Inter', sans-serif; }
    .navbar-right a.active { border-bottom: 2px solid #ffffff; }
    .navbar-right a:hover { opacity: 0.9; }

    .hamburger {
      display: none; /* Hidden by default */
      flex-direction: column;
      justify-content: space-around;
      width: 30px;
      height: 20px;
      background: transparent;
      border: none;
      cursor: pointer;
      padding: 0;
      z-index: 200;
    }

    .hamburger-line {
      width: 100%;
      height: 2px;
      background: #fff;
      border-radius: 10px;
      transition: all 0.3s linear;
      position: relative;
    }

    @media (max-width: 768px) {
      .navbar-right {
        display: none; /* Hide nav links by default on small screens */
        flex-direction: column;
        width: 100%;
        position: absolute;
        top: 66px; /* Below the navbar */
        left: 0;
        background-color: #1d2975;
        padding: 10px 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      }

      .navbar-right.open {
        display: flex; /* Show when open */
      }

      .navbar-right a {
        padding: 10px 0;
        width: 100%;
        text-align: center;
      }

      .hamburger {
        display: flex; /* Show hamburger on small screens */
      }

      .navbar { flex-direction: row; align-items: center; justify-content: space-between; padding: 10px 20px; height: 66px; }
    }

    @media (max-width: 480px) {
      .navbar-left h1 {
          font-size: 18px;
      }
      .navbar-right a {
          font-size: 14px;
      }
    }

    .site-footer {
       text-align: center;
       background: #d9d9d9;
       padding: 16px 0;
       z-index: 10;
    }

    .footer-p {
       color: #000;
       text-align: center;
       font-family: 'Segoe UI', Arial, sans-serif;
    }
  </style>
</head>
<body>

<nav class="navbar">
  <div class="navbar-left">
    <img src="{{ asset('assets/img/Logo_Badan_Gizi_Nasional_(2024).png') }}" alt="Logo Badan Gizi">
    <h1>SI-SPPG Pucang 2</h1>
  </div>

  <div class="navbar-right">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
    <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'active' : '' }}">Menu</a>
    <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang Kami</a>
    <a href="{{ route('pelayanan.create') }}" class="{{ request()->routeIs('pelayanan.create') ? 'active' : '' }}">Pelayanan & Pengajuan</a>
  </div>
  <button class="hamburger" aria-label="Toggle navigation">
    <span class="hamburger-line"></span>
    <span class="hamburger-line"></span>
    <span class="hamburger-line"></span>
  </button>
</nav>

@yield('content')

<footer class="site-footer">
    <p class="footer-p">&copy;2025 Satuan Pelayanan Pemenuhan Gizi. All rights reserved
    @if(request()->routeIs('pelayanan.create'))
    | <a href="{{ route('login') }}" style="color: #000; text-decoration: none;">Login Admin</a>
    @endif
    </p>
</footer>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navRight = document.querySelector('.navbar-right');

    if (hamburger && navRight) {
        hamburger.addEventListener('click', function() {
            navRight.classList.toggle('open');
        });
    }
  });
</script>
@yield('scripts')
</body>
</html>
