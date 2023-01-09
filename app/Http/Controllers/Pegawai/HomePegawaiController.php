<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePegawaiController extends Controller
{

    public function index()
    {
        return view('pegawai.home.home');
    }
}
