@extends('layouts.app')

@section('title', 'Login - ORCHARD PANEL')

@section('content')
<div class="login-page">
    <div class="login-box">
        <div class="login-title">ORCHARD PANEL</div>

        <hr class="login-line">

        <form action="{{ route('proses.login') }}" method="POST">
            @csrf

            <div class="input-group">
                <div class="input-icon">👤</div>
                <input type="text" name="username" placeholder="Nama Pengguna" required>
            </div>

            <div class="input-group">
                <div class="input-icon">🔒</div>
                <input type="password" name="password" placeholder="Kata Sandi" required>
            </div>

            <div class="option-row">
                <label class="remember">
                    <input type="checkbox" name="remember">
                    <span>Ingat saya</span>
                </label>

                <a href="#" class="forgot" onclick="comingSoon(event)">Lupa kata sandi?</a>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="login-bottom">
            <a href="#" onclick="comingSoon(event)">Buat akun sekarang</a>
        </div>
    </div>
</div>

<script>
    function comingSoon(event) {
        event.preventDefault();
        alert("Coming Soon 🚧");
    }
</script>
@endsection