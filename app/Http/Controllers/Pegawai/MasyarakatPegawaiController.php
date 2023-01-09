<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;

class MasyarakatPegawaiController extends Controller
{
    public function index()
    {
        $masyarakat = User::join('detail_user','detail_user.id_detail','=','users.id')
        ->where('users.type','masyarakat')->orderBy('users.created_at','desc')->get();

        return view('pegawai.masyarakat.masyarakat', compact(['masyarakat']));
    }

    public function detail_masyarakat($id)
    {
        $data1 = User::find($id);
        $data2 = DetailUser::find($id);

        return view('pegawai.masyarakat.masyarakat_detail', compact(['data1','data2']));
    }
}
