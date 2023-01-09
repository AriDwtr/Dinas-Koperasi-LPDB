<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Jadwal_Survey;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanLPDBTerimaPegawaiController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::join('detail_user', 'detail_user.id_detail', '=', 'pengajuan.id_user')
        ->select('pengajuan.*', 'detail_user.nama', 'detail_user.nik', 'detail_user.nip', 'detail_user.tempat_lahir', 'detail_user.tanggal_lahir', 'detail_user.gender', 'detail_user.telp', 'detail_user.kecamatan', 'detail_user.kelurahan', 'detail_user.kota', 'detail_user.provinsi', 'detail_user.alamat', 'detail_user.ktp')
        ->where('pengajuan.status', 'diterima')
        ->orderBy('pengajuan.updated_at', 'desc')
        ->get();

        return view('pegawai.Pengajuan_Terima.pengajuan_terima', compact(['pengajuan']));
    }

    public function buat_jadwal($id)
    {
        $pengajuan =  Pengajuan::join('detail_user', 'detail_user.id_detail', '=', 'pengajuan.id_user')
            ->join('users', 'users.id', '=', 'pengajuan.id_user')
            ->select('pengajuan.*','users.foto','users.email', 'detail_user.nama', 'detail_user.nik', 'detail_user.nip', 'detail_user.tempat_lahir', 'detail_user.tanggal_lahir', 'detail_user.gender', 'detail_user.telp', 'detail_user.kecamatan', 'detail_user.kelurahan', 'detail_user.kota', 'detail_user.provinsi', 'detail_user.alamat', 'detail_user.ktp')
            ->where('pengajuan.id_pengajuan', $id)
            ->get();

        $tanggal_survey = Jadwal_Survey::orderBy('tanggal_survey', 'desc')->first();

        return view('pegawai.Pengajuan_Terima.pengajuan_terima_create', compact(['pengajuan','tanggal_survey']));
    }

    public function store_jadwal(Request $request)
    {
        $request->validate([
            'jadwal_survey'=>'required|date'
        ]);

        $id = $request->id_pengajuan;

        Pengajuan::find($id)->update([
            'status'=>'terjadwal'
        ]);

        Jadwal_Survey::create([
            'id_pengajuan'=>$id,
            'id_user'=>$request->id_user,
            'status_survey'=>'terjadwal',
            'tanggal_survey'=>$request->jadwal_survey
        ]);


        return to_route('pegawai.pengajuan_diterima_index')->with('success','Berhasil Menambahkan Jadwal Survey Baru');


    }
}
