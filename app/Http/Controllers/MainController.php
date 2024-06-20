<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        // Validasi data yang diterima dari permintaan
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil kredensial dari permintaan
        $credentials = $request->only('email', 'password');

        // Periksa apakah checkbox 'remember' dicentang
        $ingat = $request->has('remember');

        // Coba login pengguna dengan kredensial dan opsi remember
        if (Auth::attempt($credentials, $ingat)) {
            if ($ingat) {
                Cookie::queue('email', $request->email, 120);
                Cookie::queue('password', $request->password, 120);
            } else {
                Cookie::queue(Cookie::forget('email'));
                Cookie::queue(Cookie::forget('password'));
            }
            return redirect()->intended('dashboard')->with('message', 'Berhasil masuk!');
        }

        // Alihkan kembali dengan pesan kesalahan jika login gagal
        return redirect('/login')->with('message', 'Detail login tidak valid!');
    }


    public function signup()
    {
        return view('auth.registration');
    }

    public function postsignup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'terms' => 'accepted', // Tambahkan ini untuk validasi checkbox
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard");
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.dashboard_admin');
        }
        return redirect('/login');
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
