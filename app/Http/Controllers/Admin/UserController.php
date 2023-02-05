<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Admin;
use App\Models\M_Anggota;
use App\Models\R_Institusi;
use App\Models\R_Jenis_Keanggotaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'List User | ELIT ITTelkom Surabaya';

        $user = User::latest()->paginate(50);

        return view('admin/user/index', [
            'pageTitle' => $pageTitle,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Tambah User | Dashboard';
        $jenis_keanggotaan = R_Jenis_Keanggotaan::all();
        $nama_institusi = R_Institusi::all();

        return view('admin.user.add', compact('pageTitle', 'jenis_keanggotaan', 'nama_institusi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $request->level;
        $user = new User;

        if ($role == 'admin'){
            $admin = new M_Admin;
            $user->password = Hash::make($request->password_register);
            $user->email = $request->emailadmin;
            $user->status = 'Active';
            $user->level = $request->level;
            $user->save();

            $admin->id_user = $user->id;
            $admin->nama_lengkap = $request->fullname;
            $admin->no_hp = $request->telp;
            $admin->alamat = $request->address;

            // Get File Image
            $ktpadmin = $request->file('filektp_admin');
            $karpegktmadmin = $request->file('filekarpegktm_admin');

            // Store File Image
            if ($ktpadmin != null){
                $ktpadmin->store('public/user/ktp');
                $admin->ktp_original = $ktpadmin->getClientOriginalName();
                $admin->ktp_encrypt = $ktpadmin->hashName();
            }

            if ($karpegktmadmin != null){
                $karpegktmadmin->store('public/user/karpegktm');
                $admin->karpeg_ktm_original = $karpegktmadmin->getClientOriginalName();
                $admin->karpeg_ktm_encrypt = $karpegktmadmin->hashName();
            }

            $admin->save();

        } else {
            $anggota = new M_Anggota;
            $institusi = new R_Institusi;
            $jenisanggota = $request->jenisanggota;
            $namainstitusi = $request->{'namainstitusi_'.$jenisanggota};
            $tambahinstitusi = $request->{'namainstitusi_'.$jenisanggota};
            $user->email = $request->{'email_register_'.$jenisanggota};
            $user->password = Hash::make($request->password_register);
            $user->status = 'Active';
            $user->level = $request->level;
            $user->save();

            if ($tambahinstitusi == 'add'){
                $institusi->nama = $request->{'tambahinstitusi_'.$jenisanggota};
                $institusi->tipe_institusi = $jenisanggota;
                $institusi->save();
                $anggota->id_institusi = $institusi->id;
            } else {
                if ($namainstitusi == null){
                    $anggota->id_institusi = 7;
                } else {
                    $anggota->id_institusi = $request->{'namainstitusi_'.$jenisanggota};
                }
            }

            $anggota->id_user = $user->id;
            $anggota->nama_lengkap = $request->fullname;
            $anggota->id_jenis_keanggotaan = $jenisanggota;
            $anggota->no_hp = $request->telp;
            $anggota->alamat = $request->address;
            $anggota->prodi = $request->{'jurusan_'.$jenisanggota};
            $anggota->fakultas = $request->{'fakultas_'.$jenisanggota};
            $anggota->verifikasi = 'Belum Terverifikasi';

            $anggota->save();
        }

        Alert::success('Anda Berhasil Menambahkan Data Pengguna');
        return redirect()->route('user-admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if ($user->level == 'anggota') {
            $nama = $user->anggota->nama_lengkap;
        } else {
            $nama = $user->admin->nama_lengkap;
        }
        $pageTitle = $nama.' | ELIT ITTelkom Surabaya';

        return view('admin/user/view', [
            'pageTitle' => $pageTitle,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if ($user->level == 'anggota') {
            $nama = $user->anggota->nama_lengkap;
        } else {
            $nama = $user->admin->nama_lengkap;
        }
        $pageTitle = $nama.' | ELIT ITTelkom Surabaya';

        return view('admin/user/verifikasi', [
            'pageTitle' => $pageTitle,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateaccept(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->level == 'admin') {
            $admin = M_Admin::where('id_user', $user->id)->first();
            $admin->verifikasi = 'Terverifikasi';
            $admin->save();
            Alert::success('Anda Berhasil Menerima Verifikasi Sebuah Akun');
            return redirect()->route('user-admin.index');
        } else {
            $anggota = M_Anggota::where('id_user', $user->id)->first();
            $anggota->verifikasi = 'Terverifikasi';
            $anggota->save();
            Alert::success('Anda Berhasil Menerima Verifikasi Sebuah Akun');
            return redirect()->route('user-admin.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedecline(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->level == 'admin') {
            $admin = M_Admin::where('id_user', $user->id)->first();
            $admin->verifikasi = 'Ditolak';
            $admin->save();
            Alert::success('Anda Berhasil Menolak Verifikasi Sebuah Akun');
            return redirect()->route('user-admin.index');
        } else {
            $anggota = M_Anggota::where('id_user', $user->id)->first();
            $anggota->verifikasi = 'Ditolak';
            $anggota->save();
            Alert::success('Anda Berhasil Menolak Verifikasi Sebuah Akun');
            return redirect()->route('user-admin.index');
        }
    }

    public function deactivateuser(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = 'Non Active';
        $user->save();

        Alert::success('Anda Berhasil Menonaktifkan Sebuah Akun');

        return redirect()->route('user-admin.index');
    }

    public function activateuser(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = 'Active';
        $user->save();

        Alert::success('Anda Berhasil Mengaktifkan Sebuah Akun');

        return redirect()->route('user-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->level == 'admin'){
            $admin = M_Admin::find($user->admin->id);

            // delete storage
            Storage::disk('public')->delete('user/photo/'.$user->profile_photo_path);
            Storage::disk('public')->delete('user/ktp/'.$admin->ktp_encrypt);
            Storage::disk('public')->delete('user/karpegktm/'.$admin->karpeg_ktm_encrypt);

            $admin->delete();
            $user->delete();
        } else {
            $anggota = M_Anggota::find($user->anggota->id);

            // delete storage
            Storage::disk('public')->delete('user/photo/'.$user->profile_photo_path);
            Storage::disk('public')->delete('user/ktp/'.$anggota->ktp_encrypt);
            Storage::disk('public')->delete('user/karpegktm/'.$anggota->karpeg_ktm_encrypt);
            Storage::disk('public')->delete('user/ijazah/'.$anggota->ijazah_encrypt);

            $anggota->delete();
            $user->delete();
        }

        Alert::success('Anda Berhasil Menghapus Sebuah Akun');

        return redirect()->route('user-admin.index');
    }
}
