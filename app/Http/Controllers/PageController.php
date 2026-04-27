<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $username = $request->input('username');

        $request->session()->put('username', $username);

        return redirect()->route('dashboard', [
            'username' => $username
        ]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username') ?? 'User';

        return view('dashboard', compact('username'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username') ?? 'User';

        $kategori = [
            'Instagram',
            'TikTok',
            'YouTube',
            'Top Up Games',
            'Pulsa dan Paket Data'
        ];

        $layanan = [
            [
                'nama' => '1000 IG Viewer Super Prom',
                'harga' => 'Rp 29.000/K'
            ],
            [
                'nama' => 'Instagram Followers',
                'harga' => 'Rp 15.000/K'
            ],
            [
                'nama' => 'TikTok Like',
                'harga' => 'Rp 12.000/K'
            ],
        ];

        return view('pengelolaan', compact('username', 'kategori', 'layanan'));
    }

    public function riwayatPesanan(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username') ?? 'User';

        $riwayatPesanan = [
            [
                'id' => '1591431',
                'layanan' => '1000 IG Viewer Super Prom',
                'jumlah' => '1000',
                'harga' => 'Rp 29.000',
                'status' => 'Success',
                'tanggal' => '2026-03-12 07:31:19',
                'from' => 'WEB'
            ],
            [
                'id' => '1587782',
                'layanan' => 'Instagram Followers',
                'jumlah' => '690',
                'harga' => 'Rp 20.010',
                'status' => 'Success',
                'tanggal' => '2026-03-02 10:29:45',
                'from' => 'WEB'
            ],
            [
                'id' => '1573961',
                'layanan' => 'TikTok Like',
                'jumlah' => '700',
                'harga' => 'Rp 8.400',
                'status' => 'Pending',
                'tanggal' => '2026-01-25 21:17:38',
                'from' => 'WEB'
            ],
        ];

        return view('riwayat-pesanan', compact('username', 'riwayatPesanan'));
    }

    public function deposit(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username') ?? 'User';

        $pembayaran = [
            'BANK BCA',
            'BANK BNI',
            'BANK BRI'
        ];

        return view('deposit', compact('username', 'pembayaran'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username') ?? 'User';

        return view('profile', compact('username'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login');
    }
}