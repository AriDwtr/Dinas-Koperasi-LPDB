<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Models\Jadwal_Survey;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class HomeSurveyController extends Controller
{

    public function index()
    {
        $survey = Jadwal_Survey::join('pengajuan','pengajuan.id_pengajuan','=','jadwal_survey.id_pengajuan')
        ->join('detail_user','detail_user.id_detail','=','jadwal_survey.id_user')
        ->select('jadwal_survey.id_jadwal','jadwal_survey.status_survey','jadwal_survey.tanggal_survey','jadwal_survey.hasil_survey',
        'jadwal_survey.dokumen_survey','pengajuan.*','detail_user.nama')
        ->Where('jadwal_survey.tanggal_survey', date('Y-m-d'))
        ->Where(function($query) {
            $query->where('jadwal_survey.status_survey', 'terjadwal');
        })
        ->get();

        return view('survey.home.home', compact(['survey']));
    }

    public function lembar_penilaian($id)
    {
        $survey = Jadwal_Survey::join('pengajuan','pengajuan.id_pengajuan','=','jadwal_survey.id_pengajuan')
        ->join('detail_user','detail_user.id_detail','=','jadwal_survey.id_user')
        ->join('users','users.id','=','jadwal_survey.id_user')
        ->select('jadwal_survey.id_jadwal','jadwal_survey.status_survey','jadwal_survey.tanggal_survey','jadwal_survey.hasil_survey',
        'jadwal_survey.dokumen_survey','pengajuan.*','detail_user.nama','detail_user.nik','detail_user.nip','detail_user.tempat_lahir','detail_user.tanggal_lahir',
        'detail_user.gender','detail_user.telp','detail_user.kecamatan','detail_user.kelurahan','detail_user.kota','detail_user.provinsi','detail_user.alamat','detail_user.ktp',
        'users.email','users.foto')
        ->where('jadwal_survey.id_jadwal', $id)
        ->get();

        // dd($survey);

        return view('survey.home.cetak_penilaian', compact(['survey']));
    }

    public function hasil_upload(Request $request, $id)
    {
        $request->validate([
            'filehasil'=>'required'
        ]);

        if ($request->hasFile('filehasil')) {
            $filehasil = $request->file('filehasil')->getClientOriginalName();
            $request->filehasil->move(public_path('koperasi/hasil_survey'), $filehasil);
        }

        $jadwal = Jadwal_Survey::find($id);
        $id_pengajuan = $jadwal->id_pengajuan;

        if($request->status_survey == "ditolak")
        {
            Jadwal_Survey::find($id)->update([
                'status_survey'=>'ditolak',
                'hasil_survey'=>$request->hasil_survey,
                'dokumen_survey'=>$filehasil,
            ]);

            Pengajuan::find($id_pengajuan)->update([
                'status'=>'suspend'
            ]);

            return back()->with('success','Berhasil Memberikan Penilaian Survey');
        }else {
            Jadwal_Survey::find($id)->update([
                'status_survey'=>'diterima',
                'hasil_survey'=>$request->hasil_survey,
                'dokumen_survey'=>$filehasil,
            ]);

            Pengajuan::find($id_pengajuan)->update([
                'status'=>'pengajuan_berhasil'
            ]);

            return back()->with('success','Berhasil Memberikan Penilaian Survey');
        }
    }

}
