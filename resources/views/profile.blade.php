@extends('layouts.app')

@section('title', 'Profile - ORCHARD PANEL')

@section('content')

@php
    $username = $username ?? request('username') ?? 'User';
@endphp

<div class="dashboard-wrapper">

    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="brand">ORCHARD PANEL</div>
            <div class="menu-circle">☰</div>
        </div>

        <div class="user-box">
            <div class="avatar">👨‍💼</div>
            <div>
                <div class="user-name">{{ $username }}</div>
                <div class="user-role">Member⌄</div>
            </div>
        </div>

        <div class="nav-title">Navigasi</div>

        <a href="{{ route('dashboard', ['username' => $username]) }}" class="nav-link">
            <span class="nav-left">
                <span class="nav-icon blue">⌂</span>
                <span>Halaman Utama</span>
            </span>
        </a>

        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="nav-link">
            <span class="nav-left">
                <span class="nav-icon green">🛒</span>
                <span>Pesanan</span>
            </span>
        </a>

        <a href="{{ route('deposit', ['username' => $username]) }}" class="nav-link">
            <span class="nav-left">
                <span class="nav-icon orange">$</span>
                <span>Deposit</span>
            </span>
        </a>

        <a href="{{ route('profile', ['username' => $username]) }}" class="nav-link">
            <span class="nav-left">
                <span class="nav-icon purple">👤</span>
                <span>Profile</span>
            </span>
        </a>
    </aside>

    <main class="main-content">
        @include('components.navbar')

        <div class="content-area">

            <div style="
                background: linear-gradient(135deg, #427df5, #7c4dff);
                border-radius: 18px;
                padding: 35px;
                color: white;
                box-shadow: 0 12px 30px rgba(66, 125, 245, 0.35);
                margin-bottom: 28px;
                position: relative;
                overflow: hidden;
            ">
                <div style="
                    position: absolute;
                    width: 180px;
                    height: 180px;
                    background: rgba(255,255,255,0.12);
                    border-radius: 50%;
                    right: -50px;
                    top: -50px;
                "></div>

                <div style="display: flex; align-items: center; gap: 22px;">
                    <div style="
                        width: 90px;
                        height: 90px;
                        border-radius: 50%;
                        background: white;
                        color: #427df5;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 48px;
                        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                    ">
                        👨‍💼
                    </div>

                    <div>
                        <h1 style="margin: 0; font-size: 30px;">{{ $username }}</h1>
                        <p style="margin: 8px 0 0; opacity: 0.9;">Member ORCHARD PANEL</p>
                    </div>
                </div>
            </div>

            <div style="
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
                margin-bottom: 28px;
            ">
                <div class="profile-card">
                    <h3 style="margin-top: 0; color:#427df5;">Saldo Akun</h3>
                    <h2 style="margin-bottom: 0;">Rp 209</h2>
                    <p style="color:#6b7280;">Saldo tersedia saat ini</p>
                </div>

                <div class="profile-card">
                    <h3 style="margin-top: 0; color:#8bc34a;">Total Pesanan</h3>
                    <h2 style="margin-bottom: 0;">6</h2>
                    <p style="color:#6b7280;">Jumlah pesanan pengguna</p>
                </div>

                <div class="profile-card">
                    <h3 style="margin-top: 0; color:#ff9800;">Status</h3>
                    <h2 style="margin-bottom: 0;">Member</h2>
                    <p style="color:#6b7280;">Status akun saat ini</p>
                </div>
            </div>

            <div class="profile-card">
                <h2 style="margin-top: 0;">Informasi Akun</h2>

                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 20px;
                    margin-top: 22px;
                ">
                    <div style="
                        background:#f4f6fb;
                        padding:18px;
                        border-radius:12px;
                        border-left:5px solid #427df5;
                    ">
                        <p style="margin:0; color:#6b7280;">Username</p>
                        <h3 style="margin:8px 0 0;">{{ $username }}</h3>
                    </div>

                    <div style="
                        background:#f4f6fb;
                        padding:18px;
                        border-radius:12px;
                        border-left:5px solid #8bc34a;
                    ">
                        <p style="margin:0; color:#6b7280;">Level Akun</p>
                        <h3 style="margin:8px 0 0;">Member</h3>
                    </div>

                    <div style="
                        background:#f4f6fb;
                        padding:18px;
                        border-radius:12px;
                        border-left:5px solid #ffb13d;
                    ">
                        <p style="margin:0; color:#6b7280;">Bergabung Sejak</p>
                        <h3 style="margin:8px 0 0;">April 2026</h3>
                    </div>

                    <div style="
                        background:#f4f6fb;
                        padding:18px;
                        border-radius:12px;
                        border-left:5px solid #7c4dff;
                    ">
                        <p style="margin:0; color:#6b7280;">Status Akun</p>
                        <h3 style="margin:8px 0 0;">Aktif</h3>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>
@endsection