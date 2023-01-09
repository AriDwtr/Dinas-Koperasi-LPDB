<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDiriMasyarakatController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $detail = DetailUser::find($id);
        return view('masyarakat.data_diri.data_diri', compact(['detail']));
    }

    public function update_data_diri(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'nik'=>'required',
            'nama'=>'required',
            'tempat'=>'required',
            'tgl_lahir'=>'required|date',
            'gender'=>'required',
            'telp'=>'required',
            'provinsi'=>'required',
            'kota'=>'required',
            'kecamatan'=>'required',
            'kelurahan'=>'required',
            'alamat'=>'required',
            'filektp'=>'required',
            'filefoto'=>'required'
        ]);

        if ($request->hasFile('filefoto')) {
            $foto_profile = $request->file('filefoto')->getClientOriginalName();
            $request->filefoto->move(public_path('profil'), $foto_profile);
        }
        if ($request->hasFile('filektp')) {
            $foto_ktp = $request->file('filektp')->getClientOriginalName();
            $request->filektp->move(public_path('koperasi/ktp'), $foto_ktp);
        }

        User::find($id)->update([
            'nama'=>$request->nama,
            'foto'=>$foto_profile,
        ]);

        DetailUser::find($id)->update([
            'nama'=>$request->nama,
            'nik'=>$request->nik,
            'tempat_lahir'=>$request->tempat,
            'tanggal_lahir'=>$request->tgl_lahir,
            'gender'=>$request->gender,
            'telp'=>$request->telp,
            'provinsi'=>$request->provinsi,
            'kota'=>$request->kota,
            'kecamatan'=>$request->kecamatan,
            'kelurahan'=>$request->kelurahan,
            'alamat'=>$request->alamat,
            'ktp'=>$foto_ktp,
        ]);

        return back()->with('success', 'Berhasil Melengkapi Data Diri');
    }
}
