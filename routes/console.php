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

        return redirect()->route('dashboard', [
            'username' => $username
        ]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');

        return view('dashboard', compact('username'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');

        return view('profile', compact('username'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');

        $kategori = [
            'Instagram',
            'TikTok',
            'YouTube',
            'Pulsa dan Paket Data',
            'Top Up Games'
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
}