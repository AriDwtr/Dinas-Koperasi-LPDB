<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DownloadBerkasPengajuanLPDBPegawaiController extends Controller
{
    public function permohonan($id)
    {
        $data = Pengajuan::find($id);
        $filePath = public_path('koperasi/permohonan/'.$data->permohonan);
        $headers = ['Content-Type: application/pdf'];
        $fileName = '[Nomor_P-'.date('m', strtotime($data->created_at)).'-0'.$data->id_pengajuan.']'.$data->nama_usaha.'- Permohonan.pdf';

        return response()->download($filePath, $fileName, $headers);
    }

    public function proposal($id)
    {
        $data = Pengajuan::find($id);
        $filePath = public_path('koperasi/proposal/'.$data->proposal);
        $headers = ['Content-Type: application/pdf'];
        $fileName = '[Nomor_P-'.date('m', strtotime($data->created_at)).'-0'.$data->id_pengajuan.']'.$data->nama_usaha.'- Proposal.pdf';

        return response()->download($filePath, $fileName, $headers);
    }

    public function akta($id)
    {
        $data = Pengajuan::find($id);
        $filePath = public_path('koperasi/akta/'.$data->akta);
        $headers = ['Content-Type: application/pdf'];
        $fileName = '[Nomor_P-'.date('m', strtotime($data->created_at)).'-0'.$data->id_pengajuan.']'.$data->nama_usaha.'- akta.pdf';

        return response()->download($filePath, $fileName, $headers);
    }

    public function keuangan($id)
    {
        $data = Pengajuan::find($id);
        $filePath = public_path('koperasi/keuangan/'.$data->keuangan);
        $headers = ['Content-Type: application/pdf'];
        $fileName = '[Nomor_P-'.date('m', strtotime($data->created_at)).'-0'.$data->id_pengajuan.']'.$data->nama_usaha.'- keuangan.pdf';

        return response()->download($filePath, $fileName, $headers);
    }

    public function legalitas($id)
    {
        $data = Pengajuan::find($id);
        $filePath = public_path('koperasi/legalitas/'.$data->legalitas);
        $headers = ['Content-Type: application/pdf'];
        $fileName = '[Nomor_P-'.date('m', strtotime($data->created_at)).'-0'.$data->id_pengajuan.']'.$data->nama_usaha.'- legalitas.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
}
