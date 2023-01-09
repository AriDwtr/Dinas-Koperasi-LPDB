<?php

namespace App\Http\Controllers\survey;

use App\Http\Controllers\Controller;
use App\Models\Jadwal_Survey;
use Illuminate\Http\Request;

class DaftarCekSurveyController extends Controller
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

        return view('survey.list_survey.list_survey', compact(['survey']));
    }
}
