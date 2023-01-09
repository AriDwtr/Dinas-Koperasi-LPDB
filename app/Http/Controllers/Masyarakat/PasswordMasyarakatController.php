<?php

namespace App\Http\Controllers\masyarakat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordMasyarakatController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('masyarakat.password.password', compact(['user']));
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
