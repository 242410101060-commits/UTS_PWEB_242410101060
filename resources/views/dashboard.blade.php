@extends('layouts.app')

@section('title', 'Dashboard - ORCHARD PANEL')

@section('content')
<div class="dashboard-wrapper">

    <aside class="sidebar custom-sidebar">
        <div>
            <div class="sidebar-header">
                <div class="brand">ORCHARD PANEL</div>
                <div class="menu-circle">☰</div>
            </div>

            <div class="user-box">
                <div class="avatar">👨‍💼</div>
                <div>
                    <div class="user-name">{{ $username ?? 'User' }}</div>
                    <div class="user-role">Member⌄</div>
                </div>
            </div>

            <div class="nav-title">Navigasi</div>

            <a href="{{ route('dashboard', ['username' => $username ?? 'User']) }}" class="nav-link touch-link">
                <span class="nav-left">
                    <span class="nav-icon blue">⌂</span>
                    <span>Halaman Utama</span>
                </span>
            </a>

            <a href="{{ route('pengelolaan', ['username' => $username ?? 'User']) }}" class="nav-link touch-link">
                <span class="nav-left">
                    <span class="nav-icon green">🛒</span>
                    <span>Pesanan</span>
                </span>
            </a>

            <a href="{{ route('deposit', ['username' => $username ?? 'User']) }}" class="nav-link touch-link">
                <span class="nav-left">
                    <span class="nav-icon orange">$</span>
                    <span>Deposit</span>
                </span>
            </a>

            <a href="{{ route('profile', ['username' => $username ?? 'User']) }}" class="nav-link touch-link">
                <span class="nav-left">
                    <span class="nav-icon purple">👤</span>
                    <span>Profile</span>
                </span>
            </a>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="logout-bottom">
            @csrf
            <button type="submit" class="logout-btn">
                <span class="nav-icon red">⎋</span>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <main class="main-content">
        @include('components.navbar')

        <div class="content-area">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">💳</div>
                    <div class="stat-title" style="color:#477df6;">Saldo Akun</div>
                    <div class="stat-value">Rp 209</div>
                    <div class="stat-info">ℹ️ Saldo tersedia saat ini</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon green">🛒</div>
                    <div class="stat-title" style="color:#8bc34a;">Pembelian</div>
                    <div class="stat-value">6</div>
                    <div class="stat-info">ℹ️ Pembelian Anda</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">💰</div>
                    <div class="stat-title" style="color:#ff9800;">Total Deposit</div>
                    <div class="stat-value">7</div>
                    <div class="stat-info">ℹ️ Total Deposit Anda</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon purple">👔</div>
                    <div class="stat-title" style="color:#7c4dff;">Status Akun</div>
                    <div class="stat-value">Member</div>
                    <div class="stat-info">ℹ️ Status Akun Anda</div>
                </div>
            </div>

            <div class="running-box">
                k**** telah melakukan pembelian 1000 IG VIEWER SUPER PROM
            </div>

            <div class="welcome-card">
                <h2>Selamat Datang, {{ $username ?? 'User' }}</h2>
                <p>
                    Ini adalah halaman utama pengguna ORCHARD PANEL.
                    Pada halaman ini pengguna dapat melihat saldo akun, jumlah pembelian,
                    total deposit, dan status akun.
                </p>
            </div>
        </div>
    </main>

</div>

<style>
    .custom-sidebar {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .touch-link {
        transition: all 0.18s ease;
    }

    .touch-link:hover {
        transform: translateX(6px);
        background: #f1f5f9;
    }

    .touch-link:active {
        transform: scale(0.96);
        background: #e5e7eb;
    }

    .logout-bottom {
        margin: 0;
        padding: 18px 22px 28px;
    }

    .logout-btn {
        width: 100%;
        border: none;
        background: #fff;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 13px;
        font-size: 16px;
        cursor: pointer;
        padding: 12px 0;
        border-radius: 10px;
        transition: all 0.18s ease;
    }

    .logout-btn:hover {
        background: #fff1f2;
        color: #e11d48;
        transform: translateX(6px);
    }

    .logout-btn:active {
        transform: scale(0.94);
        background: #ffe4e6;
    }
</style>
@endsection