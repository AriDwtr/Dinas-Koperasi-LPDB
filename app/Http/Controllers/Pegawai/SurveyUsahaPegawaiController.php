<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Jadwal_Survey;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SurveyUsahaPegawaiController extends Controller
{
    public function index()
    {
        $survey = Jadwal_Survey::join('pengajuan','pengajuan.id_pengajuan','=','jadwal_survey.id_pengajuan')
        ->join('detail_user','detail_user.id_detail','=','jadwal_survey.id_user')
        ->select('jadwal_survey.id_jadwal','jadwal_survey.status_survey','jadwal_survey.tanggal_survey','jadwal_survey.hasil_survey',
        'jadwal_survey.dokumen_survey','pengajuan.*','detail_user.nama')
        ->where('jadwal_survey.status_survey', 'terjadwal')
        ->orderBy('jadwal_survey.tanggal_survey','ASC')
        ->get();

        return view('pegawai.survey.survey', compact(['survey']));
    }

    public function hasil_survey()
    {
        $survey = Jadwal_Survey::join('pengajuan','pengajuan.id_pengajuan','=','jadwal_survey.id_pengajuan')
        ->join('detail_user','detail_user.id_detail','=','jadwal_survey.id_user')
        ->select('jadwal_survey.id_jadwal','jadwal_survey.status_survey','jadwal_survey.tanggal_survey','jadwal_survey.hasil_survey',
        'jadwal_survey.dokumen_survey','pengajuan.*','detail_user.nama')
        ->where('jadwal_survey.status_survey', 'ditolak')
        ->orWhere('jadwal_survey.status_survey', 'diterima')
        ->orderBy('jadwal_survey.tanggal_survey','ASC')
        ->get();

        return view('pegawai.survey.survey_hasil', compact(['survey']));
    }

    public function cek_survey(Request $request)
    {
        $request->validate([
            'tanggal_laporan'=>'required'
        ]);

        $tanggal = explode(" - ", $request->tanggal_laporan);

        $tanggal1 = date('Y-m-d', strtotime($tanggal[0]));
        $tanggal2 = date('Y-m-d', strtotime($tanggal[1]));

        $survey = Jadwal_Survey::join('pengajuan','pengajuan.id_pengajuan','=','jadwal_survey.id_pengajuan')
        ->join('detail_user','detail_user.id_detail','=','jadwal_survey.id_user')
        ->select('jadwal_survey.id_jadwal','jadwal_survey.status_survey','jadwal_survey.tanggal_survey','jadwal_survey.hasil_survey',
        'jadwal_survey.dokumen_survey','pengajuan.*','detail_user.nama')
        ->whereBetween('jadwal_survey.tanggal_survey', [$tanggal1, $tanggal2])
        ->Where(function($query) {
            $query->where('jadwal_survey.status_survey', 'ditolak')
                 ->orWhere('jadwal_survey.status_survey', 'diterima');
                })
        ->orderBy('jadwal_survey.tanggal_survey','ASC')
        ->get();

        return view('pegawai.survey.survey_cek', compact(['survey']));
    }
}
