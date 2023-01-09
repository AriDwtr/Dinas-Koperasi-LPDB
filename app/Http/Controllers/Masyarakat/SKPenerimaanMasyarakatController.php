<?php

namespace App\Http\Controllers\masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Jadwal_Survey;
use Illuminate\Http\Request;

class SKPenerimaanMasyarakatController extends Controller
{
    public function index($id)
    {
        $survey = Jadwal_Survey::join('pengajuan','pengajuan.id_pengajuan','=','jadwal_survey.id_pengajuan')
        ->join('detail_user','detail_user.id_detail','=','jadwal_survey.id_user')
        ->join('users','users.id','=','jadwal_survey.id_user')
        ->select('jadwal_survey.id_jadwal','jadwal_survey.status_survey','jadwal_survey.tanggal_survey','jadwal_survey.hasil_survey',
        'jadwal_survey.dokumen_survey','pengajuan.*','detail_user.nama','detail_user.nik','detail_user.nip','detail_user.tempat_lahir','detail_user.tanggal_lahir',
        'detail_user.gender','detail_user.telp','detail_user.kecamatan','detail_user.kelurahan','detail_user.kota','detail_user.provinsi','detail_user.alamat','detail_user.ktp',
        'users.email','users.foto')
        ->where('jadwal_survey.id_pengajuan', $id)
        ->get();

        // dd($survey);

        return view('masyarakat.sk_penerimaan.sk_penerimaan', compact(['survey']));
    }
}
