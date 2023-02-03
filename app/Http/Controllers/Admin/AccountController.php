<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function myadminprofile()
    {
        $pageTitle = 'Profile Saya | ELIT ITTelkom Surabaya';

        return view('admin/akun/index', [
            'pageTitle' => $pageTitle
        ]);
    }

    public function editmyadminprofile()
    {
        $pageTitle = 'Edit Profil | ELIT ITTelkom Surabaya';

        return view('admin/akun/edit', [
            'pageTitle' => $pageTitle,
        ]);
    }

    public function updatemyadminprofile(Request $request, $id)
    {
        $user = User::find($id);
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

        Alert::success('Anda Berhasil Mengubah Profil Anda');
        return redirect()->route('myprofile');
    }

    public function nonactiveadminaccount(Request $request, $id)
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
        return redirect()->route('myprofile');
    }

    // public function nonactiveadminaccount()
    // {
    //     $user = User::find(Auth::user()->id);
    //     $admin = M_Admin::find($user->admin->id);

    //     // delete storage
    //     Storage::disk('public')->delete('user/photo/'.$user->profile_photo_path);
    //     Storage::disk('public')->delete('user/ktp/'.$admin->ktp_encrypt);
    //     Storage::disk('public')->delete('user/karpegktm/'.$admin->karpeg_ktm_encrypt);
    //     $admin->delete();
    //     $user->delete();

    //     Alert::success('You are Successfully Delete Your Profile');

    //     return redirect()->route('login');
    // }
}
