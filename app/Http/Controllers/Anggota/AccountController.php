<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\M_Admin;
use App\Models\M_Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function myanggotaprofile()
    {
        $pageTitle = 'Profile Saya | ELIT ITTelkom Surabaya';

        return view('anggota/akun/index', [
            'pageTitle' => $pageTitle
        ]);
    }

    public function editmyanggotaprofile()
    {
        $pageTitle = 'Edit Profil | ELIT ITTelkom Surabaya';

        return view('anggota/akun/edit', [
            'pageTitle' => $pageTitle,
        ]);
    }

    public function updatemyanggotaprofile(Request $request, $id)
    {
        $user = User::find($id);
        if (Auth::user()->level == 'admin') {
            $admin = M_Admin::where('id_user', Auth::user()->id)->first();

            $user->email = $request->email;
            if ($request->password_edit != null) {
                $user->password = Hash::make($request->password_edit);
            }
            $photo = $request->file('photo');

            // Store File Image
            if ($photo != null){
                Storage::disk('public')->delete('user/photo/'.$user->profile_photo_path);
                $photo->store('public/user/photo');
                $user->profile_photo_path = $photo->hashName();
            }
            $user->save();

            $admin->nama_lengkap = $request->fullname;
            $admin->no_hp = $request->telp;
            $admin->alamat = $request->address;
            $admin->save();
        } else {
            $anggota = M_Anggota::where('id_user', Auth::user()->id)->first();

            $user->email = $request->email;
            if ($request->password_edit != null) {
                $user->password = Hash::make($request->password_edit);
            }
            $photo = $request->file('photo');

            // Store File Image
            if ($photo != null){
                Storage::disk('public')->delete('user/photo/'.$user->profile_photo_path);
                $photo->store('public/user/photo');
                $user->profile_photo_path = $photo->hashName();
            }
            $user->save();

            $anggota->nama_lengkap = $request->fullname;
            $anggota->no_hp = $request->telp;
            $anggota->alamat = $request->address;
            $anggota->save();
        }

        Alert::success('Anda Berhasil Mengubah Profil Anda');
        return redirect()->route('myprofileanggota');
    }

    public function nonactiveanggotaaccount(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->accountActivation == 1) {
            $user->status = 'Non Active';
            $user->save();
            Auth::logout();
            Session::flush();
            Alert::success('Anda Berhasil Menonaktifkan Akun Anda Anda');
            return redirect('login');
        }

        Alert::error('Maaf Anda Gagal Menonaktifkan Akun Anda');
        return redirect()->route('myprofilemyprofileanggota');
    }
}
