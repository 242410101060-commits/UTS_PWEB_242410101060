@extends('layouts.app')

@section('title', 'Pesanan Baru - ORCHARD PANEL')

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

            <div class="notice-box">
                Apabila pesanan tidak mengalami perubahan status minimal dalam 24 jam,
                silahkan komplain ke admin melalui WhatsApp. Tidak ada pengembalian dana
                untuk kesalahan pengguna.
            </div>

            <div class="order-card">
                <h3>Buat Pesanan Anda</h3>

                <form id="formPesanan" action="#" method="POST">
                    @csrf

                    <label class="form-label">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" required>
                        <option value="">Pilih...</option>
                        <option value="Instagram">Instagram</option>
                        <option value="TikTok">TikTok</option>
                    </select>

                    <label class="form-label">Layanan</label>
                    <select class="form-control" id="layanan" name="layanan" required>
                        <option value="">Pilih Kategori...</option>
                    </select>

                    <label class="form-label">Harga/K</label>
                    <input type="text" class="form-control" id="hargaTampil" value="" disabled>

                    <label class="form-label">Data</label>
                    <input type="text" class="form-control" id="dataPesanan" name="data" placeholder="Link/username" required>

                    <label class="form-label">Jumlah Pesan</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="1000" required>

                    <label class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="totalHarga" value="" disabled>

                    <div class="form-warning">*Inputkan jumlah pesan</div>

                    <div class="btn-row">
                        <button type="reset" class="btn-reset" id="btnReset">Reset</button>
                        <button type="submit" class="btn-order">Pesan</button>
                    </div>
                </form>
            </div>

        </div>
    </main>

</div>

<div class="popup-overlay" id="popupSukses">
    <div class="popup-card">
        <div class="popup-icon">✓</div>
        <h2>Pesanan Berhasil!</h2>
        <p>Pesanan kamu sudah berhasil dibuat dan sedang diproses.</p>

        <div class="popup-detail">
            <div>
                <span>Layanan</span>
                <b id="popupLayanan">-</b>
            </div>
            <div>
                <span>Jumlah</span>
                <b id="popupJumlah">-</b>
            </div>
            <div>
                <span>Total Harga</span>
                <b id="popupTotal">-</b>
            </div>
        </div>

        <button type="button" class="popup-button" onclick="tutupPopup()">Oke, Mengerti</button>
    </div>
</div>

<style>
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
</style>

<script>
    const layananData = [
        { kategori: 'Instagram', nama: 'Foll Promo [R30]', harga: 14000 },
        { kategori: 'Instagram', nama: 'Foll Premium [R30]', harga: 15000 },
        { kategori: 'Instagram', nama: 'Foll Pertamax [R60]', harga: 17000 },
        { kategori: 'Instagram', nama: 'Foll Express [R60]', harga: 18000 },
        { kategori: 'TikTok', nama: 'TikTok Like Promo', harga: 12000 },
        { kategori: 'TikTok', nama: 'TikTok Followers', harga: 16000 }
    ];

    const formPesanan = document.getElementById('formPesanan');
    const kategoriSelect = document.getElementById('kategori');
    const layananSelect = document.getElementById('layanan');
    const hargaTampil = document.getElementById('hargaTampil');
    const jumlahInput = document.getElementById('jumlah');
    const totalHarga = document.getElementById('totalHarga');
    const btnReset = document.getElementById('btnReset');

    const popupSukses = document.getElementById('popupSukses');
    const popupLayanan = document.getElementById('popupLayanan');
    const popupJumlah = document.getElementById('popupJumlah');
    const popupTotal = document.getElementById('popupTotal');

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function isiLayanan(kategori) {
        layananSelect.innerHTML = '<option value="">Pilih Kategori...</option>';

        layananData.forEach(function(item, index) {
            if (item.kategori === kategori) {
                let option = document.createElement('option');
                option.value = index;
                option.textContent = item.nama + ' Rp.' + item.harga.toLocaleString('id-ID') + '/K';
                layananSelect.appendChild(option);
            }
        });
    }

    function hitungTotal() {
        const index = layananSelect.value;
        const jumlah = parseInt(jumlahInput.value);

        if (index !== '' && jumlah > 0) {
            const harga = layananData[index].harga;
            const total = harga * jumlah / 1000;
            totalHarga.value = formatRupiah(total);
        } else {
            totalHarga.value = '';
        }
    }

    kategoriSelect.addEventListener('change', function() {
        isiLayanan(this.value);
        hargaTampil.value = '';
        totalHarga.value = '';
        jumlahInput.value = '';
    });

    layananSelect.addEventListener('change', function() {
        const index = this.value;

        if (index !== '') {
            hargaTampil.value = formatRupiah(layananData[index].harga) + '/K';
            hitungTotal();
        } else {
            hargaTampil.value = '';
            totalHarga.value = '';
        }
    });

    jumlahInput.addEventListener('input', hitungTotal);

    btnReset.addEventListener('click', function() {
        layananSelect.innerHTML = '<option value="">Pilih Kategori...</option>';
        hargaTampil.value = '';
        totalHarga.value = '';
    });

    formPesanan.addEventListener('submit', function(event) {
        event.preventDefault();

        const index = layananSelect.value;
        const jumlah = jumlahInput.value;

        if (kategoriSelect.value === '' || index === '' || jumlah === '' || totalHarga.value === '') {
            alert('Lengkapi data pesanan terlebih dahulu!');
            return;
        }

        popupLayanan.textContent = layananData[index].nama;
        popupJumlah.textContent = jumlah;
        popupTotal.textContent = totalHarga.value;

        popupSukses.classList.add('active');
    });

    function tutupPopup() {
        popupSukses.classList.remove('active');
        formPesanan.reset();
        layananSelect.innerHTML = '<option value="">Pilih Kategori...</option>';
        hargaTampil.value = '';
        totalHarga.value = '';
    }
</script>

@endsection