<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::join('detail_user','detail_user.id_detail','=','id')
                  ->where('users.type', 'pegawai')
                  ->orWhere('users.type', 'survey')
                  ->orderBy('users.nama','asc')
                  ->get();

        return view('pegawai.pegawai.pegawai', compact(['pegawai']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.pegawai.pegawai_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik'=>'required',
            'nip'=>'required',
            'nama'=>'required',
            'tempat'=>'required',
            'tgl_lahir'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'akun'=>'required',
            'password'=>'required',
            'repassword'=>'required|same:password'
        ]);

        if ($request->hasFile('filefoto')) {
            $foto_profile = $request->file('filefoto')->getClientOriginalName();
            $request->filefoto->move(public_path('profil'), $foto_profile);
        }else {
            $foto_profile = NULL;
        }

        User::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>$request->akun,
            'foto'=>$foto_profile,
        ]);

        DetailUser::create([
            'nama'=>$request->nama,
            'nik'=>$request->nik,
            'nip'=>$request->nip,
            'tempat_lahir'=>$request->tempat,
            'tanggal_lahir'=>$request->tgl_lahir,
            'gender'=>$request->gender,
            'telp'=>$request->telp,
            'alamat'=>$request->alamat
        ]);

        return to_route('data-pegawai.index')->with('success','Berhasil Membuat Akun Pegawai Baru');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = DetailUser::find($id);
        $user = User::find($id);

        return view('pegawai.pegawai.pegawai_edit', compact(['detail','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        return to_route('data-pegawai.index')->with('success','Berhasil Berbaharui Akun Pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailUser::find($id)->delete();
        User::find($id)->delete();

        return to_route('data-pegawai.index')->with('success','Berhasil Menghapus Akun Pegawai');
    }
}
