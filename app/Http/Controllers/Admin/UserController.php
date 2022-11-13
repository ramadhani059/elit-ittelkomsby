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

        $user = User::all();

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
            $user->nama_lengkap = $request->fullname;
            $user->password = Hash::make($request->password_register);
            $user->email = $request->emailadmin;
            $user->level = $request->level;
            $user->save();

            $admin->id_user = $user->id;
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
            $tambahinstitusi = $request->{'namainstitusi_'.$jenisanggota};
            $user->email = $request->{'email_register_'.$jenisanggota};
            $user->nama_lengkap = $request->fullname;
            $user->password = Hash::make($request->password_register);
            $user->level = $request->level;
            $user->save();

            if ($tambahinstitusi == 'add'){
                $institusi->nama = $request->{'tambahinstitusi_'.$jenisanggota};
                $institusi->tipe_institusi = $jenisanggota;
                $institusi->save();
                $anggota->id_institusi = $institusi->id;
            } else {
                $anggota->id_institusi = $request->{'namainstitusi_'.$jenisanggota};
            }

            $anggota->id_user = $user->id;
            $anggota->id_jenis_keanggotaan = $jenisanggota;
            $anggota->no_hp = $request->telp;
            $anggota->alamat = $request->address;
            $anggota->status = 'Belum Terverifikasi';

            $anggota->save();
        }

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
        //
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
        //
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
            $admin->delete();
            $user->delete();
        } else {
            $anggota = M_Anggota::find($user->anggota->id);
            $anggota->delete();
            $user->delete();
        }

        return redirect()->route('user-admin.index');
    }
}
