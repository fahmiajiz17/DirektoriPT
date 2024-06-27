<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Konfigurasi curl untuk mengirim permintaan ke API
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'https://sisinfo.lldikti4.id/api/restlogin/loginuser/format/json');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, [
            'username' => $username, 'password' => $password
        ]);

        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        $result = json_decode($buffer);

        // Log API response for debugging
        Log::info('API Response: ' . print_r($result, true));

        // Cek apakah login berhasil dari API
        if ($result->error) {
            // Log pesan kesalahan
            Log::error('API Login Error: ' . $result->msg);
            return redirect('/login')->with('message', 'Login gagal: ' . $result->msg);
        }

        // Jika login berhasil, buat sesi pengguna
        if ($result->status == 1) {
            $userData = $result->msg;

            // Simpan informasi pengguna ke sesi
            session(['userinfo' => $userData]);

            // Autentikasi pengguna ke aplikasi menggunakan session
            Auth::loginUsingId($userData->id_user);

            // Cek apakah checkbox 'ingat saya' dicentang
            if ($request->has('remember')) {
                Cookie::queue('username', $request->username, 120);
                Cookie::queue('password', $request->password, 120);
            } else {
                Cookie::queue(Cookie::forget('username'));
                Cookie::queue(Cookie::forget('password'));
            }

            // Alihkan ke dashboard admin
            return redirect()->intended('dashboard')->with('message', 'Berhasil masuk!');
        }

        // Alihkan kembali dengan pesan kesalahan jika login gagal
        return redirect('/login')->with('message', 'Detail login tidak valid!');
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}

// public function signup()
// {
//     return view('auth.registration');
// }

// public function postsignup(Request $request)
// {
//     $request->validate([
//         'name' => 'required',
//         'email' => 'required|email|unique:users',
//         'password' => 'required|min:6',
//         'terms' => 'accepted', // Tambahkan ini untuk validasi checkbox
//     ]);

//     $data = $request->all();
//     $check = $this->create($data);

//     return redirect("dashboard");
// }
