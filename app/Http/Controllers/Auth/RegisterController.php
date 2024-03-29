<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\M_Anggota;
use App\Models\R_Institusi;
use App\Models\R_Jenis_Keanggotaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = User::where('email', $request->email);

        if ($check->exists() == true) {
            Alert::error('Maaf Email Anda Sudah Terdaftar', 'Silahkan Masuk dengan Akun yang Telah Terdaftar');
            return redirect()->route('login');
        } else {
            $jenisanggota = $request->jenisanggota;
            $tambahinstitusi = $request->{'namainstitusi_'.$jenisanggota};

            if($jenisanggota != null):
                $user = new User;
                $anggota = new M_Anggota;
                $institusi = new R_Institusi;
                $user->password = Hash::make($request->password_register);
                $user->email = $request->email;
                $user->status = 'Active';
                $user->level = 'anggota';

                $photo = $request->file('photo_'.$jenisanggota);

                // Store File Image
                if ($photo != null){
                    $photo->store('public/user/photo');
                    $user->profile_photo_path = $photo->hashName();
                }
                $user->save();

                if ($tambahinstitusi == 'add'){
                    $institusi->nama = $request->{'tambahinstitusi_'.$jenisanggota};
                    $institusi->tipe_institusi = $jenisanggota;
                    $institusi->save();
                    $anggota->id_institusi = $institusi->id;
                } elseif ($tambahinstitusi == null){
                    $anggota->id_institusi = 7;
                } else {
                    $anggota->id_institusi = $request->{'namainstitusi_'.$jenisanggota};
                }

                $anggota->id_user = $user->id;
                $anggota->id_jenis_keanggotaan = $jenisanggota;
                $anggota->nama_lengkap = $request->fullname;
                $anggota->no_hp = $request->telp;
                $anggota->alamat = $request->address;
                $anggota->verifikasi = 'Periksa';

                $fakultas = $request->{'fakultas_'.$jenisanggota};
                $jurusan = $request->{'jurusan_'.$jenisanggota};

                if ($fakultas != null){
                    $anggota->fakultas = $fakultas;
                }

                if ($jurusan != null){
                    $anggota->prodi = $jurusan;
                }

                // Get File Image
                $ktp = $request->file('filektp_'.$jenisanggota);
                $karpegktm = $request->file('filekarpegktm_'.$jenisanggota);
                $ijazah = $request->file('fileijazah_'.$jenisanggota);

                // Store File Image
                if ($ktp != null){
                    $ktp->store('public/user/ktp');
                    $anggota->ktp_original = $ktp->getClientOriginalName();
                    $anggota->ktp_encrypt = $ktp->hashName();
                }

                if ($karpegktm != null){
                    $karpegktm->store('public/user/karpegktm');
                    $anggota->karpeg_ktm_original = $karpegktm->getClientOriginalName();
                    $anggota->karpeg_ktm_encrypt = $karpegktm->hashName();
                }

                if ($ijazah != null){
                    $ijazah->store('public/user/ijazah');
                    $anggota->ijazah_original = $ijazah->getClientOriginalName();
                    $anggota->ijazah_encrypt = $ijazah->hashName();
                }

                $anggota->save();

            endif;

            Alert::success('Anda Berhasil Mendaftar', 'Silahkan Masuk dengan Akun yang Telah Terdaftar');

            return redirect()->route('login');
        }
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
        //
    }
}
