<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        background: linear-gradient(to right, #0C2876, #0096FF);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .logo img {
        width: 100px;
        margin-bottom: 20px;
    }
    .box {
        background: rgba(255, 255, 255, 0.9);
        width: 380px;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .box h2 {
        margin-bottom: 20px;
        color: #333;
    }
    .box label {
        float: left;
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
    }
    .box input {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        outline: none;
        transition: border-color 0.3s;
    }
    .box input:focus {
        border-color: #0096FF;
    }
    .btn-login {
        background: #FFDB58;
        width: 100%;
        border: none;
        padding: 15px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }
    .btn-login:hover {
        background-color: #FFC700;
    }
    .back {
        margin-top: 20px;
        display: block;
        font-size: 14px;
        text-decoration: none;
        color: #555;
        transition: color 0.3s;
    }
    .back:hover {
        color: #000;
    }
</style>
</head>
<body>

<div class="container">

    @if(session('error'))
        <script>alert("{{ session('error') }}");</script>
    @endif

    <!-- LOGO TANPA FILE, SUDAH SATU PAGE -->
    <div class="logo">
        <img src="{{ asset('assets/img/Logo_Badan_Gizi_Nasional_(2024).png') }}" alt="Logo">
    </div>

    <form action="{{ route('login') }}" method="POST" class="box">
        @csrf
        <label>Username:</label>
        <input type="text" name="username" placeholder="Username" required>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login" class="btn-login">LOGIN</button>

        <a href="{{ route('home') }}" class="back">Kembali Ke Website</a>
    </form>
</div>

</body>
</html>
