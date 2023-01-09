<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilePegawaiController extends Controller
{
    public function index()
    {
       $user =  User::find(Auth::user()->id);
        $detail = DetailUser::find(Auth::user()->id);

        return view('pegawai.profile.profile', compact(['user','detail']));
    }

    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'nik'=>'required',
            'nip'=>'required',
            'nama'=>'required',
            'tempat'=>'required',
            'tgl_lahir'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'akun'=>'required'
        ]);

        $user = User::find($id);

        if ($request->hasFile('filefoto')) {
            $foto_profile = $request->file('filefoto')->getClientOriginalName();
            $request->filefoto->move(public_path('profil'), $foto_profile);
        }else {
            $foto_profile = $user->foto;
        }

        User::find($id)->update([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'type'=>$request->akun,
            'foto'=>$foto_profile,
        ]);

        DetailUser::find($id)->update([
            'nama'=>$request->nama,
            'nik'=>$request->nik,
            'nip'=>$request->nip,
            'tempat_lahir'=>$request->tempat,
            'tanggal_lahir'=>$request->tgl_lahir,
            'gender'=>$request->gender,
            'telp'=>$request->telp,
            'alamat'=>$request->alamat
        ]);

        return to_route('pegawai.profile')->with('success','Berhasil Perbaharui Data Profile');
    }

    public function password()
    {
        $user =  User::find(Auth::user()->id);

        return view('pegawai.profile.password', compact(['user']));
    }

    public function update_password(Request $request, $id)
    {
        $request->validate([
            'password'=>'required',
            'repassword'=>'required|same:password'
        ]);

        User::find($id)->update([
            'password'=>Hash::make($request->repassword)
        ]);

        return back()->with('success','Berhasil Memperbaharui Password Akun');
    }
}
