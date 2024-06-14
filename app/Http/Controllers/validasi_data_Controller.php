<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class validasi_data_Controller extends Controller
{
    public function validasi_apt()
    {
        return view('admin.validasi_apt');
    }

    public function validasi_aprodi()
    {
        return view('admin.validasi_aprodi');
    }
}
