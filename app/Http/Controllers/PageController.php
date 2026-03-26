<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        return view('pages.landing');
    }

    public function signin()
    {
        return view('pages.signin');
    }

    public function signup()
    {
        return view('pages.signup');
    }

    // Dipanggil saat form signin/signup submit — set session login
    public function doLogin(Request $request)
    {
        session(['is_logged_in' => true]);
        return redirect()->route('home');
    }

    // Logout — hapus session, redirect ke landing
    public function logout()
    {
        session()->forget('is_logged_in');
        return redirect()->route('landing');
    }

    public function home()
    {
        $transactions = [
            [
                'name'         => 'Produk 1',
                'icon_letter'  => 'P',
                'icon_class'   => 'orange',
                'time'         => 'Hari ini, 14:30',
                'amount'       => '+Rp 850K',
                'amount_class' => 'plus',
            ],
            [
                'name'         => 'Produk 2',
                'icon_letter'  => 'P',
                'icon_class'   => 'orange',
                'time'         => 'Hari ini, 14:30',
                'amount'       => '-Rp 1,3 Jt',
                'amount_class' => 'minus',
            ],
        ];

        return view('pages.home', compact('transactions'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function analisis()
    {
        return view('pages.analisis');
    }

    public function edukasi()
    {
        return view('pages.edukasi');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function settings()
    {
        return view('pages.settings');
    }
}
