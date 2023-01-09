<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class ProsesPengajuanLPDBPegawaiController extends Controller
{
    public function terima($id)
    {
        Pengajuan::find($id)->update([
            'status'=>'diterima'
        ]);

        return to_route('pegawai.pengajuan_tinjau')->with('success','Berhasil Menerima Pengajuan Dana LPDB');
    }

    public function tolak(Request $request)
    {
        $id = $request->id_pengajuan;

        Pengajuan::find($id)->update([
            'status'=>'ditolak',
            'keterangan'=>$request->alasan_tolak
        ]);

        return to_route('pegawai.pengajuan_tinjau')->with('success','Berhasil Menolak Pengajuan LPDB');
    }
}
