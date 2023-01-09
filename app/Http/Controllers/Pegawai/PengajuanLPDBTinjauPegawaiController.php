<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanLPDBTinjauPegawaiController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::join('detail_user', 'detail_user.id_detail', '=', 'pengajuan.id_user')
            ->select('pengajuan.*', 'detail_user.nama', 'detail_user.nik', 'detail_user.nip', 'detail_user.tempat_lahir', 'detail_user.tanggal_lahir', 'detail_user.gender', 'detail_user.telp', 'detail_user.kecamatan', 'detail_user.kelurahan', 'detail_user.kota', 'detail_user.provinsi', 'detail_user.alamat', 'detail_user.ktp')
            ->where('pengajuan.status', 'ditinjau')
            ->orderBy('pengajuan.updated_at', 'desc')
            ->get();

        return view('pegawai.Pengajuan_Tinjau.pengajuan_tinjau', compact(['pengajuan']));
    }

    public function detail_pengajuan_tinjau($id)
    {
        $pengajuan =  Pengajuan::join('detail_user', 'detail_user.id_detail', '=', 'pengajuan.id_user')
            ->join('users', 'users.id', '=', 'pengajuan.id_user')
            ->select('pengajuan.*','users.foto','users.email', 'detail_user.nama', 'detail_user.nik', 'detail_user.nip', 'detail_user.tempat_lahir', 'detail_user.tanggal_lahir', 'detail_user.gender', 'detail_user.telp', 'detail_user.kecamatan', 'detail_user.kelurahan', 'detail_user.kota', 'detail_user.provinsi', 'detail_user.alamat', 'detail_user.ktp')
            ->where('pengajuan.id_pengajuan', $id)
            ->get();

        return view('pegawai.Pengajuan_Tinjau.pengajuan_tinjau_cek', compact(['pengajuan']));
    }
}
