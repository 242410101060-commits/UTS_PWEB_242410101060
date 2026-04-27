@extends('layouts.app')

@section('title', 'Deposit - ORCHARD PANEL')

@section('content')

@php
    $username = $username ?? request('username') ?? 'User';

    $pembayaran = $pembayaran ?? [
        'BANK BCA',
        'BANK BNI',
        'BANK BRI'
    ];
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

            <div class="deposit-header">
                <div class="deposit-icon">🛒</div>

                <div>
                    <h2>Forms Deposit</h2>
                    <p>Deposit Auto Menggunakan Payment Bank</p>
                </div>

                <div class="breadcrumb">
                    🛒 / Home / Deposit
                </div>
            </div>

            <div class="deposit-grid">

                <div class="deposit-card">
                    <h3>Deposit</h3>

                    <form id="formDeposit" action="#" method="POST">
                        @csrf

                        <label class="form-label">Jenis Pembayaran*</label>
                        <select class="form-control" id="jenisPembayaran" required>
                            <option value="">Pilih...</option>
                            @foreach($pembayaran as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>

                        <label class="form-label">Informasi Tambahan*</label>
                        <input type="text" class="form-control" id="pengirim" placeholder="Pengirim ( Nama / Nomor )" required>

                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlahDeposit" required>

                        <label class="form-label">Saldo Diterima</label>
                        <input type="text" class="form-control" id="saldoDiterima" disabled>

                        <div class="btn-row">
                            <button type="reset" class="btn-reset" id="resetDeposit">Reset</button>
                            <button type="submit" class="btn-order">Deposit</button>
                        </div>
                    </form>
                </div>

                <div class="deposit-info">
                    <div class="info-title">Cara Melakukan Deposit</div>

                    <div class="info-body">
                        <p>
                            Silahkan transfer sesuai nominal persis yang tertera di jumlah,
                            saldo akan otomatis masuk dalam 1-10 menit.
                            Jika dalam 15 menit saldo tidak masuk, silahkan konfirmasi ke CS.
                        </p>

                        <p>
                            JADWAL CS ONLINE:<br>
                            - SENIN - JUM'AT 07.30 - 20.00 WIB<br>
                            - SABTU - MINGGU 07.30 - 16.00 WIB<br>
                            - Nomor WhatsApp CS 081225028888
                        </p>
                    </div>

                    <div class="info-footer">
                        OrchardPanel
                    </div>
                </div>

            </div>

        </div>
    </main>
</div>

<div class="popup-overlay" id="popupDeposit">
    <div class="popup-card">
        <div class="popup-icon">✓</div>

        <h2>Deposit Berhasil Dibuat!</h2>
        <p>Silahkan transfer sesuai nominal yang kamu masukkan.</p>

        <div class="popup-detail">
            <div>
                <span>Bank</span>
                <b id="popupBank">-</b>
            </div>

            <div>
                <span>Pengirim</span>
                <b id="popupPengirim">-</b>
            </div>

            <div>
                <span>Saldo Diterima</span>
                <b id="popupSaldo">-</b>
            </div>
        </div>

        <button type="button" class="popup-button" onclick="tutupPopupDeposit()">Oke, Mengerti</button>
    </div>
</div>

<style>
    .deposit-header {
        background: white;
        min-height: 115px;
        border-radius: 5px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.12);
        display: flex;
        align-items: center;
        gap: 22px;
        padding: 28px 34px;
        margin-bottom: 32px;
        position: relative;
    }

    .deposit-icon {
        width: 58px;
        height: 58px;
        background: #427df5;
        color: white;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        box-shadow: 0 6px 14px rgba(66,125,245,0.35);
    }

    .deposit-header h2 {
        margin: 0;
        font-size: 24px;
    }

    .deposit-header p {
        margin: 8px 0 0;
        color: #8c95a3;
    }

    .breadcrumb {
        margin-left: auto;
        color: #374151;
        font-size: 16px;
    }

    .deposit-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 32px;
    }

    .deposit-card {
        background: white;
        border-radius: 5px;
        padding: 28px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.12);
    }

    .deposit-card h3 {
        margin-top: 0;
        margin-bottom: 26px;
    }

    .deposit-info {
        background: white;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(0,0,0,0.12);
        align-self: start;
    }

    .info-title {
        background: #f7557a;
        color: white;
        padding: 16px 18px;
        font-size: 17px;
        font-weight: bold;
    }

    .info-body {
        padding: 18px;
        line-height: 1.6;
        color: #18233c;
    }

    .info-footer {
        border-top: 1px solid #e5e7eb;
        padding: 15px 18px;
        color: #f7557a;
    }

    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.65);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        padding: 20px;
    }

    .popup-overlay.active {
        display: flex;
    }

    .popup-card {
        width: 420px;
        background: white;
        border-radius: 18px;
        padding: 32px 28px;
        text-align: center;
        box-shadow: 0 25px 60px rgba(0,0,0,0.35);
        animation: popupMasuk 0.35s ease;
    }

    .popup-icon {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        background: #22c55e;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 46px;
        font-weight: bold;
        margin: 0 auto 18px;
        box-shadow: 0 10px 25px rgba(34, 197, 94, 0.35);
    }

    .popup-card h2 {
        margin: 0 0 10px;
        color: #18233c;
        font-size: 25px;
    }

    .popup-card p {
        color: #6b7280;
        margin-bottom: 22px;
        line-height: 1.6;
    }

    .popup-detail {
        background: #f4f6fb;
        border-radius: 12px;
        padding: 16px;
        text-align: left;
        margin-bottom: 24px;
    }

    .popup-detail div {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 9px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .popup-detail div:last-child {
        border-bottom: none;
    }

    .popup-detail span {
        color: #6b7280;
    }

    .popup-detail b {
        color: #18233c;
        text-align: right;
    }

    .popup-button {
        width: 100%;
        border: none;
        background: #427df5;
        color: white;
        padding: 14px;
        font-size: 16px;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
    }

    .popup-button:hover {
        background: #2563eb;
    }

    @keyframes popupMasuk {
        from {
            opacity: 0;
            transform: translateY(25px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @media (max-width: 900px) {
        .deposit-grid {
            grid-template-columns: 1fr;
        }

        .breadcrumb {
            display: none;
        }
    }
</style>

<script>
    const formDeposit = document.getElementById('formDeposit');
    const jenisPembayaran = document.getElementById('jenisPembayaran');
    const pengirim = document.getElementById('pengirim');
    const jumlahDeposit = document.getElementById('jumlahDeposit');
    const saldoDiterima = document.getElementById('saldoDiterima');
    const resetDeposit = document.getElementById('resetDeposit');

    const popupDeposit = document.getElementById('popupDeposit');
    const popupBank = document.getElementById('popupBank');
    const popupPengirim = document.getElementById('popupPengirim');
    const popupSaldo = document.getElementById('popupSaldo');

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    jumlahDeposit.addEventListener('input', function () {
        const jumlah = parseInt(this.value);

        if (jumlah > 0) {
            saldoDiterima.value = formatRupiah(jumlah);
        } else {
            saldoDiterima.value = '';
        }
    });

    resetDeposit.addEventListener('click', function () {
        saldoDiterima.value = '';
    });

    formDeposit.addEventListener('submit', function (event) {
        event.preventDefault();

        if (jenisPembayaran.value === '' || pengirim.value === '' || jumlahDeposit.value === '') {
            alert('Lengkapi data deposit terlebih dahulu!');
            return;
        }

        popupBank.textContent = jenisPembayaran.value;
        popupPengirim.textContent = pengirim.value;
        popupSaldo.textContent = saldoDiterima.value;

        popupDeposit.classList.add('active');
    });

    function tutupPopupDeposit() {
        popupDeposit.classList.remove('active');
        formDeposit.reset();
        saldoDiterima.value = '';
    }
</script>

@endsection